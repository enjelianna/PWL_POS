<?php
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level',[LevelController::class, 'index']);
Route::get('/kategori',[KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);

//tambahUser
Route::get('/user/tambah', [UserController::class, 'tambah']);

//simpanUser
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);

//ubahUser
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);

//ubahSimpan
Route::put('/user/ubah_simpan/{id}', [UserController::class,'ubah_simpan']);

//hapusUser
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);