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

Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@posts');
Route::get('/posts/{slug}', 'PostController@show')->name('show.more');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/cat/{slug}', 'CategoryController@show')->name('show.by.category');

Route::get('/more/{slug}', 'PostController@more')->name('show.by.more');

Route::post('/search', 'PostController@search')->name('search');

Auth::routes();


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'Admin\PostController@index')->name('all.categories');;

    Route::get('/pages/{id}', 'Admin\PostController@showById')->name('all.pages');
    Route::get('/page/add', 'Admin\PostController@showPageForm')->name('show.pages');
    Route::post('/page/add', 'Admin\PostController@savePost')->name('add.pages');
    Route::delete('/page/delete/{id}', 'Admin\PostController@destroy')->name('delete.pages');
    Route::get('/page/edit/{id}', 'Admin\PostController@edit')->name('edit.pages');
    Route::put('/page/edit/{id}', 'Admin\PostController@update');

    Route::get('/category/add', 'Admin\CategoryController@showCategoryForm')->name('show.category');
    Route::post('/category/add', 'Admin\CategoryController@saveCategory')->name('add.category');
    Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('edit.category');
    Route::put('/category/edit/{id}', 'Admin\CategoryController@update');
    Route::delete('/category/delete/{id}', 'Admin\CategoryController@destroy')->name('delete.category');

    Route::get('/body', 'Admin\ContentController@showAll')->name('all.content');
    Route::get('/content/add', 'Admin\ContentController@showContentForm')->name('show.content');
    Route::post('/content/add', 'Admin\ContentController@saveContent')->name('add.content');
    Route::get('/content/edit/{id}', 'Admin\ContentController@edit')->name('edit.content');
    Route::put('/content/edit/{id}', 'Admin\ContentController@update');
    Route::delete('/content/delete/{id}', 'Admin\ContentController@destroy')->name('delete.content');
});
