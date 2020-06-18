<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home'); //Redireciona para a pagina principal do sistema

Route::get('/produto', 'ProdutoController@create')->name('cadastro.produto.create'); //Redireciona para o endpoint /api/produto onde carrega a pagina de cadastro
Route::post('/produto', 'ProdutoController@store')->name('cadastro.produto.store'); //Redireciona para o endpoint /api/produto onde envia os dados via post para inserção no banco de dados
Route::post('/produto/deletar', 'ProdutoController@deletar')->name('produto.deletar'); //Redireciona para o endpoint /api/produto/deletar onde exclui o produto e seu kit atraves do ID
