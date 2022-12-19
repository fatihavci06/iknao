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
Route::get('/yeni-basvuru/{brans?}/{id?}','App\Http\Controllers\front\IndexController@yenibasvuru')->name('front.yenibasvuru');
Route::post('/yeni-basvuru','App\Http\Controllers\front\IndexController@store')->name('front.basvurukayit');
Route::get('/profil-duzenle','App\Http\Controllers\front\IndexController@edit')->middleware('girisyapabilirmi')->name('front.edit');
Route::get('/basvurularim','App\Http\Controllers\front\IndexController@basvurularim')->middleware('girisyapabilirmi')->name('front.basvurularim');
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
    Route::middleware(['buadminmi'])->group(function () {
    Route::get('/','App\Http\Controllers\back\IndexController@index')->name('back.index');

    Route::get('/logout','App\Http\Controllers\back\IndexController@logout')->name('back.logout');
        Route::group(['prefix' => 'ilan'], function() {
            Route::get('/ekle','App\Http\Controllers\back\Ilan\IlanController@index')->name('ilan.ekle');
            Route::post('/ekle','App\Http\Controllers\back\Ilan\IlanController@store')->name('ilan.eklepost');
            Route::get('/liste','App\Http\Controllers\back\Ilan\IlanController@liste')->name('ilan.liste');
            Route::get('/edit/{id}','App\Http\Controllers\back\Ilan\IlanController@edit')->name('ilan.edit');
            Route::post('/update/{id}','App\Http\Controllers\back\Ilan\IlanController@update')->name('ilan.update');
            Route::get('/delete/{id}','App\Http\Controllers\back\Ilan\IlanController@destroy')->name('ilan.delete');
            Route::get('/onbasvuru-liste','App\Http\Controllers\back\Ilan\IlanController@onbasvuruliste')->name('ilan.onbasvuruliste');
            Route::get('/tum-basvurular','App\Http\Controllers\back\Ilan\IlanController@tumbasvuruliste')->name('ilan.tumbasvuruliste');
            Route::get('/ilan-basvurular/{ilanid}','App\Http\Controllers\back\Ilan\IlanController@basvurular')->name('ilan.basvurular');
        });
        Route::group(['prefix' => 'aday'], function() {

            Route::get('/liste/','App\Http\Controllers\back\UserController@index')->name('aday.liste');
        });
        Route::group(['prefix' => 'calisan'], function() {

            Route::get('/liste/','App\Http\Controllers\back\UserController@calisan')->name('calisan.liste');
        });
        Route::group(['prefix' => 'izin'], function() {

            Route::get('/talep-gonder/','App\Http\Controllers\back\IzinController@talep')->name('izin.talep');
            Route::post('/talep-gonder/','App\Http\Controllers\back\IzinController@talepkayit')->name('izin.taleppost');
            Route::get('/taleplerim/','App\Http\Controllers\back\IzinController@taleplerim')->name('izin.taleplerim');
            Route::get('/talep-detay/{id}','App\Http\Controllers\back\IzinController@talepdetay')->name('izin.talepdetay');
            Route::post('/talep-guncelle/{id}','App\Http\Controllers\back\IzinController@talepupdate')->name('izin.talepupdate');
            Route::get('/talep-sil/{id}','App\Http\Controllers\back\IzinController@destroy')->name('izin.talepsil');
            Route::get('/bekleyen-izin-talepleri','App\Http\Controllers\back\IzinController@amirbekleyenizinler')->name('izin.amirbekleyenizinler');
            Route::get('/reddedilen-izin-talepleri','App\Http\Controllers\back\IzinController@amirreddedilenizinler')->name('izin.amirreddedilenizinler');
            Route::get('/onaylanan-izin-talepleri','App\Http\Controllers\back\IzinController@amironaylananizinler')->name('izin.amironaylananizinler');
            Route::get('/izin-detay/{id}','App\Http\Controllers\back\IzinController@amirdetaygor')->name('izin.amirdetaygor');
            Route::get('/izin-belge-indir/{id}','App\Http\Controllers\back\IzinController@amirbelgeindir')->name('izin.amirbelgeindir');
            Route::post('/izin-amir-onay/{id}','App\Http\Controllers\back\IzinController@amironay')->name('izin.amironay');
        });
        Route::get('/aday-detay/{id}','App\Http\Controllers\back\AdayController@adaydetay')->name('back.adaydetay');
    });
});
