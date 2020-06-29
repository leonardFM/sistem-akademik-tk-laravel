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
Route::get('/frontend/login', 'frontendController@login')->name('frontend.login');


//murid
Route::get('/dashboard', 'murid\muridController@dashboard');

Route::middleware('auth:admin')->group(function () {

    // Admin
    Route::get('/admin/dashboard', 'admin\adminController@dashboard');



    //Admin-murid
    Route::get('/murid', 'admin\muridController@index');
    Route::get('/murid/create', 'admin\muridController@create');
    Route::get('/murid/ruang/{id}', 'admin\muridController@ruang');
    Route::post('/murid/create', 'admin\muridController@store');
    Route::get('/murid/detail/{murid}', 'admin\muridController@show');
    Route::get('/murid/edit/{murid}', 'admin\muridController@edit');
    Route::put('/murid/edit/{murid}', 'admin\muridController@update');
    Route::delete('/murid/delete/{murid}', 'admin\muridController@destroy');

    //Admin-kelas
    Route::get('/kelas', 'admin\kelasController@index');
    Route::get('/kelas/create', 'admin\kelasController@create');
    Route::post('/kelas/create', 'admin\kelasController@store');
    Route::get('/kelas/edit/{kelas}', 'admin\kelasController@edit');
    Route::put('/kelas/edit/{kelas}', 'admin\kelasController@update');
    Route::delete('/kelas/delete/{kelas}', 'admin\kelasController@destroy');

    //kegiatan
    Route::get('/kegiatan', 'admin\kegiatanController@index');
    Route::get('/kegiatan/create', 'admin\kegiatanController@create');
    Route::post('/kegiatan/create', 'admin\kegiatanController@store');
    Route::get('/kegiatan/edit/{kegiatan}', 'admin\kegiatanController@edit');
    Route::put('/kegiatan/edit/{kegiatan}', 'admin\kegiatanController@update');
    Route::delete('/kegiatan/delete/{kegiatan}', 'admin\kegiatanController@destroy');

    //Admin-pengumuman
    Route::get('/pengumuman', 'admin\pengumumanController@index');
    Route::get('/pengumuman/create', 'admin\pengumumanController@create');
    Route::get('/pengumuman/ruang/{id}', 'admin\pengumumanController@ruang');
    Route::post('/pengumuman/create', 'admin\pengumumanController@store');
    Route::get('/pengumuman/edit/{pengumuman}', 'admin\pengumumanController@edit');
    Route::put('/pengumuman/edit/{pengumuman}', 'admin\pengumumanController@update');
    Route::delete('/pengumuman/delete/{pengumuman}', 'admin\pengumumanController@destroy');
    Route::get('/pengumuman/detail/{pengumuman}', 'admin\pengumumanController@show');

    //Admin-ruang
    Route::get('/ruang', 'admin\ruangController@index');
    Route::get('/ruang/create', 'admin\ruangController@create');
    Route::post('/ruang/create', 'admin\ruangController@store');
    Route::get('/ruang/edit/{ruang}', 'admin\ruangController@edit');
    Route::put('/ruang/edit/{ruang}', 'admin\ruangController@update');
    Route::delete('/ruang/delete/{ruang}', 'admin\ruangController@destroy');
    Route::get('/ruang/detail/{ruang}', 'admin\ruangController@show');

    //Admin-jadwal
    Route::get('/jadwal', 'admin\jadwalController@index');
    Route::get('/jadwal/create', 'admin\jadwalController@create');
    Route::get('/jadwal/ruang/{id}', 'admin\jadwalController@ruang');
    Route::post('/jadwal/create', 'admin\jadwalController@store');
    Route::get('/jadwal/edit/{jadwal}', 'admin\jadwalController@edit');
    Route::put('/jadwal/edit/{jadwal}', 'admin\jadwalController@update');
    Route::delete('/jadwal/delete/{jadwal}', 'admin\jadwalController@destroy');
    Route::get('/jadwal/detail/{jadwal}', 'admin\jadwalController@show');
});

// pengumuman murid
Route::get('/murid/pengumuman', 'murid\pengumumanController@index');
Route::get('/murid/pengumuman/detail/{id}', 'murid\pengumumanController@detail');

//ganti password murid
Route::get('/murid/ganti_password', 'murid\gantiPasswordController@gantiPassword');
Route::put('/murid/ganti_password/{id}', 'murid\gantiPasswordController@prosesGantiPassword');


// profil murid
Route::get('/profil', 'murid\profilController@index');
Route::get('/profil/edit/{id}', 'murid\profilController@edit');
Route::put('/profil/edit/{id}', 'murid\profilController@update');
Route::put('/profil/gambar/{id}', 'murid\profilController@gambar');
Route::get('/profil/teman_kelas', 'murid\profilController@teman_kelas');

// jadwal murid
Route::get('/murid/jadwal', 'murid\jadwalController@index');




















Auth::routes();
// admin login
Route::get('/admin/login', 'Auth\adminLoginController@getLogin');
Route::post('/admin/login', 'Auth\adminLoginController@login');
Route::get('/admin/logout', 'admin\adminController@logout');


// murid login
Route::get('/murid/register', 'Auth\muridLoginController@getRegister');
Route::post('/murid/register', 'Auth\muridLoginController@register');
Route::get('/murid/login', 'Auth\muridLoginController@getLogin');
Route::post('/murid/login', 'Auth\muridLoginController@login');
Route::get('/murid/logout', 'murid\muridController@logout');

Route::get('/home', 'HomeController@index')->name('home');
