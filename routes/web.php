<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;

// Route::get('/', function () {
//     return view('home', [contactContoller::class, 'index']);
// });

Route::get('/', [contactController::class, 'index']);
