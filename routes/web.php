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
    $title = 'Painel';
    return view('home.index', compact('title'));
})->name('painel');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('usuario/{id}/edit', 'UsersController@edit');
Route::put('usuario/{id}/update', 'UsersController@update');
Route::get('listar-usuarios', 'UsersController@showUsers')->name('listar.usuarios');

/*Rotas Clientes============================================================================================*/

Route::get('listar-clientes', 'CustomersController@showCustomers')->name('listar.clientes');
Route::get('cadastrar-cliente', 'CustomersController@showFormCustomer')->name('cadastrar.cliente');
Route::post('customer/store', 'CustomersController@store');
Route::get('editar-cliente/{id}', 'CustomersController@edit')->name('editar.cliente');
Route::put('customer/{id}/update', 'CustomersController@update');
Route::get('customer/destroy/{id}', 'CustomersController@destroy')->name('excluir.cliente');
Route::get('detalhes-cliente/{id}', 'CustomersController@details')->name('detalhes.cliente');

/*Rotas Itens============================================================================================*/

Route::get('listar-produtos', 'ItemsController@showProducts')->name('listar.produtos');
Route::get('listar-servicos', 'ItemsController@showServices')->name('listar.servicos');
Route::get('cadastrar-item', 'ItemsController@showFormItems')->name('cadastrar.item');
Route::get('editar-item/{id}', 'ItemsController@edit')->name('editar.item');
Route::post('items/store', 'ItemsController@store');
Route::get('items/{id}/edit', 'ItemsController@edit');
Route::put('items/{id}/update', 'ItemsController@update');
Route::get('detalhes-item/{id}', 'ItemsController@details')->name('detalhes.item');

/*Rotas Itens============================================================================================*/

Route::get('cadastrar-empresa', 'CompaniesController@showFormCustomer')->name('cadastrar.empresa');
Route::get('listar-empresa', 'CompaniesController@showCustomers')->name('listar.empresa');
Route::post('companies/store', 'CompaniesController@store');
Route::get('editar-empresa/{id}', 'CompaniesController@edit')->name('editar.empresa');
Route::put('companies/{id}/update', 'CompaniesController@update');
Route::get('detalhes-empresa/{id}', 'CompaniesController@details')->name('detalhes.empresa');

Route::get('categories/form-register', 'CategoryItemsController@showFormCustomer');
Route::post('categories/store', 'CategoryItemsController@store');
Route::get('categories/{id}/edit', 'CategoryItemsController@edit');
Route::put('categories/{id}/update', 'CategoryItemsController@update');

Route::get('nova-ordem-servico', 'OrderServicesController@showFormOrder')->name('nova.ordem');
Route::post('order/addservice', 'OrderServicesController@addService')->name('add.service');
Route::get('order/salva-ordem', 'OrderServicesController@salvaOrdem');
Route::post('order/removeservice/{id}', 'OrderServicesController@remove')->name('remove.item');
Route::post('editar-ordem-orcamento/order/removeservice-update/{id}', 'OrderServicesController@removeUpdate')->name('remove.item.update');
Route::post('order/set-value/{id}', 'OrderServicesController@setValue')->name('set.value');
Route::post('editar-ordem-orcamento/order/set-value/{id}', 'OrderServicesController@setValue')->name('set.value.update');
Route::post('editar-ordem-orcamento/order/total/{desconto}', 'OrderServicesController@totalUpdate')->name('total.update');
Route::post('order/total/{desconto}', 'OrderServicesController@total')->name('total');
Route::post('editar-ordem-orcamento/order/total-update/{desconto}', 'OrderServicesController@totalUpdate')->name('total');
Route::post('cadastrar-ordem', 'OrderServicesController@store')->name('cadastrar.ordem');
Route::get('listar-orcamentos', 'OrderServicesController@showBudgets')->name('listar.orcamentos');
Route::get('detalhes-ordem/{id}', 'OrderServicesController@details')->name('detalhes.ordem');
Route::get('editar-ordem-orcamento/{id}', 'OrderServicesController@edit')->name('editar.ordem.orcamento');
Route::post('editar-ordem-orcamento/destroy-item/{idOrdem}/{id}', 'ItemsOrderServicesController@destroy')->name('excluir.item.ordem');
Route::post('editar-ordem-orcamento/update-item/{idOrdem}/{id}', 'OrderServicesController@update')->name('atualizar.item.ordem');
Route::post('order/addservice-update', 'OrderServicesController@addServiceUpdate')->name('add.service.update');


