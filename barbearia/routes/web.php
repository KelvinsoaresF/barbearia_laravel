<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', [ServiceController::class, 'index'])->name('home');

Route::get('/register', function () {
    return view('auth.register');
})->name('register_view');

Route::post('/register', [AuthController::class, 'register'])->name('register_submit');

Route::get('/login', function () {
    return view('auth.login');
})->name('login_view');

Route::get('/service/create', function () {
    return view('service.create-service');
})->name('service_create_view');

Route::get('/service/{id}', [ServiceController::class, 'show_service'])->name('service_show_view');
