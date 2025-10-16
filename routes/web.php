<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Rute untuk Pengguna yang BELUM LOGIN (Guest) ---
Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});


// --- Rute untuk Pengguna yang SUDAH LOGIN ---

// Rute Logout (harus di luar grup 'guest')
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute "Pengatur Lalu Lintas" Setelah Login
Route::middleware('auth')->get('/home', [HomeController::class, 'index'])->name('home');

// Grup Rute yang Dilindungi (Hanya untuk Admin, Petugas, dan Dosen)
Route::middleware(['auth', 'role:admin,petugas,dosen'])->group(function () {

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('courses', CourseController::class);
    Route::resource('lecturers', LecturerController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('timeslots', TimeslotController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('users', UserController::class)->except(['show', 'edit', 'update']);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
