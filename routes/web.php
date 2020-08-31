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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('task/getEmpByProd/{id}','EmployeeController@getEmpByProd')->name('getEmpByProd');

Route::group(['middleware' => 'auth'], function () {

	// Manage Products

	Route::get('products', 'ProductController@index')->name('product.index');
	Route::get('product/create', 'ProductController@create')->name('product.create');
	Route::post('product/store', 'ProductController@store')->name('product.store');
	Route::post('product/update/{product}', 'ProductController@update')->name('product.update');
	Route::get('product/{product}', 'ProductController@show')->name('product.show');
	Route::delete('product/{product}', 'ProductController@destroy')->name('product.destroy');
	Route::put('product/{product}', 'ProductController@edit')->name('product.edit');
	Route::get('category/product/{product}', 'ProductController@removeCategory')->name('category.product.delete');
	Route::get('/inventory-detail', 'ProductController@inventory_detail')->name('inventory-detail');


	// Manage Employees

	Route::get('employees', 'EmployeeController@index')->name('employee.index');
	Route::get('employee/create', 'EmployeeController@create')->name('employee.create');
	Route::post('employee/store', 'EmployeeController@store')->name('employee.store');
	Route::post('employee/update/{employee}', 'EmployeeController@update')->name('employee.update');
	Route::get('employee/{employee}', 'EmployeeController@show')->name('employee.show');
	Route::delete('employee/{employee}', 'EmployeeController@destroy')->name('employee.destroy');
	Route::put('employee/{employee}', 'EmployeeController@edit')->name('employee.edit');
	Route::get('category/employee/{employee}', 'EmployeeController@removeCategory')->name('category.employee.delete');

	// Manage Categories

	Route::get('categories', 'CategoryController@index')->name('category.index');
	Route::get('category/create', 'CategoryController@create')->name('category.create');
	Route::post('category/store', 'CategoryController@store')->name('category.store');
	Route::post('category/update/{category}', 'CategoryController@update')->name('category.update');
	Route::get('category/{category}', 'CategoryController@show')->name('category.show');
	Route::delete('category/{category}', 'CategoryController@destroy')->name('category.destroy');
	Route::put('category/{category}', 'CategoryController@edit')->name('category.edit');

	// Manage Locations

	Route::get('locations', 'LocationController@index')->name('location.index');
	Route::get('location/create', 'LocationController@create')->name('location.create');
	Route::post('location/store', 'LocationController@store')->name('location.store');
	Route::post('location/update/{location}', 'LocationController@update')->name('location.update');
	Route::get('location/{location}', 'LocationController@show')->name('location.show');
	Route::delete('location/{location}', 'LocationController@destroy')->name('location.destroy');
	Route::put('location/{location}', 'LocationController@edit')->name('location.edit');


	// Manage Tasks

	Route::get('tasks', 'TaskController@index')->name('task.index');
	Route::get('task/create', 'TaskController@create')->name('task.create');
	Route::post('task/store', 'TaskController@store')->name('task.store');
	Route::post('task/update/{task}', 'TaskController@update')->name('task.update');
	Route::get('task/{task}', 'TaskController@show')->name('task.show');
	Route::delete('task/{task}', 'TaskController@destroy')->name('task.destroy');
	Route::put('task/{task}', 'TaskController@edit')->name('task.edit');
	Route::get('category/task/{task}', 'TaskController@removeCategory')->name('category.task.delete');
	Route::put('completed/{task}', 'TaskController@completed')->name('task.completed');
});