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
//Route::get('/home', 'HomeController@index')->name('home');



Route::post('/search', 'PagesController@search');
Route::get('/turn.php', 'PagesController@turn');
Route::get('/robot.php', 'PagesController@robot');




Route::get('/', 'PagesController@index');
Route::get('/{url}', 'PagesController@first_pages');
Route::get('/units/{id}', 'PagesController@category_units');
Route::get('/{category}/{url}', 'PagesController@category_pages');



