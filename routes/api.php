<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\PendudukController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    Route::apiResource('kartu_keluarga', KartuKeluargaController::class)->names([
        'index' => 'kk.index',
        'store' => 'kk.store',
        'show' => 'kk.show',
        'update' => 'kk.update',
        'destroy' => 'kk.destroy',
    ]);
    Route::apiResource('penduduk', PendudukController::class)->names([
        'index' => 'ktp.index',
        'store' => 'ktp.store',
        'show' => 'ktp.show',
        'update' => 'ktp.update',
        'destroy' => 'ktp.destroy',
    ]);
});
