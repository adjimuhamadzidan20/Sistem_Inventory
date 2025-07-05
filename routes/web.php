<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\BarangkeluarController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// halaman dashboard
Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// halaman kategori
Route::get('/kategori', [KategoriController::class, 'kategori'])->name('kategori');
Route::get('/create_kategori', [KategoriController::class, 'create_kategori'])->name('kategori_create');
Route::get('/edit_kategori/{id}', [KategoriController::class, 'edit_kategori'])->name('kategori_edit');
Route::post('/create_kategori_proses', [KategoriController::class, 'create_kategori_proses'])->name('tambah_kategori_proses');
Route::put('/edit_kategori_proses/{id}', [KategoriController::class, 'edit_kategori_proses'])->name('edit_kategori_proses');
Route::get('/hapus_kategori/{id}', [KategoriController::class, 'delete_kategori'])->name('kategori_hapus');

// halaman satuan
Route::get('/satuan', [SatuanController::class, 'satuan'])->name('satuan');
Route::get('/create_satuan', [SatuanController::class, 'create_satuan'])->name('satuan_create');
Route::get('/edit_satuan/{id}', [SatuanController::class, 'edit_satuan'])->name('satuan_edit');
Route::post('/create_satuan_proses', [SatuanController::class, 'create_satuan_proses'])->name('tambah_satuan_proses');
Route::put('/edit_satuan_proses/{id}', [SatuanController::class, 'edit_satuan_proses'])->name('edit_satuan_proses');
Route::get('/hapus_satuan/{id}', [SatuanController::class, 'delete_satuan'])->name('satuan_hapus');

// halaman supplier
Route::get('/supplier', [SupplierController::class, 'supplier'])->name('supplier');
Route::get('/create_supplier', [SupplierController::class, 'create_supplier'])->name('supplier_create');
Route::get('/edit_supplier/{id}', [SupplierController::class, 'edit_supplier'])->name('supplier_edit');
Route::post('/create_supplier_proses', [SupplierController::class, 'create_supplier_proses'])->name('tambah_supplier_proses');
Route::put('/edit_supplier_proses/{id}', [SupplierController::class, 'edit_supplier_proses'])->name('edit_supplier_proses');
Route::get('/hapus_supplier/{id}', [SupplierController::class, 'delete_supplier'])->name('supplier_hapus');

// halaman barang / stok barang
Route::get('/stok_barang', [StokBarangController::class, 'barang'])->name('barang');
Route::get('/create_barang', [StokBarangController::class, 'create_barang'])->name('barang_create');
Route::get('/edit_barang/{id}', [StokBarangController::class, 'edit_barang'])->name('barang_edit');
Route::post('/create_barang_proses', [StokBarangController::class, 'create_barang_proses'])->name('tambah_barang_proses');
Route::put('/edit_barang_proses/{id}', [StokBarangController::class, 'edit_barang_proses'])->name('edit_barang_proses');
Route::get('/hapus_barang/{id}', [StokBarangController::class, 'delete_barang'])->name('barang_hapus');



Route::get('/barang_masuk', [BarangmasukController::class, 'barang_masuk'])->name('barangmasuk');
Route::get('/barang_keluar', [BarangkeluarController::class, 'barang_keluar'])->name('barangkeluar');
