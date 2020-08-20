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

Route::get('/', function () {
    return redirect('Cliente');
});

Route::resource('Cliente', 'ClientController');
Route::resource('Email', 'EmailController');
Route::resource('Telefone', 'TelephoneController');
Route::patch('status/{id}', 'StatusController')->name('Status');
Route::get('NovoEmail/{id}', 'EmailController@create')->name('NovoEmail');
Route::post('NovoEmail/{id}', 'EmailController@store')->name('NovoEmail');
Route::get('NovoTelefone/{id}', 'TelephoneController@create')->name('NovoTelefone');
Route::post('NovoTelefone/{id}', 'TelephoneController@store')->name('NovoTelefone');

