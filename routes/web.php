<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;
use App\Http\Controllers\NewContactController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\DashboardController;
/** Auth */
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/newContact', [NewContactController::class, 'indexNewController'])->name('newContact')->middleware('auth');
Route::post('/newContact', [NewContactController::class, 'createContact'])->name('createContact')->middleware('auth');

/**Auth */
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('post-message', [messageController::class, 'postMessage'])->name('postMessage');

/**TODO: styles register and login forms, media queries chats, remove contact, alter profile */