<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tour-packages', [HomeController::class, 'allTourPackages'])->name('tour-packages');
Route::get('/company', function () {
    return view('company');
})->name('company');

