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

Route::get('/', 'SiteController@index')->name('home');
Route::resource('site','SiteController');

Route::resource('roles','RolesController');
Route::resource('permissions','PermissionsController');
Route::resource('users','UsersController');

Auth::routes(['register' => false, 'reset' => false]); // hide register & forgot password link
// Auth::routes(); // hide register link
Route::get('/home', 'HomeController@index')->name('home');
