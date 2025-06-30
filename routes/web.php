<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Caregiver\CaregiverBookingController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Caregiver\ProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Caregiver\CaregiverController;
use App\Http\Controllers\Caregiver\ServiceRequestController;

Route::get('/Caregiver/dashboard', [CaregiverController::class, 'index'])->name('caregiver.dashboard');
Route::get('/Patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/profile', [DashboardController::class, 'profile'])->name('admin.profile');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('Caregiver.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('Caregiver.update');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('auth.doLogin');

Route::get('/register', [RegistrationController::class, 'showForm'])->name('auth.registerForm');
Route::post('/register', [RegistrationController::class, 'registerSave'])->name('auth.register');

Route::get('/forgetpassword', [ForgotPasswordController::class,'forgetpassword'])->name('auth.forgetpassword');


Route::get('/service-requests', [ServiceRequestController::class, 'serviceRequest'])->name('Caregiver.serviceRequest');


Route::post('/service-requests/{id}/accept', [ServiceRequestController::class, 'acceptBasePrice'])->name('caregiver.acceptBasePrice');


Route::post('/service-requests/bid', [ServiceRequestController::class, 'placeBid'])->name('caregiver.placeBid');

Route::get('/bookings', [CaregiverBookingController::class, 'index'])->name('caregiver.bookings');
Route::post('/bookings/{bookingId}/complete', [CaregiverBookingController::class, 'markCompleted'])->name('caregiver.bookings.complete');


