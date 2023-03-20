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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Route::get('jobs', 'JobsController@index');
Route::get('/add-job', 'JobsController@create');
Route::post('store-job','JobsController@store');
Route::get('/edit-job/{id_job}','JobsController@edit');
Route::put('update-job/{id_job}', 'JobsController@update');
