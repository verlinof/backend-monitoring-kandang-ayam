<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DataKandangController;
use App\Http\Controllers\DataKematianController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PopulationController;
use App\Http\Controllers\UserController;
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

//API Login
Route::post('/login', [AuthenticationController::class, 'login']);

// Register akun dibagi 2, buat anak kandang sama owner
Route::post('/register-anak-kandang', [AuthenticationController::class, 'registerAnakKandang']);
Route::post('/register-owner', [AuthenticationController::class, 'registerOwner']);

Route::middleware(['auth:sanctum'])->group( function () {
    /**
     * API Kandang(Anak Kandang)
     */
    //API Index anak kandang cuman buat nampilin kandang yang dia jagain
    Route::get('/kandang', [KandangController::class, 'index']);
    //API buat liat kandang spesifik
    Route::get('/kandang/{id}', [KandangController::class, 'show']);


    /**
     * API Data Kandang
     */
    Route::get('/kandang/{id}/data-kandang', [DataKandangController::class, 'index']);


    /**
     * API Account
     */
    Route::middleware(['pemilik-akun'])->group(function () {
        //API user mengupdate informasi diri
        Route::patch('/user/{id}', [UserController::class, 'update']);
    });
    //API Logout
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    //API delete akun


    /**
     * API Owner
     */
    Route::middleware(['owner-access'])->group(function () {
        /**
         * API Kandang
         */
        //API buat kandang baru
        Route::post('/owner/kandang', [KandangController::class, 'store']);
        //API untuk update kandang
        Route::patch('/owner/kandang/{id}', [KandangController::class, 'update']);
        // API untuk delete kandang
        Route::delete('/owner/kandang/{id}', [KandangController::class, 'destroy']);
        //Owner access bisa melihat semua kandang
        Route::get('/owner/kandang', [OwnerController::class, 'index']);

        Route::delete('/user/{id}', [UserController::class, 'destroy']);
        /**
         * API User
         */
        //Owner bisa melihat semua user yang statusnya anak kandang
        Route::get('/owner/user', [UserController::class, 'index']);
        //Owner bisa melihat anak kandang berdasarkan ID
        Route::get('/owner/user/{id}', [UserController::class, 'show']);
    });

    Route::middleware(['anak-kandang-access'])->group(function () {

        Route::post('/anak-kandang/data-kandang',[DataKandangController::class,'store',PopulationController::class,'store']);
        Route::post('/anak-kandang/data-kematian', [DataKematianController::class,'store']);

    });
});