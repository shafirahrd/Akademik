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
    return view('home');
});

Route::get('/dosen','DosenController@index');
Route::get('/dosen/create','DosenController@create');
Route::get('/dosen/{nip}/edit','DosenController@edit');
Route::post('/dosen/{nip}/edit','DosenController@update');
Route::get('/dosen/{nip}','DosenController@destroy')->name('dosen.destroy');

Route::get('/mhs','MhsController@index');
Route::get('/mhs/create','MhsController@create');
Route::get('/mhs/{nrp}/edit','MhsController@edit');
Route::post('/mhs/{nrp}/edit','MhsController@update');
Route::get('/mhs/{nrp}','MhsController@destroy')->name('mhs.destroy');

Route::resource('mhs','MhsController');
Route::resource('dosen','DosenController');