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
        Route::get('/show/controller/{controller}', 'PagesManagerController@showController')->name('show.controller');
        Route::get('/show/page/{controller}/{page}', 'PagesManagerController@showPage')->name('show.page');
        Route::get('/edit/view/{controller}/{view}', 'GuiBuilderController@guiBuilder')->name('gui-builder');
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
    });
});

