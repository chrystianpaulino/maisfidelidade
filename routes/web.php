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

Route::get('/', 'HomeController@paginaInicial')->name('paginaInicial');
Route::get('/logincliente', 'HomeController@paginaLoginCliente')->name('paginaLoginCliente');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//Auth::routes();
//
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('/cliente/', 'LoginClienteController@loginCliente')->name('cliente.login');
Route::get('/cliente/{telefone}/home', 'HomeController@homeCliente')->name('cliente.home');
Route::get('/cliente/{telefone}/edit', 'PerfilClienteController@edit')->name('cliente.edit');
Route::put('/cliente/{telefone}/edit', 'PerfilClienteController@update')->name('cliente.update');

Route::group(['prefix'=>'admin/','as'=>'admin.', 'middleware' => 'auth'], function(){
    Route::get('/cardapio', 'admin\\CardapioController@index')->name('cardapio.index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('cliente'       , 'admin\\ClienteController');
//    Route::post('ponto'         , 'admin\\PontoController@store')->name('ponto.store');
    Route::post('creditotransacao'  , 'admin\\TransacaoController@creditoTransacao')->name('creditotransacao.store');
    Route::post('creditaratalho'    , 'admin\\TransacaoController@creditarAtalho')->name('creditotransacao.atalho');
    Route::post('debitotransacao'   , 'admin\\TransacaoController@debitoTransacao')->name('debitotransacao.store');
    Route::resource('categorias'    , 'admin\\CategoriaController')->middleware('auth');
    Route::resource('produtos'      , 'admin\\ProdutoController')->middleware('auth');
});


