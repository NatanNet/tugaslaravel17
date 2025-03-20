<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/session/create',[SessionController::class, 'create']);

Route::get('session/show',[SessionController::class, 'show']);

Route::get('session/delete',[SessionController::class, 'delete']);

Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);

// menangkao data melalui inputan
Route::get('/formulir', [PegawaiController::class,'formulir']);

Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

Route::get('/cobaerror/{nama?}',[CobaController::class, 'index']);

//acara19 upload

Route::get('/upload',[UploadController::class, 'upload'])->name('upload');

Route::post('/upload/proses', [UploadController::class,'prosesUpload'])->name('upload.proses'); //haa dicobaaa

Route::post('/resize/upload', [UploadController::class, 'resizeImage'])->name('upload.resize');