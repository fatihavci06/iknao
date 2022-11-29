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


Route::get('/','App\Http\Controllers\front\IndexController@index')->name('front.index');
Route::get('/yeni-basvuru','App\Http\Controllers\front\IndexController@yenibasvuru')->name('front.yenibasvuru');
Route::post('/yeni-basvuru','App\Http\Controllers\front\IndexController@store')->name('front.basvurukayit');
Route::get('/profil-duzenle','App\Http\Controllers\front\IndexController@edit')->name('front.edit');
Route::post('/profil-duzenle','App\Http\Controllers\front\IndexController@update')->name('front.update');
Route::get('/giris','App\Http\Controllers\front\IndexController@giris')->name('front.giris');
Route::post('/flogin','App\Http\Controllers\front\IndexController@login')->name('front.login');
Route::get('/flogout','App\Http\Controllers\front\IndexController@logout')->name('front.logout');
