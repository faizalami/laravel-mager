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
    'prefix' => config('laravel-mager.base_url'),
], function () {

    Route::get('/', 'DashboardController@index');

});
