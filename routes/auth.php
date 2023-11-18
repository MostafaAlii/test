<?php
use App\Http\Controllers\Auth\Website;
use App\Http\Controllers\Auth\Admin;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [Website\RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [Website\RegisteredUserController::class, 'store']);
    Route::get('login', [Website\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [Website\AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [Auth\PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [Auth\PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [Auth\NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [Auth\NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [Auth\EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [Auth\VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [Auth\EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [Auth\ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [Auth\ConfirmablePasswordController::class, 'store']);
    Route::put('password', [Auth\PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [Website\AuthenticatedSessionController::class, 'destroy'])->name('web.logout');
});


Route::middleware('guest')->prefix('admin')->group(function () {
    Route::get('/', [Admin\AdminAuthController::class, 'index'])->name('admin.login');
    Route::post('/', [Admin\AdminAuthController::class, 'store'])->name('admin.login.post');
});
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::post('logout', [Admin\AdminAuthController::class, 'destroy'])->name('admin.logout');
});