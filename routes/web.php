<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//The Route::controller method is deprecated since Laravel 5.3.

Route::get('/route-basic', 'DemoController@index');
Route::get('/model', 'ModelTestController@index');
Route::resource('/route-resource','RouteResourceController');

