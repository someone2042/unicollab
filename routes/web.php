<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/login', [UserController::class, 'showLogin'])->name('user.login');

Route::post('/register', [UserController::class, 'store'])->name('user.register');

Route::get('/email/verify', [EmailController::class, 'verify_email'])->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/groups', function () {
    return view('groups');
});
