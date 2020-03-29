
<?php

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
    return redirect('/login');
});

Route::get('layouts/layout', 'AdminController@layout'); 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard_admin', 'AdminController@dashboard_admin');
    Route::get('/dashboard_waiter', 'WaiterController@dashboard_waiter');
    Route::get('/dashboard_kasir', 'KasirController@dashboard_kasir');
    Route::get('/dashboard_pelanggan', 'PelangganController@dashboard_pelanggan');
    Route::get('/dashboard_owner', 'OwnerController@dashboard_owner');

    Route::get('/akun_user', 'PenggunaController@akun_user');
    Route::get('/akun_user_tambah', 'PenggunaController@akun_user_tambah');
    Route::post('/akun_user_tambah_post', 'PenggunaController@akun_user_tambah_post');
    Route::get('/akun_user_edit/{id}', 'PenggunaController@akun_user_edit');
    Route::post('/akun_user_update', 'PenggunaController@akun_user_update');
    Route::get('/akun_user_hapus/{id}', 'PenggunaController@akun_user_hapus');
    Route::get('/akun_user_lihat/{id}', 'PenggunaController@akun_user_lihat');
    
    Route::get('/pengaturan_aplikasi', 'PengaturanAplikasiController@pengaturan_aplikasi');
    Route::post('/pengaturan_aplikasi_update', 'PengaturanAplikasiController@pengaturan_aplikasi_update');

    Route::get('/masakan', 'MasakanController@masakan');
    Route::get('/masakan_tambah', 'MasakanController@masakan_tambah');
    Route::post('/masakan_tambah_post', 'MasakanController@masakan_tambah_post');
    Route::get('/masakan_edit/{id}', 'MasakanController@masakan_edit');
    Route::post('/masakan_update', 'MasakanController@masakan_update');
    Route::get('/masakan_hapus/{id}', 'MasakanController@masakan_hapus');
    Route::get('/masakan_lihat/{id}', 'MasakanController@masakan_lihat');

    Route::get('/kategori', 'KategoriController@kategori');
    Route::get('/kategori_tambah', 'KategoriController@kategori_tambah');
    Route::post('/kategori_tambah_post', 'KategoriController@kategori_tambah_post');
    Route::get('/kategori_edit/{id}', 'KategoriController@kategori_edit');
    Route::post('/kategori_update', 'KategoriController@kategori_update');
    Route::get('/kategori_hapus/{id}', 'KategoriController@kategori_hapus');
    Route::get('/kategori_lihat/{id}', 'KategoriController@kategori_lihat');

    
    Route::get('/meja', 'MejaController@meja');
    Route::get('/meja_tambah', 'MejaController@meja_tambah');
    Route::post('/meja_tambah_post', 'MejaController@meja_tambah_post');
    Route::get('/meja_edit/{id}', 'MejaController@meja_edit');
    Route::post('/meja_update', 'MejaController@meja_update');
    Route::get('/meja_hapus/{id}', 'MejaController@meja_hapus');
    Route::get('/meja_lihat/{id}', 'MejaController@meja_lihat');

    
    Route::get('/kasir', 'TransaksiOrderController@kasir');
    Route::get('/kasir_tambah', 'TransaksiOrderController@kasir_tambah');
    Route::post('/kasir_tambah_post', 'TransaksiOrderController@kasir_tambah_post');
    Route::get('/kasir_edit/{id}', 'TransaksiOrderController@kasir_edit');
    Route::post('/kasir_update', 'TransaksiOrderController@kasir_update');
    Route::get('/kasir_hapus/{id}', 'TransaksiOrderController@kasir_hapus');
    Route::get('/kasir_lihat/{id}', 'TransaksiOrderController@kasir_lihat');
    
    
    Route::get('/penjualan', 'TransaksiOrderController@penjualan');
    Route::get('/penjualan_tambah', 'TransaksiOrderController@penjualan_tambah');
    Route::post('/penjualan_tambah_post', 'TransaksiOrderController@penjualan_tambah_post');
    Route::get('/penjualan_edit/{id}', 'TransaksiOrderController@penjualan_edit');
    Route::post('/penjualan_update', 'TransaksiOrderController@penjualan_update');
    Route::get('/penjualan_hapus/{id}', 'TransaksiOrderController@penjualan_hapus');
    Route::get('/penjualan_lihat/{id}', 'TransaksiOrderController@penjualan_lihat');

    Route::post('/pesan_order', 'TransaksiOrderController@pesan_order');
    Route::get('/order_hapus/{id_order}', 'TransaksiOrderController@order_hapus');
    Route::post('/order_update', 'TransaksiOrderController@order_update');
    Route::post('/order_bayar', 'TransaksiOrderController@order_bayar');

    Route::get('/transaksi_penjualan', 'TransaksiPenjualanController@transaksi_penjualan');
    Route::get('/transaksi_lihat/{id_transaksi}', 'TransaksiPenjualanController@transaksi_lihat');
    Route::get('/transaksi_hapus/{id_transaksi}', 'TransaksiPenjualanController@transaksi_hapus');
    Route::get('/transaksi_print/{id_transaksi}', 'TransaksiPenjualanController@transaksi_print');
    Route::get('/filter_penjualan', 'TransaksiPenjualanController@filter_penjualan');

    Route::get('/laporan', 'LaporanController@laporan');
    Route::get('/cetak_pdf', 'LaporanController@cetak_pdf');


});

// Akhir Dashboard Admin


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
