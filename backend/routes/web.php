<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\isNotLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);

Route::prefix('testjeff')->group(function(){
    Route::get('report', [ReportController::class, 'index']);
    Route::get('report/{report_code}/{access_key}', [ReportController::class, 'show']);
});

Route::prefix('auth')->group(function(){
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('auth.login');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('register', [AuthController::class, 'showRegisterPage'])->name('auth.register');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
})->middleware(isNotLogin::class);

Route::prefix('admin')->group(function(){
    //pastiin ada dashboard ini buat dipake nanti pas mau redirect dari login
    Route::get('dashboard', function(){
        return view('admin.dashboard');
    });

    // Selalu bikin controller itu di dalam folder Controller/admin/apagitu
    // Lalu untuk view juga di buat di dalam folder resources/views/admin/apagitu
    // Cssnya tolong pake in line css aja, jangan pake file css
    // Untuk layoutnya, pake layout yang udah gua buat, di /layouts/admin.blade.php
});

Route::prefix('manager')->group(function(){
    //pastiin ada dashboard ini buat dipake nanti pas mau redirect dari login
    Route::get('dashboard', function(){
        return view('manager.dashboard');
    });

    // Selalu bikin controller itu di dalam folder Controller/manager/apagitu
    // Lalu untuk view juga di buat di dalam folder resources/views/manager/apagitu
    // Cssnya tolong pake in line css aja, jangan pake file css
    // Untuk layoutnya, pake layout yang udah gua buat, di /layouts/manager.blade.php
});

Route::prefix("government")->group(function(){
    //pastiin ada dashboard ini buat dipake nanti pas mau redirect dari login
    Route::get('dashboard', function(){
        return view('government.dashboard');
    });

    // Selalu bikin controller itu di dalam folder Controller/government/apagitu
    // Lalu untuk view juga di buat di dalam folder resources/views/government/apagitu
    // Cssnya tolong pake in line css aja, jangan pake file css
    // Untuk layoutnya, pake layout yang udah gua buat, di /layouts/manager.blade.php
});
