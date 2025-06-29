<?php
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Patient\ServiceRequestController;


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('auth.doLogin');


Route::get('/register', [RegistrationController::class, 'showForm'])->name('auth.registerForm');
Route::post('/register', [RegistrationController::class, 'registerSave'])->name('auth.register');

Route::prefix('patient')->middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/', [PatientController::class, 'dashboard'])->name('patient.index');
    Route::get('/service-request', [ServiceRequestController::class, 'create'])->name('patient.service.create');
    Route::post('/service-request', [ServiceRequestController::class, 'store'])->name('patient.service.store');
});