<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\ApplyBaru;
use App\User;

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

Route::get('/home/apply/{id}', 'HomeController@apply');
Route::get('/keluar', 'BandController@keluar');
Route::get('/bubar', 'BandController@bubar');

route::get('/markasread', 'HomeController@MarkAsRead');



Route::group(['prefix' => 'band', 'middleware' => 'auth'], function() {
    route::get('','BandController@index');
    route::get('/daftar','BandController@daftar')->name('band.daftar');
    Route::post('/store', 'BandController@store');
    route::get('/bandsaya','BandController@bandsaya')->name('band.saya');
    route::get('/buatacara','BandController@buatacara')->name('band.buatacara');
    Route::post('/simpanacara', 'BandController@simpanacara');
    route::get('/lihatacara','BandController@lihatacara')->name('band.lihatacara');
    route::get('/anggota','BandController@anggota')->name('band.anggota');
    route::get('/editband','BandController@editband')->name('band.edit');
    route::post('/update/{id}','BandController@update')->middleware('auth')->name('band.update');
    route::get('/seleksi','BandController@seleksianggota')->name('band.seleksi');
    route::get('/carianggota','BandController@carianggota')->name('band.carianggota');
    Route::post('/posting', 'BandController@posting');
    route::get('/tentang','BandController@tentang')->name('band.tentang');
    Route::get('/seleksi/tolak/{id}','BandController@tolak')->name('seleksi.tolak');
    Route::post('/seleksi/terima/{id}','BandController@terima')->name('seleksi.terima');
    route::get('/waris','BandController@waris')->name('band.waris');
    Route::post('/waris/simpanketua', 'BandController@gantiketua')->name('waris.simpanketua');
});


Route::group(['prefix' => 'profile'], function() {
    route::get('/edit','UserController@edit')->middleware('auth')->name('profile.edit');
    route::post('/{id}/update','UserController@update')->middleware('auth')->name('profile.update');
    Route::get('/ruanganku', 'UserController@create')->name('profile.ruanganku');
    Route::get('/band/ruanganku/{id}','UserController@cekprofile')->name('profile.cekruangan');
    Route::get('/home/ruanganku/{id}','UserController@cekprofileU')->name('profile.cekruanganhome');
});

Route::post('/files','UserController@store');







// <div class="card card-success">
// <div class="card-header">
//     <h3 class="card-title">iCheck Bootstrap - Checkbox &amp; Radio Inputs</h3>
// </div>
// <div class="card-body">
//     <!-- Minimal style -->
//     @foreach($anggota as $data)
//     <div class="row">     
//     <div class="col-sm-6">
//         <!-- radio -->
//         <div class="form-group clearfix">
//         <div class="icheck-primary d-inline">             
//             <input type="radio" id="radioPrimary1" name="r1" checked>            
//             <label for="radioPrimary1">
//                 {{$data->getUserId->name}}
//             </label>                    
//         </div>                 
//         </div>
        
//     </div>
//     </div>
// @endforeach
// </div>
// <!-- /.card-body -->
// </div>
// <!-- /.card-body -->

// <!-- /.card-footer-->
// </div>

