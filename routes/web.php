<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Livewire\Admin\Attendance;

// =======================
// AUTH
// =======================
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/action/login', [AuthController::class, 'actionLogin'])->name('action.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// =======================
// ROUTING ADMIN
// =======================
Route::middleware(['role:admin'])->group(function(){

    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::get('/position', function () {
        return view('admin.position');
    });

    Route::get('/employee', function () {
        return view('admin.pegawai');
    });

    Route::get('/user', function () {
        return view('admin.pengguna');
    });

    Route::get('/payroll', function () {
        return view('admin.payroll');
    });

    // ATTENDANCE ADMIN
    Route::get('/admin/attendance', Attendance::class);

});


// =======================
// ROUTING USER
// =======================
Route::middleware(['role:user'])->group(function(){

    Route::get('/attendance', function () {
        return view('user.kehadiran');
    });

});