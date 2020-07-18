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
    return view('welcome');
});
Route::group(['prefix'=>'customer'],function(){
    Route::get('/','CustomerController@index');
    Route::get('create',function(){
        return view('customer.create');
    });
    Route::post('store','CustomerController@create');
    Route::get('/{id}/show','CustomerController@show');
});
Route::get('/service','ServiceController@index');
Route::post('/service','ServiceController@store');
Route::get('/checkEmail','EmailController@index')->name('checkEmail.index');
Route::post('/checkEmail','EmailController@validatetionEmail')->name('checkEmail.validate');



