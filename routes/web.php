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

Auth::routes();

// Route::get('/profil/edit', function () {
//     return view('pages.edit-profil', [
//         "title" => "Edit Profil",
//         "sidebar" => ""
//     ]);
// });


Route::group(['middleware' => ['role:Admin|Pemilik']], function () {
    Route::resource('/profil','ProfilController', ['names' => 'profil']);


    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/','DashboardController', ['names' => 'dashboard']);

    // PEMASUKAN
    Route::get('/pemasukan/all', 'PemasukanController@all');
    Route::resource('/pemasukan','PemasukanController', ['names' => 'pemasukan']);
    // END PEMASUKAN

    // PENGELUARAN
    Route::get('/pengeluaran/all', 'PengeluaranController@all');
    Route::resource('/pengeluaran','PengeluaranController', ['names' => 'pengeluaran']);
    // END PENGELUARAN
});
