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


Route::group(['prefix' => 'band'], function() {
    route::get('','BandController@index');
    route::get('/daftar','BandController@daftar');
    Route::post('/store', 'BandController@store');
    route::get('/bandsaya','BandController@bandsaya');
    route::get('/buatacara','BandController@buatacara');
});


Route::group(['prefix' => 'profile'], function() {
    route::get('/edit','UserController@edit')->middleware('auth')->name('profile.edit');
    route::post('/update','UserController@update')->middleware('auth')->name('profile.update');
});


