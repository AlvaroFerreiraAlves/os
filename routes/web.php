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

Route::get('companies/form-register', 'CompaniesController@showFormCustomer');
Route::post('companies/store', 'CompaniesController@store');
Route::get('companies/{id}/edit', 'CompaniesController@edit');
Route::put('companies/{id}/update', 'CompaniesController@update');

Route::get('categories/form-register', 'CategoryItemsController@showFormCustomer');
Route::post('categories/store', 'CategoryItemsController@store');
Route::get('categories/{id}/edit', 'CategoryItemsController@edit');
Route::put('categories/{id}/update', 'CategoryItemsController@update');

Route::get('items/form-register', 'ItemsController@showFormItems');
Route::post('items/store', 'ItemsController@store');
Route::get('items/{id}/edit', 'ItemsController@edit');
Route::put('items/{id}/update', 'ItemsController@update');


