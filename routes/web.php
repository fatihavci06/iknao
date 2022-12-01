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
Route::get('/yeni-basvuru/{brans?}','App\Http\Controllers\front\IndexController@yenibasvuru')->name('front.yenibasvuru');
Route::post('/yeni-basvuru','App\Http\Controllers\front\IndexController@store')->name('front.basvurukayit');
Route::get('/profil-duzenle','App\Http\Controllers\front\IndexController@edit')->middleware('girisyapabilirmi')->name('front.edit');
Route::post('/profil-duzenle','App\Http\Controllers\front\IndexController@update')->name('front.update');
Route::get('/giris','App\Http\Controllers\front\IndexController@giris')->name('front.giris');
Route::get('/sifremi-unuttum','App\Http\Controllers\front\IndexController@sifremiunuttum')->name('front.sifremiunuttum');
Route::post('/sifremi-unuttum','App\Http\Controllers\front\IndexController@sifremiunuttumpost')->name('front.sifremiunuttumpost');
Route::post('/flogin','App\Http\Controllers\front\IndexController@login')->name('front.login');
Route::get('/flogout','App\Http\Controllers\front\IndexController@logout')->name('front.logout');
Route::get('/ilan','App\Http\Controllers\front\IndexController@ilan')->name('front.ilan');
Route::get('/ara','App\Http\Controllers\front\IndexController@ara')->name('front.ara');
Route::get('/ilan-detay/{id}','App\Http\Controllers\front\IndexController@ilan_detay')->name('front.ilan_detay');

Route::group(['prefix' => 'yonetim'], function() {
    Route::get('/giris','App\Http\Controllers\back\IndexController@login')->name('back.giris');
    Route::post('/girispost','App\Http\Controllers\back\IndexController@loginpost')->name('back.girispost');
    Route::get('/sifremi-unuttum','App\Http\Controllers\back\IndexController@sifremiunuttum')->name('back.sifremiunuttum');
    Route::post('/sifremi-unuttum','App\Http\Controllers\back\IndexController@sifremiunuttumpost')->name('back.sifremiunuttumpost');
    Route::group(['middleware' => 'buadminmi'], function() {
    Route::get('/','App\Http\Controllers\back\IndexController@index')->name('back.index');

    Route::get('/logout','App\Http\Controllers\back\IndexController@logout')->name('back.logout');
        Route::group(['prefix' => 'ilan'], function() {
            Route::get('/ekle','App\Http\Controllers\back\Ilan\IlanController@index')->name('ilan.ekle');
            Route::post('/ekle','App\Http\Controllers\back\Ilan\IlanController@store')->name('ilan.eklepost');
            Route::get('/liste','App\Http\Controllers\back\Ilan\IlanController@liste')->name('ilan.liste');
        });

    });
});
