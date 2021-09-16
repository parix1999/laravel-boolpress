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

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

// Mi serve la rotta per la login iniziale:
//Route::get('/', 'layout.app')->name('home');

// Rotta normale per la prima pagina "home":
Route::get('/', 'HomeController@home')->name('home');

// Serve la rotta da collegare a PostController in modo tale che possa restituire tutti i dati alla view:
// Questa è una rotta su un controller resource(CRUD), quindi con molti più vantaggi:
Route::resource('posts', 'PostController');
