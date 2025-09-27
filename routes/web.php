<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Caregiver\CaregiverController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('auth.doLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegistrationController::class, 'showForm'])->name('auth.registerForm');
Route::post('/register', [RegistrationController::class, 'registerSave'])->name('auth.register');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
});


Route::get('/Caregiver/dashboard', [CaregiverController::class, 'index'])->name('caregiver.dashboard');
Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');



Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/profile', [DashboardController::class, 'profile'])->name('admin.profile');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('Caregiver.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('Caregiver.update');
