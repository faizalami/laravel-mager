<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 20/09/18
 * Time: 11:30
 */

use Faizalami\LaravelMager\Components\JsonIO;

$namespace = 'Faizalami\LaravelMager\Http\Controllers';

// Load custom route files
$jsonIO = new JsonIO();

$routes = $jsonIO->loadJsonFile('configs/routes.json')->toArray();
foreach ($routes as $route) {
    $routeFile = base_path('routes/app/' . $route . '.php');
    if (file_exists($routeFile)) {
        Route::prefix('/')
            ->group($routeFile);
    }
}

// Laravel Mager routes
Route::group([
    'namespace' => $namespace,
    'prefix' => config('mager.base_url'),
    'as' => 'mager.'
], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group([
        'prefix' => 'pages',
        'as' => 'pages.'
    ], function () {
        Route::get('/', 'PagesManagerController@index')->name('index');
        Route::match(['get', 'post'], '/create/controller', 'PagesManagerController@createController')->name('create.controller');
        Route::match(['get', 'post'], '/create/page/{controller}', 'PagesManagerController@createPage')->name('create.page');
        Route::match(['get', 'post'], '/edit/controller/{controller}', 'PagesManagerController@editController')->name('edit.controller');
        Route::match(['get', 'post'], '/edit/page/{controller}/{page}', 'PagesManagerController@editPage')->name('edit.page');
        Route::get('/show/controller/{controller}', 'PagesManagerController@showController')->name('show.controller');
        Route::get('/show/page/{controller}/{page}', 'PagesManagerController@showPage')->name('show.page');
        Route::get('/delete/controller/{controller}', 'PagesManagerController@deleteController')->name('delete.controller');
        Route::get('/delete/page/{controller}/{page}', 'PagesManagerController@deletePage')->name('delete.page');
        Route::get('/edit/view/{controller}/{page}', 'GuiBuilderController@guiBuilder')->name('gui-builder');
    });

    Route::match(['get', 'post'], '/json/{type}/{param1}/{param2?}/{param3?}', 'JsonIOController@processJson');

    Route::get('/generate', 'GeneratorController@generate');

    Route::group([
        'prefix' => 'configuration',
        'as' => 'configuration.'
    ], function () {
        Route::match(['get', 'post'], '/theme', 'ProjectConfigurationController@theme')->name('theme');
        Route::post('/theme/logo', 'ProjectConfigurationController@uploadLogo')->name('logo');
        Route::get('/navbar', 'ProjectConfigurationController@navbar')->name('navbar');
        Route::get('/sidebar', 'ProjectConfigurationController@sidebar')->name('sidebar');
        Route::match(['get', 'post'], '/edit/navbar/{id}', 'ProjectConfigurationController@editNavbar')->name('edit.navbar');
        Route::match(['get', 'post'], '/edit/sidebar/{id}', 'ProjectConfigurationController@editSidebar')->name('edit.sidebar');
        Route::get('/delete/navbar/{id}', 'ProjectConfigurationController@deleteNavbar')->name('delete.navbar');
        Route::get('/delete/sidebar/{id}', 'ProjectConfigurationController@deleteSidebar')->name('delete.sidebar');
        Route::match(['get', 'post'], '/create/navbar', 'ProjectConfigurationController@createNavbar')->name('create.navbar');
        Route::match(['get', 'post'], '/create/sidebar', 'ProjectConfigurationController@createSidebar')->name('create.sidebar');
    });

    Route::group([
        'prefix' => 'rest',
        'as' => 'rest.'
    ], function () {
        Route::get('/', 'RestManagerController@index')->name('index');
        Route::match(['get', 'post'], '/format', 'RestManagerController@format')->name('format');
        Route::get('/show/controller/{controller}', 'RestManagerController@showController')->name('show.controller');
        Route::match(['get', 'post'], '/desc/controller/{controller}', 'RestManagerController@editDesc')->name('desc.controller');
        Route::match(['get', 'post'], '/desc/page/{controller}/{page}', 'RestManagerController@editDesc')->name('desc.page');
    });

    Route::group([
        'prefix' => 'database',
        'as' => 'database.'
    ], function () {
        Route::get('/', 'DatabaseManagerController@index')->name('index');
        Route::get('/properties/{controller}', 'DatabaseManagerController@tableProperties')->name('table.properties');
        Route::get('/data/{controller}', 'DatabaseManagerController@tableData')->name('table.data');
        Route::match(['get', 'post'], '/create/column/{controller}', 'DatabaseManagerController@createColumn')->name('create.column');
        Route::match(['get', 'post'], '/edit/column/{controller}/{column}', 'DatabaseManagerController@editColumn')->name('edit.column');
        Route::get('/delete/column/{controller}/{column}', 'DatabaseManagerController@deleteColumn')->name('delete.column');
        Route::match(['get', 'post'], '/create/data/{controller}', 'DatabaseManagerController@createData')->name('create.data');
        Route::match(['get', 'post'], '/edit/data/{controller}/{id}', 'DatabaseManagerController@editData')->name('edit.data');
        Route::get('/delete/data/{controller}/{id}', 'DatabaseManagerController@deleteData')->name('delete.data');
        Route::match(['get', 'post'], '/create/dummy/{controller}', 'DatabaseManagerController@createDummy')->name('create.dummy');
    });
});
