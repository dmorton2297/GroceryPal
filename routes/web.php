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
Route::get('/addfood', 'HomeController@addfood')->name('addfood');
Route::post('/storefood', 'HomeController@storeFoodInPantry')->name('storeFoodInPantry');
