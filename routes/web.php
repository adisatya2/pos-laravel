<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BedController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MasterPasienController;
use App\Http\Controllers\PasienDirawatController;

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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
    Route::resource('kategori', KategoriController::class);

    Route::get('produk/data', [ProdukController::class, 'data'])->name('produk.data');
    Route::post('produk/delete-selected', [ProdukController::class, 'deleteSelected'])->name('produk.delete_selected');
    Route::post('produk/cetak-barcode', [ProdukController::class, 'cetakBarcode'])->name('produk.cetak_barcode');
    Route::resource('produk', ProdukController::class);

    Route::get('master/pasien/data', [MasterPasienController::class, 'data'])->name('pasien.data');
    Route::get('master/pasien/cetak-barcode/{mrn}', [MasterPasienController::class, 'cetakBarcode'])->name('pasien.cetak_barcode');
    Route::resource('master/pasien', MasterPasienController::class);

    Route::get('master/dokter/data', [DokterController::class, 'data'])->name('dokter.data');
    Route::resource('master/dokter', DokterController::class);

    Route::get('master/ruangan/data', [RuanganController::class, 'data'])->name('ruangan.data');
    Route::resource('master/ruangan', RuanganController::class);

    Route::get('master/bed/data', [BedController::class, 'data'])->name('bed.data');
    Route::resource('master/bed', BedController::class);

    Route::post('bedmanagement/pasiendirawat/data', [PasienDirawatController::class, 'data'])->name('pasiendirawat.data');
    Route::put('bedmanagement/registrasirwi/{id}', [PasienDirawatController::class, 'registrasi'])->name('pasiendirawat.registrasi');
    Route::put('bedmanagement/pindahkamar/{id}', [PasienDirawatController::class, 'pindah'])->name('pasiendirawat.pindah');
    Route::post('bedmanagement/pasienpulang/{id}', [PasienDirawatController::class, 'pulang'])->name('pasiendirawat.pulang');
    Route::resource('bedmanagement/pasiendirawat', PasienDirawatController::class);
});
