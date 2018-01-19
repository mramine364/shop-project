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

Route::get('/{page?}', 'HomeController@index')->name('main')->where('page', '[0-9]+');
Route::get('/preferred', 'HomeController@prefs')->name('prefs');

Route::get('/like/{id}', 'HomeController@like')->name('like');
Route::get('/dislike/{id}', 'HomeController@dislike')->name('dislike');
