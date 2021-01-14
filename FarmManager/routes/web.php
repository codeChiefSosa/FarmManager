<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/random', 'UsersController@random');
Route::get('/user/{user}', 'UsersController@index');
Route::get('/user/{user}/edit', 'UsersController@edit');
Route::get('/user/{user}/animals', 'UsersController@animals');
Route::patch('/user/{user}', 'UsersController@update');



Route::get('animal/create', 'AnimalsController@create');
Route::get('animal/{animal}/edit', 'AnimalsController@edit');
Route::post('animal', 'AnimalsController@store');
Route::patch('animal/{animal}', 'AnimalsController@update');
Route::delete('animal/{animal}', 'AnimalsController@destroy');
