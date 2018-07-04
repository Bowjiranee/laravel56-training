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

//https://laravel.com/docs/5.6/routing#named-routes for route('model') in view
Route::get('/model', 'ModelTestController@index')->name('model');

Route::resource('/route-resource','RouteResourceController');
Route::get('/view', 'Test\ViewController@index');
Route::get('/template', 'Test\ViewController@template');

Route::get('/loginform', 'LoginController@index')->name('loginform');
Route::get('/login', 'LoginController@authenticate');


Route::prefix('member')->middleware('auth')->group(function () {
    //user can access this route when Auth::attempt is passed
    Route::get('/', function () {
        echo '/member/';
        exit;
    });

    Route::get('profile', function () {
        echo '/member/profile';
        exit;
    });
});
