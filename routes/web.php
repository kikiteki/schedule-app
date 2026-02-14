<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;


Route::middleware('auth')->group(function () {

    // TopPage
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // schedule関連
    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');       // 一覧
    Route::get('/schedules/{id}', [ScheduleController::class, 'show'])->name('schedules.show');     // 詳細
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');       // 新規作成
    Route::patch('/schedules/{id}', [ScheduleController::class, 'update'])->name('schedules.update');   // 更新
    Route::patch('/schedules/{id}/complete', [ScheduleController::class, 'complete'])->name('schedules.complete'); // 完了
    Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');      // 削除

    // ユーザープロフィール編集用のルート 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
