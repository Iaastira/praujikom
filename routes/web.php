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
//ieu front end



Route::get('/', function () {
    return view('layouts.index');
});
Route::get('THER', function () {
    return view('layouts.therwedding');
});
Route::get('rsvp', function () {
    return view('layouts.rsvp');
});
Route::get('galeri', function () {
    return view('layouts.galeri');
});
Route::get('entertainment', function () {
    return view('layouts.entertainment');
});

Route::get('dekorasi', function () {
    return view('layouts.dekorasi');
});
Route::get('rias', function () {
    return view('layouts.rias');
});Route::get('dokumentasi', function () {
    return view('layouts.dokumentasi');
});






//ieu kuduna auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin','middleware'=>'auth'],
function () {
Route::get('/', function () {
    return view('backend.index');
});
  Route::resource('dekorasi', 'dekorasiController');
});

