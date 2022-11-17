<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'StaticController@index')->name('home');
Route::get('/about', 'StaticController@about')->name('about');
Route::get('/blog', 'BlogController@index')->name('blog');

// БЛОК для статей
Route::get('/article/add', 'ArticlesController@create')->name('articleadd');
Route::post('/article/add', 'ArticlesController@store');

Route::get('/article/{id}/edit', 'ArticlesController@edit');
Route::put('/article/{id}/edit', 'ArticlesController@update');

Route::get('/article/{id}', 'ArticlesController@show');
Route::delete('/article/{id}/delete', 'ArticlesController@destroy');
// Route::resource('/articles', 'ArticlesController');

