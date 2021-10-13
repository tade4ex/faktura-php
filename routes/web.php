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
    return redirect('invoice/all');
});

Route::group([
    'prefix' => 'invoice'
], function () {
    Route::post('add', 'InvoiceController@ajaxAdd');
    Route::post('edit/{id}', 'InvoiceController@ajaxEdit');

    Route::get('all', 'InvoiceController@allSellers');
    Route::get('all/{id}', 'InvoiceController@allInvoices');
    Route::get('add', 'InvoiceController@add');
    Route::get('edit/{id}', 'InvoiceController@edit');
    Route::get('view/{id}', 'InvoiceController@view');
    Route::get('print/{id}', 'InvoiceController@printView');
    Route::get('delete/{id}', 'InvoiceController@delete');
});

Route::group([
    'prefix' => 'seller'
], function () {
    Route::post('add', 'SellerController@ajaxAdd');
    Route::get('add', 'SellerController@add');
});
