<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

Route::get('/', [HelloController::class, 'index']);