<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\BarangkeluarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ExportfileController;

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/proses_login', [LoginController::class, 'proses_login'])->name('login_proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::post('/proses_register', [RegisterController::class, 'proses_register'])->name('register_proses');

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/profil_user', [DashboardController::class, 'profil'])->name('profil')->middleware('auth');
Route::get('/edit_user/{id}', [DashboardController::class, 'profil_edit'])->name('user_edit')->middleware('auth');
Route::get('/edit_user_pw/{id}', [DashboardController::class, 'profil_edit_password'])->name('user_edit_pw')->middleware('auth');
Route::put('/edit_user_proses/{id}', [DashboardController::class, 'profil_edit_proses'])->name('edit_user_proses');
Route::put('/edit_userpw_proses/{id}', [DashboardController::class, 'profil_editpw_proses'])->name('edit_userpw_proses');

// halaman kategori
Route::get('/kategori', [KategoriController::class, 'kategori'])->name('kategori')->middleware('auth');
Route::get('/create_kategori', [KategoriController::class, 'create_kategori'])->name('kategori_create')->middleware('auth');
Route::get('/edit_kategori/{id}', [KategoriController::class, 'edit_kategori'])->name('kategori_edit')->middleware('auth');
Route::post('/create_kategori_proses', [KategoriController::class, 'create_kategori_proses'])->name('tambah_kategori_proses');
Route::put('/edit_kategori_proses/{id}', [KategoriController::class, 'edit_kategori_proses'])->name('edit_kategori_proses');
Route::get('/hapus_kategori/{id}', [KategoriController::class, 'delete_kategori'])->name('kategori_hapus');

// halaman satuan
Route::get('/satuan', [SatuanController::class, 'satuan'])->name('satuan')->middleware('auth');
Route::get('/create_satuan', [SatuanController::class, 'create_satuan'])->name('satuan_create')->middleware('auth');
Route::get('/edit_satuan/{id}', [SatuanController::class, 'edit_satuan'])->name('satuan_edit')->middleware('auth');
Route::post('/create_satuan_proses', [SatuanController::class, 'create_satuan_proses'])->name('tambah_satuan_proses');
Route::put('/edit_satuan_proses/{id}', [SatuanController::class, 'edit_satuan_proses'])->name('edit_satuan_proses');
Route::get('/hapus_satuan/{id}', [SatuanController::class, 'delete_satuan'])->name('satuan_hapus');

// halaman supplier
Route::get('/supplier', [SupplierController::class, 'supplier'])->name('supplier')->middleware('auth');
Route::get('/create_supplier', [SupplierController::class, 'create_supplier'])->name('supplier_create')->middleware('auth');
Route::get('/edit_supplier/{id}', [SupplierController::class, 'edit_supplier'])->name('supplier_edit')->middleware('auth');
Route::post('/create_supplier_proses', [SupplierController::class, 'create_supplier_proses'])->name('tambah_supplier_proses');
Route::put('/edit_supplier_proses/{id}', [SupplierController::class, 'edit_supplier_proses'])->name('edit_supplier_proses');
Route::get('/hapus_supplier/{id}', [SupplierController::class, 'delete_supplier'])->name('supplier_hapus');

// halaman barang / stok barang
Route::get('/stok_barang', [StokBarangController::class, 'barang'])->name('barang')->middleware('auth');
Route::get('/create_barang', [StokBarangController::class, 'create_barang'])->name('barang_create')->middleware('auth');
Route::get('/edit_barang/{id}', [StokBarangController::class, 'edit_barang'])->name('barang_edit')->middleware('auth');
Route::post('/create_barang_proses', [StokBarangController::class, 'create_barang_proses'])->name('tambah_barang_proses');
Route::put('/edit_barang_proses/{id}', [StokBarangController::class, 'edit_barang_proses'])->name('edit_barang_proses');
Route::get('/hapus_barang/{id}', [StokBarangController::class, 'delete_barang'])->name('barang_hapus');

// halaman barang masuk
Route::get('/barang_masuk', [BarangmasukController::class, 'barang_masuk'])->name('barangmasuk')->middleware('auth');
Route::get('/create_barangmasuk', [BarangmasukController::class, 'create_barangmasuk'])->name('barangmasuk_create')->middleware('auth');
Route::get('/edit_barangmasuk/{id}', [BarangmasukController::class, 'edit_barangmasuk'])->name('barangmasuk_edit')->middleware('auth');
Route::post('/create_barangmasuk_proses', [BarangmasukController::class, 'create_barangmasuk_proses'])->name('tambah_barangmasuk_proses');
Route::put('/edit_barangmasuk_proses/{id}', [BarangmasukController::class, 'edit_barangmasuk_proses'])->name('edit_barangmasuk_proses');
Route::get('/hapus_barangmasuk/{id}', [BarangmasukController::class, 'delete_barangmasuk'])->name('barangmasuk_hapus');

// halaman barang keluar
Route::get('/barang_keluar', [BarangkeluarController::class, 'barang_keluar'])->name('barangkeluar')->middleware('auth');
Route::get('/create_barangkeluar', [BarangkeluarController::class, 'create_barangkeluar'])->name('barangkeluar_create')->middleware('auth');
Route::get('/edit_barangkeluar/{id}', [BarangkeluarController::class, 'edit_barangkeluar'])->name('barangkeluar_edit')->middleware('auth');
Route::post('/create_barangkeluar_proses', [BarangkeluarController::class, 'create_barangkeluar_proses'])->name('tambah_barangkeluar_proses');
Route::put('/edit_barangkeluar_proses/{id}', [BarangkeluarController::class, 'edit_barangkeluar_proses'])->name('edit_barangkeluar_proses');
Route::get('/hapus_barangkeluar/{id}', [BarangkeluarController::class, 'delete_barangkeluar'])->name('barangkeluar_hapus');

// halaman export file
Route::get('/export_file', [ExportfileController::class, 'export_supplier'])->name('export_file')->middleware('auth');
Route::get('/export_supplier', [ExportfileController::class, 'export_supplier'])->name('export_supplier')->middleware('auth');
Route::get('/export_barang', [ExportfileController::class, 'export_barang'])->name('export_barang')->middleware('auth');
Route::get('/export_barangmasuk', [ExportfileController::class, 'export_barangmasuk'])->name('export_barangmasuk')->middleware('auth');
Route::get('/export_barangkeluar', [ExportfileController::class, 'export_barangkeluar'])->name('export_barangkeluar')->middleware('auth');
