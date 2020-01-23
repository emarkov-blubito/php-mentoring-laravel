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

// Route::get('/', 'PagesController@homepage');
// Route::get('/load-products/{offset}', 'PagesController@loadProducts');


Auth::routes();

Route::get('/', 'PagesController@homepage');
Route::get('/load-products/{offset}', 'PagesController@loadProducts');

Route::resource('categories', 'CategoryController');

Route::get('/home', 'HomeController@index')->name('home');
