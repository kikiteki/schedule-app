<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;


Route::middleware('auth')->group(function () {

    // TopPage
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // schedule関連のルート
    Route::get('/schedules/{id}', [ScheduleController::class, 'show'])
        ->name('schedules.show');

    Route::post('/schedules', [ScheduleController::class, 'store'])
        ->name('schedules.store');

    Route::post('/schedules/{id}/update', [ScheduleController::class, 'update'])
        ->name('schedules.update');

    Route::post('/schedules/{id}/complete', [ScheduleController::class, 'complete'])
        ->name('schedules.complete');

    Route::post('/schedules/{id}/delete', [ScheduleController::class, 'delete'])
        ->name('schedules.delete');

    // ユーザープロフィール編集用のルート 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
