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

route::get('/band','BandController@index');
route::get('/band/daftar','BandController@daftar');
Route::post('/band/store', 'BandController@store');
route::get('/profile/{id}/edit','UserController@edit');
route::post('/profile/{id}/update','UserController@update');
route::get('/band/bandsaya','BandController@bandsaya');
route::get('/band/buatacara','BandController@buatacara');