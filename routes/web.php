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


Route::get('/', 'PagesController@index');

Route::get('/{url}', 'PagesController@first_pages');

Route::get('/{category}/{url}', 'PagesController@category_pages');

Route::get('/search', 'PagesController@search');