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
    return view('pages.home', [
        "title" => "Dashboard",
        "sidebar" => "dashboard"
    ]);
});

Route::get('/profil', function () {
    return view('pages.profil', [
        "title" => "Profil",
        "sidebar" => ""
    ]);
});

Route::get('/profil/edit', function () {
    return view('pages.edit-profil', [
        "title" => "Edit Profil",
        "sidebar" => ""
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// PEMASUKAN
Route::get('/pemasukan/all', 'PemasukanController@all');
Route::resource('/pemasukan','PemasukanController', ['names' => 'pemasukan']);
// END PEMASUKAN

// PENGELUARAN
Route::get('/pengeluaran', function () {
    return view('pages.pengeluaran.pengeluaran', [
        "title" => "Rangkuman Pengeluaran",
        "sidebar" => "pengeluaran"
    ]);
});

Route::get('/pengeluaran/detail', function () {
    return view('pages.pengeluaran.detail', [
        "title" => "Detail Pengeluaran",
        "sidebar" => "pengeluaran"
    ]);
});

Route::get('/pengeluaran/tambah', function () {
    return view('pages.pengeluaran.tambah', [
        "title" => "Tambah Pengeluaran",
        "sidebar" => "pengeluaran"
    ]);
});

Route::get('/pengeluaran/edit', function () {
    return view('pages.pengeluaran.edit', [
        "title" => "Edit Pengeluaran",
        "sidebar" => "pengeluaran"
    ]);
});

Route::get('/pengeluaran/all', function () {
    return view('pages.pengeluaran.all', [
        "title" => "Semua Laporan Pengeluaran",
        "sidebar" => "pengeluaran"
    ]);
});
// END PENGELUARAN