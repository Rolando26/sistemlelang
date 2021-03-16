<?php

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
    return redirect('login');
});

Auth::routes();
Route::get('/index','HomeController@index');

Route::middleware(['auth','TanpaMasyarakat'])->group(function(){
    Route::resource('/barang','BarangController');
    Route::resource('users','UserController');
});

Route::middleware(['auth','TanpaMasyarakat','TanpaAdmin'])->group(function(){
    Route::get('lelang','LelangController@index')->name('lelang.index');
    Route::get('lelang/ganti-status/{id}','LelangController@gantistatus');
    Route::get('detail-barang/{id}','LelangController@detail');
    Route::delete('lelang/{id}','LelangController@destroy')->name('lelang.destroy');
});

Route::middleware(['auth','TanpaAdmin','TanpaPetugas'])->group(function(){
    Route::get('tawar/','TawarController@index');
    Route::get('tawar-barang/{id}','TawarController@tawar');
    Route::post('store-tawar','TawarController@store');
});

Route::middleware(['auth','TanpaMasyarakat'])->group(function(){
    Route::get('/laporan','LaporanController@index');
    Route::get('/laporan/print','LaporanController@print');
});
