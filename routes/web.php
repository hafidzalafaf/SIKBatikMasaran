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
Route::get('/pemasukan', function () {
    return view('pages.pemasukan.pemasukan', [
        "title" => "Rangkuman Pemasukan",
        "sidebar" => "pemasukan"
    ]);
});

Route::get('/pemasukan/detail', function () {
    return view('pages.pemasukan.detail-pemasukan', [
        "title" => "Detail Pemasukan",
        "sidebar" => "pemasukan"
    ]);
});


Route::get('/pemasukan/tambah', function () {
    return view('pages.pemasukan.tambah-pemasukan', [
        "title" => "Form Tambah Pemasukan",
        "sidebar" => "pemasukan"
    ]);
});

Route::get('/pemasukan/edit', function () {
    return view('pages.pemasukan.edit-pemasukan', [
        "title" => "Form Edit Pemasukan",
        "sidebar" => "pemasukan"
    ]);
});

Route::get('/pemasukan/all', function () {
    return view('pages.pemasukan.all-pemasukan', [
        "title" => "Semua Pemasukan",
        "sidebar" => "pemasukan"
    ]);
});
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