<?php

use App\Http\Controllers\Admin\ReviewNaskahController;
use App\Http\Controllers\Admin\VerifikasiPembayaranController;
use App\Http\Controllers\HargaPaketController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AlamatPenagihanController;
use App\Http\Controllers\AlamatPengirimanController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

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

// Home
Route::get('/', [BerandaController::class, 'home']);

Route::middleware(['auth','role:penulis'])->group(function () {
    //Paket Penerbitan
    Route::get('harga-paket', 'HargaPaketController@index');
    Route::get('/harga-paket/{id}', [HargaPaketController::class, 'show'])->name('harga.paket.show');
    Route::get('/get-harga', [HargaPaketController::class, 'getHarga']);
    //Cart
    Route::post('/harga-paket/pilih', [CartController::class, 'store'])->name('harga-paket.pilih');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    //Dashboard
    Route::get('dashboard', [BerandaController::class, 'dashboard']);
    //Ajukan Naskah
    Route::get('naskah-buku', 'NaskahController@index');
    Route::get('naskah-buku-add', 'NaskahController@create');
    Route::post('naskah-buku-create', 'NaskahController@store')->name('naskah.store');
    Route::delete('naskah/{naskah}', 'NaskahController@destroy')->name('naskah.destroy');
    //Alamat
    Route::get('daftar-alamat','AlamatController@index');
    //Alamat Penagihan
    Route::get('/alamat-penagihan', [AlamatPenagihanController::class, 'create'])->name('alamat-penagihan.form');
    Route::post('/alamat-penagihan', [AlamatPenagihanController::class, 'store'])->name('alamat-penagihan.store');
    Route::get('/alamat-penagihan/edit', [AlamatPenagihanController::class, 'edit'])->name('alamat-penagihan.edit');
    Route::post('/alamat-penagihan/update', [AlamatPenagihanController::class, 'update'])->name('alamat-penagihan.update');
    //Alamat Pengiriman
    Route::get('/alamat-pengiriman', [AlamatPengirimanController::class, 'create'])->name('alamat-pengiriman.form');
    Route::post('/alamat-pengiriman', [AlamatPengirimanController::class, 'store'])->name('alamat-pengiriman.store');
    Route::get('/alamat-pengiriman/edit', [AlamatPengirimanController::class, 'edit'])->name('alamat-pengiriman.edit');
    Route::post('/alamat-pengiriman/update', [AlamatPengirimanController::class, 'update'])->name('alamat-pengiriman.update');

    //Reset Password
    Route::get('ubah-password', [BerandaController::class, 'ubah_password'])->name('password.change.form');

    Route::post('/ubah-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
});

Route::middleware(['auth','role:admin'])->group(function () {
    //Review Naskah
    Route::get('review-naskah', [ReviewNaskahController::class, 'index']);
    Route::get('review-naskah-setujui/{id}', [ReviewNaskahController::class, 'setujui']);
    Route::get('review-naskah-tolak/{id}', [ReviewNaskahController::class, 'tolak']);
    //Verifikasi Pembayaran
    Route::get('verifikasi-pembayaran', [VerifikasiPembayaranController::class, 'index']);
    Route::get('verifikasi-pembayaran-setujui/{id}', [VerifikasiPembayaranController::class, 'setujui']);
    Route::get('verifikasi-pembayaran-tolak/{id}', [VerifikasiPembayaranController::class, 'tolak']);
});

//Pnerbitan Buku
Route::get('penerbitan-buku', [BerandaController::class, 'penerbitan_buku']);

//Tentang Kami
Route::get('profil', [BerandaController::class, 'profil']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', function(){
    Auth::logout();
    return redirect('login');
});

//Contact
Route::get('contact', function(){
    return view('content.contact');
});

//Marketplace
Route::get('marketplace', function(){
    return view('marketplace.index');
});