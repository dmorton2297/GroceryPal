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
Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@welcome')->name('welcome');

//Route::get('/addfood', 'HomeController@addfood')->name('addfood');
//Route::post('/storefood', 'HomeController@storeFoodInPantry')->name('storeFoodInPantry');
Route::get('/addfood', 
  ['as' => 'addfood', 'uses' => 'HomeController@addfood']);

Route::post('/add_food', 
  ['as' => 'food_store', 'uses' => 'HomeController@storeFood']);

Route::get('/deleteFood/{id}', ['uses' => 'HomeController@deleteFood']);
Route::get('/moveFood/{item}', ['uses' => 'HomeController@moveFood']);

Route::get('/map', 'HomeController@map')->name('map');

