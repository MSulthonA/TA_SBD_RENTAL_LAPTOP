<?php

use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;
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
    return view('administrator');
});
Route::get('/user', function () {
    return view('user');
});

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/add', [PeminjamanController::class, 'add'])->name('peminjaman.add');
Route::get('/peminjaman/edit/{id}',[PeminjamanController::class,'edit'])->name('peminjaman.edit');
Route::post('/peminjaman/update',[PeminjamanController::class,'update'])->name('peminjaman.update');
Route::get('/peminjaman/delete/{id}', [PeminjamanController::class,'delete'])->name('peminjaman.delete');
Route::post('/peminjaman/store',[PeminjamanController::class,'store'])->name('peminjaman.store');

Route::get('/laptop', [LaptopController::class, 'index'])->name('laptop.index');
Route::get('/laptop/add', [LaptopController::class, 'add'])->name('laptop.add');
Route::get('/laptop/edit/{id}',[LaptopController::class,'edit'])->name('laptop.edit');
Route::post('/laptop/update',[LaptopController::class,'update'])->name('laptop.update');
Route::get('/laptop/delete/{id}', [LaptopController::class,'delete'])->name('laptop.delete');
Route::post('/laptop/store',[LaptopController::class,'store'])->name('laptop.store');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/add', [TransaksiController::class, 'add'])->name('transaksi.add');
// Route::get('/transaksi/edit/{id}',[TransaksiController::class,'edit'])->name('transaksi.edit');
// Route::post('/transaksi/update',[TransaksiController::class,'update'])->name('transaksi.update');
Route::get('/transaksi/delete/{id}', [TransaksiController::class,'delete'])->name('transaksi.delete');
Route::post('/transaksi/store',[TransaksiController::class,'store'])->name('transaksi.store');


Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/loginuser',[LoginController::class,'loginuser'])->name('loginuser');

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/registeruser',[LoginController::class,'registeruser'])->name('registeruser');