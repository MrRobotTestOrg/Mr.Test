<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('admin/modulo', 'ModuloController');
Route::resource('admin/feature', 'FeatureController');
Route::resource('admin/cenario', 'CenarioController');
Route::resource('admin/cenario', 'CenarioController@index');
Route::resource('admin/cenario/create', 'CenarioController@create');