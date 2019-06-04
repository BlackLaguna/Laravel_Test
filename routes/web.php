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

Route::get('index','PagesController@index')->name('index');

Route::post('description','DataController@description')->name('description');
Route::post('img','DataController@img')->name('img');
Route::post('add_coment','AjaxController@add_coment');
Route::post('add_employee','AjaxController@add_employee');
Route::post('save_employee','AjaxController@save_employee');
Route::post('delete_employee','AjaxController@delete_employee');




Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('index/delete', 'PagesController@delete_company')->middleware('auth');
Route::post('register', 'Auth\RegisterController@register');
Route::get('index/{id}','PagesController@indexWithId');