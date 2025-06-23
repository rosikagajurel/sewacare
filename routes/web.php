<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Caregiver\ProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Caregiver\CaregiverController;

Route::get('/Caregiver/dashboard', [CaregiverController::class, 'index'])->name('caregiver.dashboard');
Route::get('/Patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/profile', [DashboardController::class, 'profile'])->name('admin.profile');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('Caregiver.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('Caregiver.update');

// Route::get('/edit', function () {
//     return view('caregiver.edit');
// });

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('auth.doLogin');


Route::get('/register', [RegistrationController::class, 'showForm'])->name('auth.registerForm');
Route::post('/register', [RegistrationController::class, 'registerSave'])->name('auth.register');

Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::get('/caregiver/profile', [ProfileController::class, 'index'])->name('caregiver.profile');

Route::get('/forgotpassword', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('auth.forgotpassword');
Route::post('/forgotpassword', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('auth.forgotpassword.submit');

Route::get('/resetpassword/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('auth.resetpassword');
Route::post('/resetpassword', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('auth.resetpassword.submit');
