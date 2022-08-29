<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['guest'])->group(function () {
    Route::view('/', 'login');
    Route::post('/', [LoginController::class, 'index']);
    Route::view('/register', 'register');
    Route::view('/forget-password', 'forget-password');
    Route::view('/verify', 'verification-email-sent')->middleware('CheckEmailVerification');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/resendemail', [RegisterController::class, 'resendemail']);
    Route::get('/verifyemail/{id}/{token}', [RegisterController::class, 'verifyemail']);
});

Route::middleware(['EnsureProfileIsRequired'])->group(function () {
    Route::get('/profile', [RegisterController::class, 'profile']);
    Route::post('/profile', [RegisterController::class, 'completeReg']);
});

Route::middleware(['EnsureMemberLogin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index']);
    Route::post('/addMinistry', [UserController::class, 'addMinistry']);
});