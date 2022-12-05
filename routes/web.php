<?php

use App\Http\Controllers\PeminjamanController;
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
    return view('dashboard');
});

Route::get('/admin', function () {
    return view('tabel/administrator');
});
Route::get('/user', function () {
    return view('tabel/user');
});
Route::get('/laptop', function () {
    return view('tabel/laptop');
});
Route::get('/peminjaman', function () {
    return view('tabel/peminjaman');
});
Route::get('/tabel', function () {
    return view('layouts/tabel');
});
// Route::get('/table', function () {
//     return view('layouts/table');
// });
Route::get('/tabelpeminjaman', [PeminjamanController::class, 'tabelpeminjaman'])->name('tabelpeminjaman');
Route::get('/tambahpeminjaman', [PeminjamanController::class, 'tambahpeminjaman'])->name('tambahpeminjaman');



Route::get('add', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('/getindex', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('edit/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::post('update/{id}', [PeminjamanController::class,'update'])->name('peminjaman.update');
Route::post('delete/{id}', [PeminjamanController::class,'delete'])->name('peminjaman.delete');