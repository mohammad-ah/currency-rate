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

Route::get('/', function(){
    return 'Welcome';
});

Route::get('currencies', 'CurrencyController@index');

Route::get('currencies/filallcurrencies', 'CurrencyController@fillAllCurrencies');

Route::get('currencies/{currencyCode}', 'CurrencyController@show');
