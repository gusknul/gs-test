<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin'], 'namespace' => 'admin'], function () {
    Route::get('/home', 'AdminController@index');
    Route::resource('employees', 'EmployeesController');
});