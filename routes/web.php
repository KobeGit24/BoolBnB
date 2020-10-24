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

// questa route porta alla Homepage
Route::get('/', 'GuestController@index') -> name('home');

// routes di default per le autenticazioni
Auth::routes();

// routes per gli utenti registrati (upr)
Route::get('/dashboard/profile','UprController@show')-> name('dashboard');
Route::get('/dashboard/newproperty','UprController@create')-> name('prop.create');

// routes per gli utenti non registrati
Route::get('/property/{id}', 'PropertyController@show' )-> name('prop.show');
Route::get('/search','PropertyController@search')->name('search');
