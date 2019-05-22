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


/*ROTAS USER*/ //user.remove_foto
Route::resource('/user','UserController');
Route::post('/user/muda_foto', 'UserController@mudaFoto')->name('user.muda_foto');
Route::post('/user/remove_foto', 'UserController@removeFoto')->name('user.remove_foto');


/*ROTAS MUSICA*/
Route::resource('/musica','MusicaController');
Route::post('/pesquisa_musica', 'PesquisaController@pesquisa_musica')->name('pesquisa.musica');
