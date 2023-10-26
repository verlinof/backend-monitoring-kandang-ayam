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

Route::post('/register', [AuthenticationController::class, 'register']);

Route::middleware(['auth:sanctum'])->group( function () {
    //Logout
    Route::get('/logout', [AuthenticationController::class, 'logout']);

    //API Kandang(Anak Kandang)
    Route::get('/kandang', [UserController::class, 'index']);
    Route::get('/kandang/{kandang:id}', [UserController::class, 'show']);

    //API Kandang (Owner)
    Route::post('/kandang', [KandangController::class, 'store']);
    //Owner access bisa melihat semua kandang yang dimiliki
    Route::get('/owner/kandang', [OwnerController::class, 'index']);
});