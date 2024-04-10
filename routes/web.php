<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/login', [UserController::class, 'showLogin'])->name('user.login');

Route::post('/register', [UserController::class, 'store'])->name('user.register');

// Route::get('/email/verify', [UserController::class, 'verify_email'])->middleware('auth')->name('verification.notice');

Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/')->with('message', 'Your account has been created!');
})->middleware(['auth', 'signed'])->name('verification.verify');
