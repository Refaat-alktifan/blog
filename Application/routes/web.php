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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('post/new', 'HomeController@newPost');
Route::post('post/new', 'HomeController@storePost');

Route::get('post/edit/{id}', 'HomeController@editPost');
Route::post('post/edit/{id}', 'HomeController@updatePost');
Route::get('post/delete/{id}', 'HomeController@deletePost');
Route::get('profile', 'HomeController@profile');
Route::post('profile', 'HomeController@updateProfile');
Route::post('profile/password', 'HomeController@updateProfilePassword');
Route::get('manage/user', 'HomeController@users'); 
Route::get('manage/user/add', 'HomeController@userAdd');
Route::post('manage/user/add', 'HomeController@storeUser'); 
Route::get('manage/user/{id}', 'HomeController@editUser');
Route::post('manage/user/edit/{id}', 'HomeController@updateUser');

Route::get('manage/settings', 'HomeController@settings');
Route::post('manage/settings', 'HomeController@updateSettings');




Route::get('/','BlogController@index');
Route::get('post/{slug}/{id}', 'BlogController@viewPost');
Route::get('category/{slug}', 'BlogController@viewCategory');
Route::post('search', 'BlogController@search');


Auth::routes();