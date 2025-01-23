<?php

use App\Http\Controllers\RegencyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegencyController::class, 'populasi'])->name('regency.index');
Route::get('/luas', [RegencyController::class, 'luas'])->name('regency.luas');
