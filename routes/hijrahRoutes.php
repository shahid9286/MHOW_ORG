<?php

use App\Http\Controllers\Hijrah\HijrahController;
use Illuminate\Support\Facades\Route;

Route::get('/hijrah', [HijrahController::class, 'index'])->name('hijrah.index');