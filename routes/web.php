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

// Jobs
Route::get('jobs', 'JobsController@index');
Route::get('/add-job', 'JobsController@create');
Route::post('store-job','JobsController@store');
Route::get('/edit-job/{id_job}','JobsController@edit');
Route::put('update-job/{id_job}', 'JobsController@update');
Route::get('delete-job/{id}', 'JobsController@delete');

//Profiles
Route::middleware(['auth'])->group(function(){
Route::get('profiles', 'ProfilesController@index');
Route::get('/add-profile', 'ProfilesController@create');
Route::post('store-profile','ProfilesController@store');
Route::get('/edit-profile/{id_job}','ProfilesController@edit');
Route::put('update-profile/{id_job}', 'ProfilesController@update');
Route::get('delete-profile/{id}', 'ProfilesController@delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
