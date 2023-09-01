<?php

use App\Http\Controllers\API\GarageController;
use App\Http\Controllers\API\MobileAuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [MobileAuthenticationController::class, 'login'])->name('login');
Route::post('/register', [MobileAuthenticationController::class, 'register'])->name('register');;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/garages', [GarageController::class, 'index'])->name('garages.index');
});
