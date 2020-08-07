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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Manage Products

Route::get('products', 'ProductController@index')->name('product.index');
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::post('product/store', 'ProductController@store')->name('product.store');
Route::post('product/update/{product}', 'ProductController@update')->name('product.update');
Route::get('product/{product}', 'ProductController@show')->name('product.show');
Route::delete('product/{product}', 'ProductController@destroy')->name('product.destroy');
Route::put('product/{product}', 'ProductController@edit')->name('product.edit');
Route::get('category/product/{product}', 'ProductController@removeCategory')->name('category.product.delete');

// Manage Categories

Route::get('categories', 'CategoryController@index')->name('category.index');
Route::get('category/create', 'CategoryController@create')->name('category.create');
Route::post('category/store', 'CategoryController@store')->name('category.store');
Route::post('category/update/{category}', 'CategoryController@update')->name('category.update');
Route::get('category/{category}', 'CategoryController@show')->name('category.show');
Route::delete('category/{category}', 'CategoryController@destroy')->name('category.destroy');
Route::put('category/{category}', 'CategoryController@edit')->name('category.edit');
