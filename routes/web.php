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

// Route::get('/', function () {
//     return view('auth/login');
// });
Route::group(['middleware' => ['guest']], function () {
    // Login
    Route::get('/login', 'AuthController@index')->name('index');
    Route::post('/login', 'AuthController@login')->name('login');
});

Route::group(['middleware' => ['auth']], function () {
    // Admin
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/admin', 'AdminController@show')->name('admin.show');
    Route::post('/admin/create', 'AdminController@create')->name('admin.create');
    Route::delete('/admin/delete/{id}', 'AdminController@destroy')->name('admin.destroy');
    Route::get('/admin/{id}', 'AdminController@edit')->name('admin.edit');
    Route::post('/admin/update', 'AdminController@update')->name('admin.update');

    // Siswa
    Route::get('/siswa', 'SiswaController@index')->name('siswa.index');
    Route::post('/siswa/create', 'SiswaController@create')->name('siswa.create');
    Route::delete('/siswa/delete/{nis}', 'SiswaController@destroy')->name('siswa.destroy');
    Route::get('/siswa/{nis}', 'SiswaController@edit')->name('siswa.edit');
    Route::post('/siswa/update', 'SiswaController@update')->name('siswa.update');

    // Kelas
    Route::get('/kelas', 'KelasController@index')->name('kelas.index');
    Route::post('/kelas/create', 'KelasController@create')->name('kelas.create');
    Route::delete('/kelas/delete/{id}', 'KelasController@destroy')->name('kelas.destroy');
    Route::get('/kelas/{id}', 'KelasController@edit')->name('kelas.edit');
    Route::post('/kelas/update', 'KelasController@update')->name('kelas.update');

    // Profile
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::post('/profle/create', 'ProfileController@create')->name('profile.create');
    Route::delete('/profile/{id}', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');

    // Tabungan - Transaksi
    // --Saldo
    Route::post('/tabungan/get/{nis}','TabunganController@getSaldo');
    // --Setor
    Route::get('/setor', 'TabunganController@setor_index')->name('setor.index');
    Route::get('/setor/create', 'TabunganController@setor_create')->name('setor.create');
    Route::post('/setor/create', 'TabunganController@store')->name('setor.store');
    Route::delete('/setor/{id}', 'TabunganController@destroy')->name('setor.destroy');
    // --Tarik
    Route::get('/tarik', 'TabunganController@tarik_index')->name('tarik.index');
    Route::get('/tarik/create', 'TabunganController@tarik_create')->name('tarik.create');
    Route::post('/tarik/create', 'TabunganController@store')->name('tarik.store');
    Route::delete('/tarik/{id}', 'TabunganController@destroy')->name('tarik.destroy');
    // --Info
    Route::get('/info', 'TabunganController@info_index')->name('info.index');
    Route::post('/info', 'TabunganController@getInfo')->name('info.show');
    // --Tabungan
    Route::get('/tabungan', 'TabunganController@index')->name('tabungan.index');
    Route::post('/tabungan/show', 'TabunganController@show')->name('tabungan.show');
    // --Laporan
    Route::get('/laporan', 'TabunganController@laporan')->name('laporan.index');
    Route::post('/laporan/print', 'TabunganController@print')->name('laporan.print');

    // Logout
    Route::get('/logout', 'AuthController@logout')->name('logout');
});