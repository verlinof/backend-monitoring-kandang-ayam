<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthenticationController::class, 'login']);

// Register akun dibagi 2, buat anak kandang ma owner
Route::post('/register-anak-kandang', [AuthenticationController::class, 'registerAnakKandang']);
Route::post('/register-owner', [AuthenticationController::class, 'registerOwner']);

Route::middleware(['auth:sanctum'])->group( function () {
    //Logout
    Route::get('/logout', [AuthenticationController::class, 'logout']);

    //API Kandang(Anak Kandang)
    Route::get('/kandang', [KandangController::class, 'index']);
    Route::get('/kandang/{id}', [KandangController::class, 'show']);

    //API untuk account
    Route::middleware(['pemilik-akun'])->group(function () {
        //API user mengupdate informasi diri
        Route::patch('/user/{id}', [UserController::class, 'update']);
    });
    
    Route::delete('/user', [UserController::class, 'destroy']);

    //API untuk Owner
    Route::middleware(['owner-access'])->group(function () {
        //KANDANG
        //API buat kandang baru
        Route::post('/owner/kandang', [KandangController::class, 'store']);
        //API untuk update kandang
        Route::patch('/owner/kandang/{id}', [KandangController::class, 'update']);
        // API untuk delete kandang
        Route::delete('/owner/kandang/{id}', [KandangController::class, 'destroy']);
        //Owner access bisa melihat semua kandang yang dimiliki
        Route::get('/owner/kandang', [OwnerController::class, 'index']);

        //USER
        //Owner bisa melihat semua user yang statusnya anak kandang
        Route::get('/owner/user', [UserController::class, 'index']);
        //Owner bisa melihat anak kandang berdasarkan ID
        Route::get('/owner/user/{id}', [UserController::class, 'show']);
    });

});