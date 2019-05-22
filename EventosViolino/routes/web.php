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
    return view('inicio');
})->name('inicio');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


/*ROTAS MUSICA*/
Route::resource('/user','UserController');


/*ROTAS MUSICA*/
Route::post('/pesquisa_musica', 'PesquisaController@pesquisa_musica')->name('pesquisa.musica');
