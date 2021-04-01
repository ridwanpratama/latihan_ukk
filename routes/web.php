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

Route::get('home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'ceklevel:siswa'])->group(function () {
    Route::get('print', 'PrintController@print')->name('print');
    Route::resource('ppdb', 'PpdbController');
});

Route::middleware(['auth', 'ceklevel:admin'])->group(function () {
    Route::get('proses', 'Admin\ProsesController@proses')->name('proses');

    Route::get('terima/{id}', 'Admin\ProsesController@terima')->name('terima');
    Route::get('tolak/{id}', 'Admin\ProsesController@tolak')->name('tolak');

    Route::get('diterima', 'Admin\ProsesController@diterima')->name('diterima');
    Route::get('ditolak', 'Admin\ProsesController@ditolak')->name('ditolak');
    Route::resource('siswa', 'Admin\SiswaController');
});