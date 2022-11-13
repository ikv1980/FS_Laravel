<?php

use Illuminate\Support\Facades\Route;

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

// вызов контроллера. Для возможности использования необходимо раскомментировать строку
// в файле app\Providers\RouteServiceProvider.php (// protected $namespace = 'App\\Http\\Controllers';)
Route::get('/', 'StaticController@index')->name('home');
Route::get('/about', 'StaticController@about')->name('about');
Route::get('/blog', 'BlogController@index')->name('blog');


// передача параметров
Route::get('/post/{id}/{second}', function ($id, $second) {
    return "ID post: $id. Second: $second";
});