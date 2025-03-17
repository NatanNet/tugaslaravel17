<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/session/create',[SessionController::class, 'create']);

Route::get('session/show',[SessionController::class, 'show']);

Route::get('session/delete',[SessionController::class, 'delete']);

Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);

// menangkao data melalui inputan
Route::get('formulir', [PegawaiController::class,'formulir']);

Route::post('formulir/proses', [PegawaiController::class, 'proses']);