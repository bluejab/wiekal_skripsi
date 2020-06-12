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


Route::group(['prefix' => 'band', 'middleware' => 'auth'], function() {
    route::get('','BandController@index');
    route::get('/daftar','BandController@daftar');
    Route::post('/store', 'BandController@store');
    route::get('/bandsaya','BandController@bandsaya')->name('band.saya');
    route::get('/buatacara','BandController@buatacara')->name('band.buatacara');
    Route::post('/simpanacara', 'BandController@simpanacara');
    route::get('/lihatacara','BandController@lihatacara')->name('band.lihatacara');
    route::get('/anggota','BandController@anggota')->name('band.anggota');
    route::get('/editband','BandController@editband')->name('band.edit');
    route::post('/update','BandController@update')->middleware('auth')->name('band.update');
    route::get('/seleksi','BandController@seleksianggota');
    route::get('/carianggota','BandController@carianggota')->name('band.carianggota');
    Route::post('/posting', 'BandController@posting');
    route::get('/tentang','BandController@tentang')->name('band.tentang');
    
});


Route::group(['prefix' => 'profile'], function() {
    route::get('/edit','UserController@edit')->middleware('auth')->name('profile.edit');
    route::post('/update','UserController@update')->middleware('auth')->name('profile.update');
});


