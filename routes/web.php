<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/forgotpassword', function () {
    return view('auth.forgotpassword');
});

Route::get('/fregister', function () {
    return view('auth.register');
});


Route::get('/resetpassword', function () {
    return view('auth.resetpassword');
});




// Route::get('/register', [RegistrationController::class,'register'])->name('auth.register'); 
// Route::post('/registerSave', [RegistrationController::class,'register'])->name('auth.registerSave');

Route::get('/forgetpassword', [ForgotPasswordController::class,'forgetpassword'])->name('auth.forgetpassword');
// Route::get('/resetpassword', [RegistrationController::class,'resetpassword'])->name('auth.resetpassword');
// Route::get('/index', [RegistrationController::class,'index'])->name('dashboard.index');

// Route::get('/admin/dashboard', [RegistrationController::class,'register'])->name('auth.register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('auth.doLogin');


Route::get('/register', [RegistrationController::class, 'showForm'])->name('auth.registerForm');
Route::post('/register', [RegistrationController::class, 'registerSave'])->name('auth.register');