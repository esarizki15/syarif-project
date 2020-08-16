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
Route::get('/home/data', 'HomeController@data')->name('home.data');

Route::resource('user', 'UserController')->middleware('auth');
Route::get('service/{id}/done', 'ServiceController@doneService')->name('service.done')->middleware('auth');
Route::get('rate/data', 'RateController@data')->name('rate.data')->middleware('auth');
Route::post('service/{id}/rate', 'ServiceController@rateService')->name('service.rate')->middleware('auth');
Route::resource('service', 'ServiceController')->middleware('auth');
Route::resource('profile', 'ProfileController')->middleware('auth');
Route::resource('rate', 'RateController')->middleware('auth');
