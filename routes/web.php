<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Default/LandingPage')->name('/');

Route::middleware('guest')->group(function () {
	Route::inertia('registration', 'Auth/Registration')->name('registration');
	Route::post('register-user', [AuthController::class, 'store'])->name('register-user');
});
