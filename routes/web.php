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
})->name('painel')->middleware('auth');

Auth::routes();

Route::group(['middleware'=>['recepcionista','auth']],function (){

    Route::get('cadastrar-usuario', 'UsersController@showRegistrationForm')->name('cadastrar.usuario');
    Route::post('user/store', 'UsersController@store')->name('inserir.usuario');
    Route::get('usuario/{id}/edit', 'UsersController@edit');
    Route::put('usuario/{id}/update', 'UsersController@update');

    Route::get('customer/destroy/{id}', 'CustomersController@destroy')->name('excluir.cliente');

    Route::get('items/destroy/{id}', 'ItemsController@destroy')->name('excluir.item');

    Route::get('cadastrar-empresa', 'CompaniesController@showFormCustomer')->name('cadastrar.empresa');
    Route::post('companies/store', 'CompaniesController@store');
    Route::get('editar-empresa/{id}', 'CompaniesController@edit')->name('editar.empresa');
    Route::put('companies/{id}/update', 'CompaniesController@update');


});

Route::group(['middleware'=>['tecnico','auth']],function (){
    Route::get('ordens-tecnico', 'OrderServicesController@showOrderTechnician');
});

Route::group(['middleware'=>['auth']],function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('listar-usuarios', 'UsersController@showUsers')->name('listar.usuarios');
    Route::get('listar-clientes', 'CustomersController@showCustomers')->name('listar.clientes');
    Route::get('detalhes-cliente/{id}', 'CustomersController@details')->name('detalhes.cliente');
    Route::get('listar-produtos', 'ItemsController@showProducts')->name('listar.produtos');
    Route::get('listar-servicos', 'ItemsController@showServices')->name('listar.servicos');
    Route::get('detalhes-item/{id}', 'ItemsController@details')->name('detalhes.item');
    Route::get('detalhes-empresa/{id}', 'CompaniesController@details')->name('detalhes.empresa');
    Route::get('listar-orcamentos', 'OrderServicesController@showBudgets')->name('listar.orcamentos');
    Route::get('listar-ordens', 'OrderServicesController@showOrders')->name('listar.ordens');
    Route::get('detalhes-ordem/{id}', 'OrderServicesController@details')->name('detalhes.ordem');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout.os');
    Route::get('listar-empresa', 'CompaniesController@showCustomers')->name('listar.empresa');

    Route::get('cadastrar-cliente', 'CustomersController@showFormCustomer')->name('cadastrar.cliente');
    Route::post('customer/store', 'CustomersController@store');
    Route::get('editar-cliente/{id}', 'CustomersController@edit')->name('editar.cliente');
    Route::put('customer/update/{id}', 'CustomersController@update');

    Route::get('cadastrar-item', 'ItemsController@showFormItems')->name('cadastrar.item');
    Route::get('editar-item/{id}', 'ItemsController@edit')->name('editar.item');
    Route::post('items/store', 'ItemsController@store');
    Route::get('items/{id}/edit', 'ItemsController@edit');
    Route::put('items/update/{id}', 'ItemsController@update');

    Route::get('nova-ordem-servico', 'OrderServicesController@showFormOrder')->name('nova.ordem');
    Route::post('order/addservice', 'OrderServicesController@addService')->name('add.service');
    Route::get('order/salva-ordem', 'OrderServicesController@salvaOrdem');
    Route::post('order/removeservice/{id}', 'OrderServicesController@remove')->name('remove.item');
    Route::post('order/removeservice-update/{id}', 'OrderServicesController@removeUpdate')->name('remove.item.update');
    Route::post('order/set-value/{id}', 'OrderServicesController@setValue')->name('set.value');
    Route::post('editar-ordem-orcamento/order/set-value/{id}', 'OrderServicesController@setValue')->name('set.value.update');
    Route::post('editar-ordem-orcamento/order/total/{desconto}', 'OrderServicesController@totalUpdate')->name('total.update');
    Route::post('order/total/{desconto}', 'OrderServicesController@total')->name('total');
    Route::post('order/total-update/{desconto}', 'OrderServicesController@totalUpdate')->name('total');
    Route::post('cadastrar-ordem', 'OrderServicesController@store')->name('cadastrar.ordem');

    Route::get('editar-ordem-orcamento/{id}', 'OrderServicesController@edit')->name('editar.ordem.orcamento');
    Route::post('editar-ordem-orcamento/destroy-item/{idOrdem}/{id}', 'ItemsOrderServicesController@destroy')->name('excluir.item.ordem');
    Route::put('update-item/{id}', 'OrderServicesController@update')->name('atualizar.item.ordem');
    Route::post('order/addservice-update', 'OrderServicesController@addServiceUpdate')->name('add.service.update');
    Route::get('remove-all', 'OrderServicesController@removeAll')->name('remove.all');
    Route::post('desconto-total', 'OrderServicesController@descontoTotal')->name('desconto.total');

});



/*Route::get('categories/form-register', 'CategoryItemsController@showFormCustomer');
Route::post('categories/store', 'CategoryItemsController@store');
Route::get('categories/{id}/edit', 'CategoryItemsController@edit');
Route::put('categories/{id}/update', 'CategoryItemsController@update');*/











