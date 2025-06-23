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

Route::get('/forgetpassword', [ForgotPasswordController::class,'forgetpassword'])->name('auth.forgetpassword');
