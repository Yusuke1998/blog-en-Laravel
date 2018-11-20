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

Route::get('/', 'Frontend\HomeController@index');
Route::get('/post/{slug}', 'Frontend\HomeController@post');
Route::get('/tag/{tag}', 'Frontend\HomeController@tag');
Route::get('/category/{category}', 'Frontend\HomeController@category');
Route::get('dashboard', 'Backend\DashboardController@index')->name('dashboard');
Route::get('login', 'Auth\LoginController@showFormLogin');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::resource('categories', 'Backend\CategoryController');
Route::resource('tags', 'Backend\TagController');
Route::resource('posts', 'Backend\PostController') ;
Route::post('/posts/upload-image', 'Backend\PostController@upload_image')->name('upload-image');
Route::resource('users', 'Backend\UserController');
