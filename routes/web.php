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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('profile', 'ProfileController')->middleware('auth');
Route::resource('user', 'UserController')->middleware('auth');
Route::resource('pengumuman', 'PengumumanController')->middleware('auth');
Route::resource('mapel', 'MapelController')->middleware('auth');
Route::resource('ekskul', 'EkskulController')->middleware('auth');
Route::resource('kelas', 'KelasController')->middleware('auth');
Route::resource('siswa', 'SiswaController')->middleware('auth');
Route::resource('guru', 'GuruController')->middleware('auth');
Route::resource('wali-kelas', 'WaliKelasController')->middleware('auth');
Route::resource('role', 'RoleController')->middleware('auth');
