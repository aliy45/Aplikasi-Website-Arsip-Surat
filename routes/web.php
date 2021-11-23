<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SuratController;

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
    return view('layout.backend');
});
// fungsi untuk menampilkan data dengan mengambil class index di Mastercontroller
Route::get('/surat', [SuratController::class, 'index']);


// fungsi untuk menampilkan form tambah data dengan mengambil class tambah di prokerncontroller
Route::get('/surat/tambah', [SuratController::class, 'tambah']);

// fungsi untuk memproses tambah data dengan mengambil class store di SuratController
Route::post('/surat/store', [SuratController::class, 'store']);

// fungsi untuk memproses hapus
Route::get('/surat/hapus/{id}', [SuratController::class, 'hapus']);


// return view('about');
Route::get('/about', function () {
    return view('about');
});

// fungsi untuk menampilkan form edit data menggunakan get
Route::get('/surat/lihat/{id}', [SuratController::class, 'lihat']);


// fungsi untuk menampilkan form edit data menggunakan get
Route::get('/surat/edit/{id}', [SuratController::class, 'edit']);


// fungsi untuk memproses edit data menggunakan get
Route::post('/surat/update', [SuratController::class, 'update']);
