<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Default/LandingPage')->name('/');

Route::middleware('guest')->group(function () {
	Route::inertia('login', 'Auth/Login')->name('login');
	Route::inertia('registration', 'Auth/Registration')->name('registration');
	Route::post('register-user', [AuthController::class, 'store'])->name('register-user');
	Route::post('login-user', [AuthController::class, 'index'])->name('login-user');
});

Route::middleware('auth')->group(function () {
	Route::prefix('note-taker')->group(function () {
		Route::inertia('home', 'NoteTaker/Home')->name('note-taker/home');
		Route::post('create-note', [NoteController::class, 'store'])->name('note-taker/create-note');
		Route::get('notes', [NoteController::class, 'index'])->name('note-taker/notes');
	});

	Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
