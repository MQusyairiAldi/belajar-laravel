<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\LoginRegisterController;
use  App\Http\Controllers\AdminController;

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
Route::middleware(['guest'])->group(function (){
    Route::get('/', function () {
    return view('home');
});

Route::get('/auth/login',[LoginRegisterController::class, 'login'])->name('auth.login');
Route::get('/auth/register',[LoginRegisterController::class, 'register'])->name('auth.register');
});

Route::group(['middleware'=>['auth','checklevel:admin']], function(){
    Route::get('/admin/home',[LoginRegisterController::class, 'adminhome'])->name('admin.home');
    Route::get('/admin/tambah', [AdminController::class, 'tambah'])->name('admin.tambah');
    Route::get('/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
    Route::get('/deleteAdmin/{id}', [AdminController::class,'deleteAdmin'])->name('deleteAdmin');

    Route::get('/admin/buku', [AdminController::class, 'adminBuku'])->name('admin.buku');
    Route::get('/admin/tambahBuku', [AdminController::class,'tambahBuku'])->name('admin.tambahBuku');
    Route::get('/admin/editBuku/{id}', [AdminController::class,'editBuku'])->name('admin.editBuku');
    Route::get('/admin/deleteBuku/{id}', [AdminController::class,'deleteBuku'])->name('admin.deleteBuku');

    Route::get('/admin/dosen', [AdminController::class, 'admindosen'])->name('admin.dosen');
    Route::get('/admin/tambahdosen', [AdminController::class,'tambahdosen'])->name('admin.tambahdosen');
    Route::get('/admin/editdosen/{id}', [AdminController::class,'editdosen'])->name('admin.editdosen');
    Route::get('/admin/deletedosen/{id}', [AdminController::class,'deletedosen'])->name('admin.deletedosen');

    Route::get('/admin/berita', [AdminController::class, 'adminberita'])->name('admin.berita');
    Route::get('/admin/tambahberita', [AdminController::class,'tambahberita'])->name('admin.tambahberita');
    Route::get('/admin/editberita/{id}', [AdminController::class,'editberita'])->name('admin.editberita');
    Route::get('/admin/deleteberita/{id}', [AdminController::class,'deleteberita'])->name('admin.deleteberita');

    Route::get('/admin/peminjaman', [AdminController::class, 'adminpeminjaman'])->name('admin.peminjaman');
    Route::get('/admin/tambahPeminjaman', [AdminController::class,'tambahPeminjaman'])->name('admin.tambahPeminjaman');
    Route::get('/admin/editPeminjaman/{id}', [AdminController::class,'editPeminjaman'])->name('admin.editPeminjaman');
    Route::get('/admin/deletePeminjaman/{id}', [AdminController::class,'deletePeminjaman'])->name('admin.deletePeminjaman');
    Route::get('/admin/detailPeminjaman/{id}', [AdminController::class,'detailPeminjaman'])->name('admin.detailPeminjaman');
    Route::get('/admin/cetakPeminjaman', [AdminController::class,'cetakPeminjaman'])->name('admin.cetakPeminjaman');
    


});

Route::group(['middleware'=>['auth','checklevel:user']], function(){
    Route::get('/user/home',[LoginRegisterController::class, 'userhome'])->name('user.home');
});

Route::get('/auth/prodi',[LoginRegisterController::class, 'prodi'])->name('auth.prodi');
Route::get('/auth/berita',[LoginRegisterController::class, 'berita'])->name('auth.berita');
Route::get('/auth/alumni',[LoginRegisterController::class, 'alumni'])->name('auth.alumni');
Route::get('/auth/aktifitas',[LoginRegisterController::class, 'aktifitas'])->name('auth.aktifitas');


Route::post('/postRegister',[LoginRegisterController::class, 'postRegister'])->name('postRegister');
Route::post('/postLogin',[LoginRegisterController::class, 'postLogin'])->name('postLogin');
Route::get('/logout',[LoginRegisterController::class, 'logout'])->name('logout');
Route::get('/admin/inputberita',[LoginRegisterController::class, 'inputberita'])->name('admin.inputberita');
Route::get('/admin/inputdosen',[LoginRegisterController::class, 'inputdosen'])->name('admin.inputdosen');
Route::get('/admin/datadosen',[LoginRegisterController::class, 'datadosen'])->name('admin.datadosen');


Route::post('/tambahAdmin', [AdminController::class, 'tambahAdmin'])->name('tambahAdmin');
Route::post('/postEditAdmin/{id}', [AdminController::class,'postEditAdmin'])->name('postEditAdmin');


Route::post('/postTambahBuku', [AdminController::class,'postTambahBuku'])->name('postTambahBuku');
Route::post('/postEditBuku/{id}', [AdminController::class,'postEditBuku'])->name('postEditBuku');
Route::post('/postTambahAdmin', [AdminController::class,'postTambahAdmin'])->name('postTambahAdmin');

Route::post('/postTambahdosen', [AdminController::class,'postTambahdosen'])->name('postTambahdosen');
Route::post('/postEditdosen/{id}', [AdminController::class,'postEditdosen'])->name('postEditdosen');
Route::post('/postTambahdosen', [AdminController::class,'postTambahdosen'])->name('postTambahdosen');

Route::post('/postTambahberita', [AdminController::class,'postTambahberita'])->name('postTambahberita');
Route::post('/postEditberita/{id}', [AdminController::class,'postEditberita'])->name('postEditberita');
Route::post('/postTambahberita', [AdminController::class,'postTambahberita'])->name('postTambahberita');

Route::post('/postEditPeminjaman/{id}', [AdminController::class,'postEditPeminjaman'])->name('postEditPeminjaman');
Route::post('/postTambahPeminjaman', [AdminController::class,'postTambahPeminjaman'])->name('postTambahPeminjaman');