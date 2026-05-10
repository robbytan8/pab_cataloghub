<?php

use App\Http\Controllers\AuthManual\AuthController;
use App\Http\Controllers\AuthManual\ForgotPasswordController;
use App\Http\Controllers\AuthManual\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
  Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
  Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
  Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
  Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
  Route::get('/forgot-password/notice', function () {
    return view('auth_mn.password-notice');
  })->name('password.notice');
});

Route::middleware('auth')->group(function () {
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});