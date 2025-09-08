<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\FotoDashboardController;
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
route::get('testing',function(){
    return view('layout.template');
});

Route::get('/dsfdf', function () {
    return view('welcome');
});

//berita
Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/create', [App\Http\Controllers\BeritaController::class, 'create'])->name('berita.create');
Route::post('/berita/store', [App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');
Route::delete('/berita/{id}', [App\Http\Controllers\BeritaController::class,'destroy'])->name('berita.destroy');
Route::get('/berita/{id}/edit', [App\Http\Controllers\BeritaController::class, 'edit'])->name('berita.edit');
Route::post('/berita/{id}/update', [App\Http\Controllers\BeritaController::class, 'update'])->name('berita.update');

//poli
Route::get('/poli', [App\Http\Controllers\PoliController::class, 'index'])->name('poli.index');
Route::get('/poli/create', [App\Http\Controllers\PoliController::class, 'create'])->name('poli.create');
Route::post('/poli/store', [App\Http\Controllers\PoliController::class, 'store'])->name('poli.store');
Route::delete('/poli/{id}', [App\Http\Controllers\PoliController::class,'destroy'])->name('poli.destroy');

Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [App\Http\Controllers\PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai/store', [App\Http\Controllers\PegawaiController::class, 'store'])->name('pegawai.store');
Route::delete('/pegawai/{id}', [App\Http\Controllers\PegawaiController::class,'destroy'])->name('pegawai.destroy');
Route::get('/pegawai/edit', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('posts.edit');

//dokter
Route::get('/dokter', [App\Http\Controllers\DokterController::class, 'index'])->name('dokter.index');
Route::get('/dokter/create', [App\Http\Controllers\DokterController::class, 'create'])->name('dokter.create');
Route::post('/dokter/store', [App\Http\Controllers\DokterController::class, 'store'])->name('dokter.store');
Route::delete('/dokter/{id}', [App\Http\Controllers\DokterController::class,'destroy'])->name('dokter.destroy');
Route::get('/dokter/{id}/edit', [App\Http\Controllers\DokterController::class, 'edit'])->name('dokter.edit');
Route::post('/dokter/{id}/update', [App\Http\Controllers\DokterController::class, 'update'])->name('dokter.update');
Route::post('/jadwal-dokter', [App\Http\Controllers\JadwalDokterController::class, 'store'])->name('jadwal.store');
Route::get('/jadwal-dokter/{id}', [App\Http\Controllers\JadwalDokterController::class, 'getJadwal'])->name('jadwal.get');

//rawat jalan
Route::get('/rawatjalan', [App\Http\Controllers\RawatJalanController::class, 'index'])->name('rawatjalan.index');
Route::get('/rawatjalan/create', [App\Http\Controllers\RawatJalanController::class, 'create'])->name('rawatjalan.create');
Route::post('/rawatjalan/store', [App\Http\Controllers\RawatJalanController::class, 'store'])->name('rawatjalan.store');
Route::delete('/rawatjalan/{id}', [App\Http\Controllers\RawatJalanController::class,'destroy'])->name('rawatjalan.destroy');
Route::get('/rawatjalan/{id}/edit', [App\Http\Controllers\RawatJalanController::class, 'edit'])->name('rawatjalan.edit');
Route::post('/rawatjalan/{id}/update', [App\Http\Controllers\RawatJalanController::class, 'update'])->name('rawatjalan.update');

//rawat inap
Route::get('/rawatinap', [App\Http\Controllers\RawatInapController::class, 'index'])->name('rawatinap.index');
Route::get('/rawatinap/create', [App\Http\Controllers\RawatInapController::class, 'create'])->name('rawatinap.create');
Route::post('/rawatinap/store', [App\Http\Controllers\RawatInapController::class, 'store'])->name('rawatinap.store');
Route::delete('/rawatinap/{id}', [App\Http\Controllers\RawatInapController::class,'destroy'])->name('rawatinap.destroy');
Route::get('/rawatinap/{id}/edit', [App\Http\Controllers\RawatInapController::class, 'edit'])->name('rawatinap.edit');
Route::post('/rawatinap/{id}/update', [App\Http\Controllers\RawatInapController::class, 'update'])->name('rawatinap.update');

//ugd
Route::get('/ugd', [App\Http\Controllers\UgdController::class, 'index'])->name('ugd.index');
Route::get('/ugd/create', [App\Http\Controllers\UgdController::class, 'create'])->name('ugd.create');
Route::post('/ugd/store', [App\Http\Controllers\UgdController::class, 'store'])->name('ugd.store');
Route::delete('/ugd/{id}', [App\Http\Controllers\UgdController::class,'destroy'])->name('ugd.destroy');
Route::get('/ugd/{id}/edit', [App\Http\Controllers\UgdController::class, 'edit'])->name('ugd.edit');
Route::post('/ugd/{id}/update', [App\Http\Controllers\UgdController::class, 'update'])->name('ugd.update');

//img
Route::get('/img', [App\Http\Controllers\ImgController::class, 'index'])->name('img.index');
Route::get('/img/create', [App\Http\Controllers\ImgController::class, 'create'])->name('img.create');
Route::post('/img/store', [App\Http\Controllers\ImgController::class, 'store'])->name('img.store');
Route::delete('/img/{id}', [App\Http\Controllers\ImgController::class,'destroy'])->name('img.destroy');
Route::get('/img/{id}/edit', [App\Http\Controllers\ImgController::class, 'edit'])->name('img.edit');
Route::post('/img/{id}/update', [App\Http\Controllers\ImgController::class, 'update'])->name('img.update');

ROute::get('/',[LandingController::class,'index'])->name('landing');



//foto slider
Route::get('admin/slider',[FotoDashboardController::class,'index'])->name('landing');
Route::post('admin/slider/tambah',[FotoDashboardController::class,'create'])->name('landing');
Route::put('admin/slider/update/{id}',[FotoDashboardController::class,'update'])->name('landing');
Route::delete('admin/slider/hapus/{id}',[FotoDashboardController::class,'hapus'])->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
