<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Caregiver\ProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Caregiver\CaregiverController;
use App\Http\Controllers\Caregiver\ShiftTimeController;
use App\Http\Controllers\Caregiver\ServiceRequestController;
use App\Http\Controllers\Caregiver\CaregiverBookingController;
use App\Http\Controllers\Admin\PatientController as AdminPatientController;
use App\Http\Controllers\Admin\CaregiverController as AdminCaregiverController;


Route::get('/Caregiver/dashboard', [CaregiverController::class, 'index'])->name('caregiver.dashboard');
Route::get('/Patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/profile', [DashboardController::class, 'profile'])->name('admin.profile');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('Caregiver.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('Caregiver.update');
Route::get('/caregiver/view-certificate', [ProfileController::class, 'viewCertificate'])->name('caregiver.viewCertificate');


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






Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/patient/service', function () {
    return view('patient.service');
})->name('patient.service');

Route::get('/patient/booking', function () {
    return view('patient.booking');
})->name('patient.booking');



Route::post('/chatbot/message', [GeminiController::class, 'chat'])->name('chatbot.message');
Route::post('/chat/send', [ChatbotController::class, 'sendMessage'])->name('chat.send');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/caregiver/shift-time', [ShiftTimeController::class, 'index'])->name('caregiver.shift-time');
Route::post('/caregiver/shift-time', [ShiftTimeController::class, 'store'])->name('caregiver.shift-time.store');

Route::get('/admin/reviews', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('admin.reviews');
    Route::delete('/admin/reviews/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('admin.reviews.delete');


Route::get('/admin/appointments', [AppointmentController::class, 'index'])->name('admin.appointment');

// Route::get('/admin/patients', [PatientaController::class, 'index'])->name('admin.patient');

// Route::get('/admin/caregivers', [CaregiveraController::class, 'index'])->name('admin.caregiver');

Route::get('/admin/feedbacks', [FeedbackController::class, 'index'])->name('admin.feedback');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/patient', [AdminPatientController::class, 'index'])
        ->name('patient');

    Route::get('/caregiver', [AdminCaregiverController::class, 'index'])
        ->name('caregiver');

    Route::get('/caregiver', [AdminCaregiverController::class, 'index'])->name('caregiver');

    Route::get('/caregiver/{caregiver}/edit', [AdminCaregiverController::class, 'edit'])
        ->name('caregiver.edit');

    Route::put('/caregiver/{caregiver}', [AdminCaregiverController::class, 'update'])
        ->name('caregiver.update');

    Route::delete('/caregiver/{caregiver}', [AdminCaregiverController::class, 'destroy'])
        ->name('caregiver.destroy');

    Route::patch('/caregiver/{caregiver}/status', [AdminCaregiverController::class, 'toggleStatus'])
        ->name('caregiver.status');

    Route::get('patient/{patient}/edit', [AdminPatientController::class, 'edit'])->name('patient.edit');
    Route::put('patient/{patient}', [AdminPatientController::class, 'update'])->name('patient.update');
    Route::delete('patient/{patient}', [AdminPatientController::class, 'destroy'])->name('patient.destroy');

});

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
