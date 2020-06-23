<?php

use Illuminate\Support\Facades\Auth;
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

// frontend
Route::get('/', 'frontendController@utama');

// admin
Route::get('/admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminAuthController@postLogin');

// Route::middleware('auth:admin')->group(function () {

// Admin
Route::get('/admin/dashboard', 'adminController@dashboard');

//murid
Route::get('/murid', 'admin\muridController@index');
Route::get('/murid/create', 'admin\muridController@create');
Route::get('/murid/ruang/{id}', 'admin\muridController@ruang');
Route::post('/murid/create', 'admin\muridController@store');
Route::get('/murid/detail/{murid}', 'admin\muridController@show');
Route::get('/murid/edit/{murid}', 'admin\muridController@edit');
Route::put('/murid/edit/{murid}', 'admin\muridController@update');
Route::delete('/murid/delete/{murid}', 'admin\muridController@destroy');

//kelas
Route::get('/kelas', 'admin\kelasController@index');
Route::get('/kelas/create', 'admin\kelasController@create');
Route::post('/kelas/create', 'admin\kelasController@store');
Route::get('/kelas/edit/{kelas}', 'admin\kelasController@edit');
Route::put('/kelas/edit/{kelas}', 'admin\kelasController@update');
Route::delete('/kelas/delete/{kelas}', 'admin\kelasController@destroy');

//pengumuman
Route::get('/pengumuman', 'admin\pengumumanController@index');
Route::get('/pengumuman/create', 'admin\pengumumanController@create');
Route::get('/pengumuman/ruang/{id}', 'admin\pengumumanController@ruang');
Route::post('/pengumuman/create', 'admin\pengumumanController@store');
Route::get('/pengumuman/edit/{pengumuman}', 'admin\pengumumanController@edit');
Route::put('/pengumuman/edit/{pengumuman}', 'admin\pengumumanController@update');
Route::delete('/pengumuman/delete/{pengumuman}', 'admin\pengumumanController@destroy');
Route::get('/pengumuman/detail/{pengumuman}', 'admin\pengumumanController@show');

//ruang
Route::get('/ruang', 'admin\ruangController@index');
Route::get('/ruang/create', 'admin\ruangController@create');
Route::post('/ruang/create', 'admin\ruangController@store');
Route::get('/ruang/edit/{ruang}', 'admin\ruangController@edit');
Route::put('/ruang/edit/{ruang}', 'admin\ruangController@update');
Route::delete('/ruang/delete/{ruang}', 'admin\ruangController@destroy');
Route::get('/ruang/detail/{ruang}', 'admin\ruangController@show');

//jadwal
Route::get('/jadwal', 'admin\jadwalController@index');
Route::get('/jadwal/create', 'admin\jadwalController@create');
Route::get('/jadwal/ruang/{id}', 'admin\jadwalController@ruang');
Route::post('/jadwal/create', 'admin\jadwalController@store');
Route::get('/jadwal/edit/{jadwal}', 'admin\jadwalController@edit');
Route::put('/jadwal/edit/{jadwal}', 'admin\jadwalController@update');
Route::delete('/jadwal/delete/{jadwal}', 'admin\jadwalController@destroy');
Route::get('/jadwal/detail/{jadwal}', 'admin\jadwalController@show');
// });



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
