<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Caregiver\CaregiverController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Caregiver\ServiceRequestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Caregiver\ProfileController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('auth.doLogin');

Route::get('/register', [RegistrationController::class, 'showForm'])->name('auth.registerForm');
Route::post('/register', [RegistrationController::class, 'registerSave'])->name('auth.register');

Route::get('/forgotpassword', [ForgotPasswordController::class,'forgotpassword'])->name('auth.forgotpassword');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('Caregiver.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('Caregiver.update');

Route::get('/Caregiver/dashboard', [CaregiverController::class, 'index'])->name('caregiver.dashboard');
Route::get('/Patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/profile', [DashboardController::class, 'profile'])->name('admin.profile');

Route::get('/service-requests', [ServiceRequestController::class, 'serviceRequest'])->name('Caregiver.serviceRequest');

// Protected routes for patient only
Route::prefix('patient')->middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');
    Route::get('/service-request', [ServiceRequestController::class, 'create'])->name('patient.service.create');
    Route::post('/service-request', [ServiceRequestController::class, 'store'])->name('patient.service.store');
});

// General dashboard route — optional
Route::get('/dashboard', [RoleController::class, 'dashboard']);