<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->name('welcome.name');

Route::group(['prefix'=>'customer'],function(){
    Route::get('/','CustomerController@index')->name("customer.index");
    Route::get('/create','CustomerController@create')->name("customer.create");
    Route::post('/','CustomerController@store')->name("customer.store");
    Route::get('/edit/{customer}','CustomerController@edit')->name("customer.edit");
    Route::put('/{customer}','CustomerController@update')->name("customer.update");
    Route::get('/show/{customer}','CustomerController@show')->name("customer.show");
    Route::get('/delete/{customer}','CustomerController@destroy')->name("customer.destroy");
    Route::get('/filter','CustomerController@filterByCity')->name("customer.filterByCity");
    Route::get('/search','CustomerController@search')->name("customer.search");
});

Route::get('/service','ServiceController@index')->name("service.index");
Route::post('/service','ServiceController@store');
Route::get('/checkEmail','EmailController@index')->name('checkEmail.index');
Route::post('/checkEmail','EmailController@validatetionEmail')->name('checkEmail.validate');


Route::get('/tasks','TaskController@index')->name('tasks.index');
Route::get('/tasks/create','TaskController@create')->name('tasks.create')->middleware("auth");
Route::post('/tasks/store','TaskController@store')->name('tasks.store');


Route::group(['prefix' => 'Blog'], function () {
    Route::get('/','BlogController@index')->name("blog.index");
    Route::get('/create','BlogController@create')->name("blog.create");
    Route::post('/','BlogController@store')->name("blog.store");
    Route::get('/edit/{blog}','BlogController@edit')->name("blog.edit");
    Route::put('/{blog}','BlogController@update')->name("blog.update");
    Route::get('/show/{blog}','BlogController@show')->name("blog.show");
    Route::get('/delete/{blog}','BlogController@destroy')->name("blog.destroy");
});


Route::group(['prefix' => 'cities'], function () {
    Route::get('/','CityController@index')->name('cities.index');
    Route::get('/create','CityController@create')->name('cities.create');
    Route::post('/','CityController@store')->name('cities.store');
    Route::get('/edit/{city}','CityController@edit')->name('cities.edit');
    Route::put('/{city}','CityController@update')->name('cities.update');
    Route::get('/delete/{city}','CityController@destroy')->name('cities.destroy');
  });




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
