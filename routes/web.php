<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\FotoDashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\VisimisiController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\GoogleController;
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



///login google
Route::get('auth/google/callback', [GoogleController::class, 'callback']);
Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('auth/logout', [GoogleController::class, 'logout'])->name('google.logout');
Route::post('landing/pengaduan/create', [GoogleController::class, 'pengaduanmail'])->name('google.pengaduan');


//landing
ROute::get('/',[LandingController::class,'index'])->name('landing');

//end landing
Route::middleware('auth')->group(function () {
//register user
Route::get('admin/user',[RegisterController::class,'index'])->name('admin.user');
Route::post('admin/user/create',[RegisterController::class,'create'])->name('admin.user.create');
Route::put('admin/user/update/{id}',[RegisterController::class,'update'])->name('admin.user.update');
Route::put('admin/user/password/{id}',[RegisterController::class,'password'])->name('admin.user.password');
Route::delete('admin/user/hapus/{id}',[RegisterController::class,'hapus'])->name('admin.user.hapus');




//berita
Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/tambah', [App\Http\Controllers\BeritaController::class, 'create'])->name('berita.tambah');
Route::post('/berita/store', [App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');
Route::delete('/berita/{id}', [App\Http\Controllers\BeritaController::class,'destroy'])->name('berita.destroy');
Route::get('/berita/{id}/edit', [App\Http\Controllers\BeritaController::class, 'edit'])->name('berita.edit');
Route::post('/berita/{id}/update', [App\Http\Controllers\BeritaController::class, 'update'])->name('berita.update');

//poli
Route::get('/poli', [App\Http\Controllers\PoliController::class, 'index'])->name('poli.index');
Route::get('/poli/create', [App\Http\Controllers\PoliController::class, 'create'])->name('poli.create');
Route::post('/poli/store', [App\Http\Controllers\PoliController::class, 'store'])->name('poli.store');
Route::delete('/poli/{id}', [App\Http\Controllers\PoliController::class,'destroy'])->name('poli.destroy');
Route::get('/poli/{id}/edit', [App\Http\Controllers\PoliController::class, 'edit'])->name('poli.edit');
Route::post('/poli/{id}/update', [App\Http\Controllers\PoliController::class, 'update'])->name('poli.update');


Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [App\Http\Controllers\PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai/store', [App\Http\Controllers\PegawaiController::class, 'store'])->name('pegawai.store');
Route::delete('/pegawai/{id}', [App\Http\Controllers\PegawaiController::class,'destroy'])->name('pegawai.destroy');
Route::get('/pegawai/edit', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('posts.edit');

//kontak
Route::get('/admin/kontak', [KontakController::class, 'index'])->name('kontak.index');

//dokter
Route::get('/dokter', [App\Http\Controllers\DokterController::class, 'index'])->name('dokter.index');
Route::get('/dokter/create', [App\Http\Controllers\DokterController::class, 'create'])->name('dokter.create');
Route::post('/dokter/store', [App\Http\Controllers\DokterController::class, 'store'])->name('dokter.store');
Route::delete('/dokter/{id}', [App\Http\Controllers\DokterController::class,'destroy'])->name('dokter.destroy');
Route::get('/dokter/{id}/edit', [App\Http\Controllers\DokterController::class, 'edit'])->name('dokter.edit');
Route::post('/dokter/{id}/update', [App\Http\Controllers\DokterController::class, 'update'])->name('dokter.update');
Route::post('/jadwal-dokter', [App\Http\Controllers\JadwalDokterController::class, 'store'])->name('jadwal.store');
Route::get('/jadwal-dokter/{id}', [App\Http\Controllers\JadwalDokterController::class, 'getJadwal'])->name('jadwal.get');



Route::get('/pegawai/{id}/edit', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::post('/pegawai/{id}/update', [App\Http\Controllers\PegawaiController::class, 'update'])->name('pegawai.update');

Route::get('/inovasi', [App\Http\Controllers\InovasiController::class, 'index'])->name('inovasi.index');
Route::get('/inovasi/create', [App\Http\Controllers\InovasiController::class, 'create'])->name('inovasi.create');
Route::post('/inovasi/store', [App\Http\Controllers\InovasiController::class, 'store'])->name('inovasi.store');
Route::delete('/inovasi/{id}', [App\Http\Controllers\InovasiController::class,'destroy'])->name('inovasi.destroy');
Route::get('/inovasi/{id}/edit', [App\Http\Controllers\InovasiController::class, 'edit'])->name('inovasi.edit');
Route::post('/inovasi/{id}/update', [App\Http\Controllers\InovasiController::class, 'update'])->name('inovasi.update');

Route::get('/penunjang', [App\Http\Controllers\PenunjangController::class, 'index'])->name('penunjang.index');
Route::get('/penunjang/create', [App\Http\Controllers\PenunjangController::class, 'create'])->name('penunjang.create');
Route::post('/penunjang/store', [App\Http\Controllers\PenunjangController::class, 'store'])->name('penunjang.store');
Route::delete('/penunjang/{id}', [App\Http\Controllers\PenunjangController::class,'destroy'])->name('penunjang.destroy');
Route::get('/penunjang/{id}/edit', [App\Http\Controllers\PenunjangController::class, 'edit'])->name('penunjang.edit');
Route::post('/penunjang/{id}/update', [App\Http\Controllers\PenunjangController::class, 'update'])->name('penunjang.update');

//ugd
Route::get('/ugd', [App\Http\Controllers\UgdController::class, 'index'])->name('ugd.index');
Route::get('/ugd/create', [App\Http\Controllers\UgdController::class, 'create'])->name('ugd.create');
Route::post('/ugd/store', [App\Http\Controllers\UgdController::class, 'store'])->name('ugd.store');
Route::delete('/ugd/{id}', [App\Http\Controllers\UgdController::class,'destroy'])->name('ugd.destroy');
Route::get('/ugd/{id}/edit', [App\Http\Controllers\UgdController::class, 'edit'])->name('ugd.edit');
Route::post('/ugd/{id}/update', [App\Http\Controllers\UgdController::class, 'update'])->name('ugd.update');

//rawatjalan
Route::get('/rawatjalan', [App\Http\Controllers\RawatJalanController::class, 'index'])->name('rawatjalan.index');
Route::get('/rawatjalan/create', [App\Http\Controllers\RawatJalanController::class, 'create'])->name('rawatjalan.create');
Route::post('/rawatjalan/store', [App\Http\Controllers\RawatJalanController::class, 'store'])->name('rawatjalan.store');
Route::delete('/rawatjalan/{id}', [App\Http\Controllers\RawatJalanController::class,'destroy'])->name('rawatjalan.destroy');
Route::get('/rawatjalan/{id}/edit', [App\Http\Controllers\RawatJalanController::class, 'edit'])->name('rawatjalan.edit');
Route::post('/rawatjalan/{id}/update', [App\Http\Controllers\RawatJalanController::class, 'update'])->name('rawatjalan.update');

//rawatinap
Route::get('/rawatinap', [App\Http\Controllers\RawatInapController::class, 'index'])->name('rawatinap.index');
Route::get('/rawatinap/create', [App\Http\Controllers\RawatInapController::class, 'create'])->name('rawatinap.create');
Route::post('/rawatinap/store', [App\Http\Controllers\RawatInapController::class, 'store'])->name('rawatinap.store');
Route::delete('/rawatinap/{id}', [App\Http\Controllers\RawatInapController::class,'destroy'])->name('rawatinap.destroy');
Route::get('/rawatinap/{id}/edit', [App\Http\Controllers\RawatInapController::class, 'edit'])->name('rawatinap.edit');
Route::post('/rawatinap/{id}/update', [App\Http\Controllers\RawatInapController::class, 'update'])->name('rawatinap.update');
Route::post('/detailinap/store', [App\Http\Controllers\DetailInapController::class, 'store'])->name('detailinap.store');
Route::delete('/detailinap/{id}', [App\Http\Controllers\DetailInapController::class, 'destroy'])->name('detailinap.destroy');


//img
Route::get('/img', [App\Http\Controllers\ImgController::class, 'index'])->name('img.index');
Route::get('/img/create', [App\Http\Controllers\ImgController::class, 'create'])->name('img.create');
Route::post('/img/store', [App\Http\Controllers\ImgController::class, 'store'])->name('img.store');
Route::delete('/img/{id}', [App\Http\Controllers\ImgController::class,'destroy'])->name('img.destroy');
Route::get('/img/{id}/edit', [App\Http\Controllers\ImgController::class, 'edit'])->name('img.edit');
Route::post('/img/{id}/update', [App\Http\Controllers\ImgController::class, 'update'])->name('img.update');

Route::get('/pengaduan', [App\Http\Controllers\PengaduanController::class, 'index'])->name('pengaduan.index');
Route::delete('/pengaduan/{id}', [App\Http\Controllers\PengaduanController::class,'destroy'])->name('pengaduan.destroy');
Route::post('/pengaduan/{id}/balas', [App\Http\Controllers\PengaduanController::class, 'balas'])->name('pengaduan.balas');
Route::get('/pengaduan/{id}/get-balasan', [App\Http\Controllers\PengaduanController::class, 'getBalasan'])->name('pengaduan.getBalasan');


ROute::get('/',[LandingController::class,'index'])->name('landing');

//landing

Route::get('landing/sejarah',[LandingController::class,'sejarah'])->name('landing.sejarah');
Route::get('landing/visi',[LandingController::class,'visi'])->name('landing.visi');
Route::get('landing/struktur',[LandingController::class,'struktur'])->name('landing.struktur');
Route::get('landing/ugd',[LandingController::class,'ugd'])->name('landing.ugd');
Route::get('landing/rawatjalan',[LandingController::class,'rawatjalan'])->name('landing.rawatjalan');
Route::get('/rawatjalan/poli/{id}', [LandingController::class, 'detailPoli'])->name('rawatjalan.poli');
Route::get('/jadwal-dokter/{id}', [LandingController::class, 'jadwalDokter'])->name('jadwal.dokter');
Route::get('landing/penunjang',[LandingController::class,'penunjang'])->name('landing.penunjang');
Route::get('landing/berita',[LandingController::class,'berita'])->name('landing.berita');
Route::get('/berita/{id}', [LandingController::class, 'show'])->name('berita.show');
Route::get('landing/indmutu',[LandingController::class,'indmutu'])->name('landing.indmutu');
Route::get('landing/standarp',[LandingController::class,'standarp'])->name('landing.standarp');
Route::get('landing/pimpinan',[LandingController::class,'pimpinan'])->name('landing.pimpinan');
Route::get('landing/tenagamedis',[LandingController::class,'tenagamedis'])->name('landing.tenagamedis');
Route::get('landing/tenagakesehatan',[LandingController::class,'tenagakesehatan'])->name('landing.tenagakesehatan');
Route::get('landing/tpk',[LandingController::class,'tpk'])->name('landing.tpk');
Route::get('landing/tau',[LandingController::class,'tau'])->name('landing.tau');
Route::get('landing/inovasi',[LandingController::class,'inovasi'])->name('landing.inovasi');
Route::get('/inovasi/{id}', [LandingController::class, 'showInovasi'])->name('landing.inovasi.show');
Route::get('landing/pengaduan',[LandingController::class,'pengaduan'])->name('landing.pengaduan');
Route::get('landing/rawatinap',[LandingController::class,'rawatinap'])->name('landing.rawatinap');




//end landing

//admin profil
Route::get('admin/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('admin.profil');
Route::get('admin/profil/tambah', [App\Http\Controllers\ProfilController::class, 'tambah'])->name('admin.profil');
Route::post('admin/profil/create', [App\Http\Controllers\ProfilController::class, 'create'])->name('admin.profil');
Route::get('admin/profil/edit/{id}', [App\Http\Controllers\ProfilController::class, 'edit'])->name('admin.profil');
Route::put('admin/profil/update/{id}', [App\Http\Controllers\ProfilController::class, 'update'])->name('admin.profil');
Route::delete('admin/profil/hapus/{id}', [App\Http\Controllers\ProfilController::class, 'hapus'])->name('admin.profil');
//admin organisasi
Route::get('admin/organisasi', [App\Http\Controllers\OrganisasiController::class, 'index'])->name('admin.organisasi');
Route::get('admin/organisasi/tambah', [App\Http\Controllers\OrganisasiController::class, 'tambah'])->name('admin.organisasi');
Route::post('admin/organisasi/create', [App\Http\Controllers\OrganisasiController::class, 'create'])->name('admin.organisasi');
Route::get('admin/organisasi/edit/{id}', [App\Http\Controllers\OrganisasiController::class, 'edit'])->name('admin.organisasi');
Route::put('admin/organisasi/update/{id}', [App\Http\Controllers\OrganisasiController::class, 'update'])->name('admin.organisasi');
Route::delete('admin/organisasi/hapus/{id}', [App\Http\Controllers\OrganisasiController::class, 'hapus'])->name('admin.organisasi');

//admin
route::get( 'admin/misi',[VisimisiController::class,'index'])->name('data.misi.index');
route::post( 'admin/misi/tambah',[VisimisiController::class,'create'])->name('data.misi.create');
route::put( 'admin/misi/update/{id}',[VisimisiController::class,'update'])->name('data.misi.update');
route::delete( 'admin/misi/hapus/{id}',[VisimisiController::class,'hapus'])->name('data.misi.hapus');
//visi
route::get( 'admin/visi',[VisimisiController::class,'indexvisi'])->name('data.visi.index');
route::post( 'admin/visi/tambah',[VisimisiController::class,'createvisi'])->name('data.visi.create');
route::put( 'admin/visi/update/{id}',[VisimisiController::class,'updatevisi'])->name('data.visi.update');
route::delete( 'admin/visi/hapus/{id}',[VisimisiController::class,'hapusvisi'])->name('data.visi.hapus');
//moto
route::get( 'admin/moto',[VisimisiController::class,'indexmoto'])->name('data.moto.index');
route::post( 'admin/moto/tambah',[VisimisiController::class,'createmoto'])->name('data.moto.create');
route::put( 'admin/moto/update/{id}',[VisimisiController::class,'updatemoto'])->name('data.moto.update');
route::delete( 'admin/moto/hapus/{id}',[VisimisiController::class,'hapusmoto'])->name('data.moto.hapus');


//foto slider
Route::get('admin/slider',[FotoDashboardController::class,'index'])->name('landing');
Route::post('admin/slider/tambah',[FotoDashboardController::class,'create'])->name('landing');
Route::put('admin/slider/update/{id}',[FotoDashboardController::class,'update'])->name('landing');
Route::delete('admin/slider/hapus/{id}',[FotoDashboardController::class,'hapus'])->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
