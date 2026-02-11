<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;


Route::middleware('auth')->group(function () {
    
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
 
    // スケジュール
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');

    // ユーザープロフィール編集用のルート 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
