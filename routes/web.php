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
    if(file_exists($routeFile)) {
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
        Route::match(['get', 'post'],'/create/page/{controller}', 'PagesManagerController@createPage')->name('create.page');
        Route::match(['get', 'post'], '/edit/controller/{controller}', 'PagesManagerController@editController')->name('edit.controller');
        Route::match(['get', 'post'], '/edit/page/{controller}/{page}', 'PagesManagerController@editPage')->name('edit.page');
        Route::get('/show/controller/{controller}', 'PagesManagerController@showController')->name('show.controller');
        Route::get('/show/page/{controller}/{page}', 'PagesManagerController@showPage')->name('show.page');
        Route::get('/delete/controller/{controller}', 'PagesManagerController@deleteController')->name('delete.controller');
        Route::get('/delete/page/{controller}/{page}', 'PagesManagerController@deletePage')->name('delete.page');
        Route::get('/edit/view/{controller}/{page}', 'GuiBuilderController@guiBuilder')->name('gui-builder');
    });

    Route::match(['get', 'post'],'/json/{type}/{param1}/{param2?}/{param3?}', 'JsonIOController@processJson');

    Route::get('/generate', 'GeneratorController@generate');

    Route::group([
        'prefix' => 'configuration',
        'as' => 'configuration.'
    ], function () {
        Route::get('/theme', 'ProjectConfigurationController@theme')->name('theme');
        Route::get('/navbar', 'ProjectConfigurationController@navbar')->name('navbar');
        Route::get('/sidebar', 'ProjectConfigurationController@sidebar')->name('sidebar');
        Route::match(['get', 'post'], '/create/navbar', 'ProjectConfigurationController@createNavbar')->name('create.navbar');
        Route::match(['get', 'post'], '/create/sidebar', 'ProjectConfigurationController@createSidebar')->name('create.sidebar');
    });

    Route::group([
        'prefix' => 'rest',
        'as' => 'rest.'
    ], function () {
        Route::get('/', 'RestManagerController@index')->name('index');
    });

    Route::group([
        'prefix' => 'database',
        'as' => 'database.'
    ], function () {
        Route::get('/', 'DatabaseManagerController@index')->name('index');
        Route::get('/properties/{table}', 'DatabaseManagerController@tableProperties')->name('table.properties');
        Route::get('/data/{table}', 'DatabaseManagerController@tableData')->name('table.data');
        Route::match(['get', 'post'], '/create/table', 'DatabaseManagerController@createTable')->name('create.table');
        Route::match(['get', 'post'], '/create/column/{table}', 'DatabaseManagerController@createColumn')->name('create.column');
        Route::match(['get', 'post'], '/create/data/{table}', 'DatabaseManagerController@createData')->name('create.data');
        Route::match(['get', 'post'], '/create/dummy/{table}', 'DatabaseManagerController@createDummy')->name('create.dummy');
    });
});

