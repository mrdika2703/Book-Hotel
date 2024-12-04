<?php

use App\Http\Controllers\AdminHome;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\BookingController;

// Route untuk halaman booking
Route::get('/booking', function () {
    return view('home/booking/index');
});

// Route untuk halaman about
Route::get('/about', function () {
    return view('home/about/index');
});

// Route untuk halaman coba
Route::get('/coba', function () {
    return view('home/coba');
});

// Route untuk autentikasi
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home.index');
    })->name('home');

    // Route untuk PeopleController
    Route::get('/home/add', [PeopleController::class, 'index'])->name('people.index');
    Route::post('/home/add', [PeopleController::class, 'store'])->name('people.store');
    Route::put('/home/edit/{id}', [PeopleController::class, 'update'])->name('people.update'); 
    Route::delete('/home/delete/{id}', [PeopleController::class, 'destroy'])->name('people.destroy');

    // Route untuk BookingController
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/pdf/{id}', [BookingController::class, 'generatePdf'])->name('booking.pdf');
    Route::get('/home/bookingku', [BookingController::class, 'indexx'])->name('booking.indexx');
});

// Route untuk admin
Route::get('/admin', [AdminHome::class, 'showLogin'])->name('loginadm'); // Rute untuk halaman login admin
Route::post('/admin', [AdminHome::class, 'loginadm']); // Rute untuk proses login admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminHome::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/booking', [AdminHome::class, 'booking'])->name('booking');
});

