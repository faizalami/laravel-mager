<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 20/09/18
 * Time: 11:30
 */

$namespace = 'Faizalami\LaravelMager\Http\Controllers';

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
        Route::get('/gui-builder', 'PagesManagerController@guiBuilder')->name('gui-builder');
    });

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

