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

// ----- routes per gli utenti registrati (upr)
Route::get('/dashboard/profile','UprController@show')-> name('dashboard');

    // Restituisce la pagina per modificare i dati dell'account
    Route::get('/dashboard/profile/update-profile', 'UprController@update') -> name('upr.update'); 
    Route::post('/dashboard/profile/update-profile/store', 'UprController@store') -> name('upr.store');

    // create Property
    Route::get('/dashboard/newproperty','UprController@create')-> name('prop.create');
    Route::post('/dashboard/newproperty/store', 'UprController@property_store') -> name('prop.store');

    //Delete property
    Route::get('/dashboard/profile/delete/{id}', 'UprController@delete') -> name('prop.destroy');

    //Edit Property
    Route::get('/dashboard/profile/edit/{id}', 'UprController@property_edit') -> name('prop.edit');
    Route::post('/dashboard/profile/edit/{id}/store', 'UprController@property_edit_store') -> name('prop.edit.store');

    //Statistiche e messaggi
    Route::get('/property/{id}/info', 'UprController@get_info') -> name('prop.info');

// ------ routes per gli utenti non registrati
Route::get('/property/{id}', 'PropertyController@show' )-> name('prop.show');
Route::get('/search','PropertyController@search')->name('search');
Route::get('/api/reseach','ApiController@apiResearch');
Route::post('/property/{id}/store-request', 'PropertyController@store_request') -> name('store.request');

//Route::get(‘/payment/make’, ‘PaymentsController@make’)->name(‘payment.make’);
Route::get('/property/{id}/payment', 'PaymentController@index') -> name('payment.view');
Route::post('/property/{id}/payment/payment-store', 'PaymentController@payment') -> name('payment.store');
