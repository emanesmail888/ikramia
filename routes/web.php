<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');

// Registration Routes
Route::get('register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class,'register']);

Route::post('/password/forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forget_password');
Route::post('/reset/password', [ResetPasswordController::class, 'passwordReset'])->name('password_reset');
Route::post('/verify/password', [ResetPasswordController::class, 'verifyCode'])->name('verify_password');
Route::get('/verify/password', [ResetPasswordController::class, 'verify'])->name('verify');
Route::get('/forget-password', [ForgetPasswordController::class, 'forget'])->name('forget');


