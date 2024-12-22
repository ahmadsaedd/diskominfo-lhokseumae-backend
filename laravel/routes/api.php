<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\postsController;

Route::post('/login', [postsController::class, 'login']);

// Route::post('/logout', [postsController::class, 'logout']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [postsController::class, 'logout']);
    Route::get('/dashboard', [postsController::class, 'dashboard']);
});

// Contoh route di Laravel untuk memverifikasi token
Route::middleware('auth:sanctum')->get('/verify-token', function (Request $request) {
    return response()->json(['status' => 'success']);
});


Route::get('/informasi-publik', [postsController::class, 'informasipublik']);

Route::get('/staff', [postsController::class, 'index']);

Route::post('/tambah-informasipublik', [postsController::class, 'informasipost']);

Route::post('/delete-informasipublik/{id?}', [postsController::class, 'delete_informasipublik']);

Route::post('/delete-staff/{id?}', [postsController::class, 'delete_staff']);

Route::post('/tambah-staff', [postsController::class, 'tambahstaff']);


