<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StokController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\KurirController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\Admin\DiskonController;
use App\Http\Controllers\Admin\SepatuController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\PemasokController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\ReportPenjualanController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\TransaksitmpController;
use App\Http\Controllers\Pelanggan\DetailController;
use App\Http\Controllers\Pelanggan\CartController;
use App\Http\Controllers\Pelanggan\ContactController;
use App\Http\Controllers\Pelanggan\HomeController;
use App\Http\Controllers\Pelanggan\CheckoutController;
use App\Http\Controllers\Pelanggan\HistoryController;
use App\Http\Controllers\Pelanggan\ProdukController;
use App\Http\Controllers\Pelanggan\SearchController;

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

Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProdukController::class, 'index'])->name('home-produk');
Route::get('/search', [SearchController::class, 'index'])->name('home-search');
Route::get('/detail/{kode_sepatu}', [DetailController::class, 'index'])->name('detail');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'admin'], function () {
        //admin
        Route::get('/', [AdminController::class, 'home'])->name('admin_home');
        Route::get('/admin', [AdminController::class, 'index'])->name('admin_view');
        Route::get('/admin-create', [AdminController::class, 'create'])->name('admin_create');
        Route::post('/admin', [AdminController::class, 'insert'])->name('admin_insert');

        Route::get('/admin/{id_admin}', [AdminController::class, 'edit'])->name('admin_edit');
        Route::put('/admin-update', [AdminController::class, 'update'])->name('admin_update');
        Route::get('/admin-delete/{id_admin}', [AdminController::class, 'delete'])->name('admin_delete');

        //bank
        Route::get('/bank', [BankController::class, 'index'])->name('bank_view');
        Route::get('/bank-create', [BankController::class, 'create'])->name('bank_create');
        Route::post('/bank', [BankController::class, 'insert'])->name('bank_insert');

        Route::get('/bank/{id_bank}', [BankController::class, 'edit'])->name('bank_edit');
        Route::put('/bank-update', [BankController::class, 'update'])->name('bank_update');
        Route::get('/bank-delete/{id_bank}', [BankController::class, 'delete'])->name('bank_delete');

        //sepatu
        Route::get('/sepatu', [SepatuController::class, 'index'])->name('sepatu_view');
        Route::get('/sepatu-create', [SepatuController::class, 'create'])->name('sepatu_create');
        Route::post('/sepatu', [SepatuController::class, 'insert'])->name('sepatu_insert');

        Route::get('/sepatu/{id_sepatu}', [SepatuController::class, 'edit'])->name('sepatu_edit');
        Route::get('/sepatu-update', [SepatuController::class, 'update'])->name('sepatu_update');
        Route::get('/sepatu-delete/{id_sepatu}', [SepatuController::class, 'delete'])->name('sepatu_delete');


        //kategori
        Route::get('/kategori', [KategoriController::class, 'index'])->name('kat_view');
        Route::get('/kategori-create', [KategoriController::class, 'create'])->name('kat_create');
        Route::post('/kategori', [KategoriController::class, 'insert'])->name('kat_insert');

        Route::get('/kategori/{id_kategori}', [KategoriController::class, 'edit'])->name('kat_edit');
        Route::put('/kategori-update', [KategoriController::class, 'update'])->name('kat_update');
        Route::get('/kategori-delete/{id_kategori}', [KategoriController::class, 'delete'])->name('kat_delete');


        //pelanggan
        Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pel_view');
        Route::get('/pelanggan-create', [PelangganController::class, 'create'])->name('pel_create');
        Route::post('/pelanggan', [PelangganController::class, 'insert'])->name('pel_insert');

        Route::get('/pelanggan/{id_pelanggan}', [PelangganController::class, 'edit'])->name('pel_edit');
        Route::put('/pelanggan-update', [PelangganController::class, 'update'])->name('pel_update');
        Route::get('/pelanggan-delete/{id_pelanggan}', [PelangganController::class, 'delete'])->name('pel_delete');

        //stok
        Route::get('/stok', [StokController::class, 'index'])->name('stok_view');
        Route::get('/stok-create', [StokController::class, 'create'])->name('stok_create');
        Route::post('/stok', [StokController::class, 'insert'])->name('stok_insert');


        Route::get('/stok-delete/{id_stok}', [StokController::class, 'delete'])->name('stok_delete');


        // //promo
        // Route::get('/promo', [PromoController::class, 'index'])->name('promo_view');
        // Route::get('/promo-create', [PromoController::class, 'create'])->name('promo_create');
        // Route::post('/promo', [PromoController::class, 'insert'])->name('promo_insert');

        // Route::get('/promo-delete/{id_promo}', [PromoController::class, 'delete'])->name('promo_delete');


        //diskon
        Route::get('/diskon', [DiskonController::class, 'index'])->name('diskon_view');
        Route::get('/diskon-create', [DiskonController::class, 'create'])->name('diskon_create');
        Route::post('/diskon', [DiskonController::class, 'insert'])->name('diskon_insert');


        Route::post('/diskon/{id_diskon}', [DiskonController::class, 'edit'])->name('diskon_edit');
        Route::post('/diskon-edit/{id_diskon}', [DiskonController::class, 'update'])->name('diskon_update');

        Route::get('/diskon-delete/{id_diskon}', [diskonController::class, 'delete'])->name('diskon_delete');



        //kurir
        Route::get('/kurir', [KurirController::class, 'index'])->name('kurir_view');
        Route::get('/kurir-create', [KurirController::class, 'create'])->name('kurir_create');
        Route::post('/kurir', [KurirController::class, 'insert'])->name('kurir_insert');

        Route::get('/kurir/{id_kurir}', [KurirController::class, 'edit'])->name('kurir_edit');
        Route::put('/kurir-update', [KurirController::class, 'update'])->name('kurir_update');
        Route::get('/kurir-delete/{id_kurir}', [KurirController::class, 'delete'])->name('kurir_delete');

        // pemasok
        Route::get('/pemasok', [PemasokController::class, 'index'])->name('pemasok_view');
        Route::get('/pemasok-create', [PemasokController::class, 'create'])->name('pemasok_create');
        Route::post('/pemasok', [PemasokController::class, 'insert'])->name('pemasok_insert');

        Route::get('/pemasok/{id}', [PemasokController::class, 'edit'])->name('pemasok_edit');
        Route::put('/pemasok-update/{id}', [PemasokController::class, 'update'])->name('pemasok_update');
        Route::get('/pemasok-delete/{id}', [PemasokController::class, 'delete'])->name('pemasok_delete');

        //transaksi
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi_view');
        Route::get('/transaksi-create', [TransaksiController::class, 'create'])->name('transaksi_create');
        Route::post('/transaksi', [TransaksiController::class, 'insert'])->name('transaksi_insert');

        Route::get('/transaksi/{id_transaksi}', [TransaksiController::class, 'edit'])->name('transaksi_edit');
        Route::put('/transaksi-update', [TransaksiController::class, 'update'])->name('transaksi_update');
        Route::get('/transaksi-delete/{id_transaksi}', [TransaksiController::class, 'delete'])->name('transaksi_delete');


        //transaksi tmp
        Route::get('/transaksitmp', [TransaksitmpController::class, 'index'])->name('transaksitmp_view');
        Route::get('/transaksitmp-create', [TransaksitmpController::class, 'create'])->name('transaksitmp_create');
        Route::post('/transaksitmp', [TransaksitmpController::class, 'insert'])->name('transaksitmp_insert');


        // Route::get('/kurir/{id_kurir}', [KurirController::class, 'edit'])->name('kurir_edit');
        // Route::put('/kurir-update', [KurirController::class, 'update'])->name('kurir_update');
        Route::get('/transaksitmp-delete/{id}', [TransaksitmpController::class, 'delete'])->name('transaksitmp_delete');

        // pembayaran
        Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran_view');

        // report
        Route::get('/report', [ReportPenjualanController::class, 'index'])->name('report_view');
        Route::get('/report/pdf/{tanggal}', [ReportPenjualanController::class, 'pdf'])->name('report_pdf');
    });


    // pelanggan
    Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
    Route::get('/keranjang/{kode_sepatu}', [CartController::class, 'index'])->name('keranjang');

    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'create'])->name('checkout_create');

    Route::get('/cart', [CartController::class, 'listkeranjang'])->name('cart_view');
    Route::post('/cart', [CartController::class, 'keranjang'])->name('cart_create');
    Route::post('/cart/update', [CartController::class, 'updatecart'])->name('cart_update');
    Route::delete('cart/delete/{id}', [CartController::class, 'deletecart'])->name('cart_delete');

    Route::get('/history', [HistoryController::class, 'index'])->name('history_view');
    Route::get('/history/{id_transaksi}', [HistoryController::class, 'detail'])->name('history_detail_view');
    Route::post('/history/{id_transaksi}/payment', [HistoryController::class, 'paymentInsert'])->name('history_payment_view');
});
