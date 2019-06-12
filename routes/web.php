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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/create', 'HomeController@store')->name('create');
Route::get('/home/view', 'HomeController@realTimeView')->name('view');
Route::get('/home/view/alert', 'HomeController@alert');

Route::get('/home/queryDatabase', 'HomeController@queryDatabase');
