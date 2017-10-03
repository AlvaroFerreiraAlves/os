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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('usuario/{id}/edit', 'UsersController@edit');
Route::put('usuario/{id}/update', 'UsersController@update');


Route::get('customer/form-register', 'CustomersController@showFormCustomer');
Route::post('customer/store', 'CustomersController@store');
Route::get('customer/{id}/edit', 'CustomersController@edit');
Route::put('customer/{id}/update', 'CustomersController@update');


