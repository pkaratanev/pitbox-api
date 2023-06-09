<?php

use App\Http\Controllers\Auth\MobileAuthenticationController;
use Illuminate\Http\Request;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
