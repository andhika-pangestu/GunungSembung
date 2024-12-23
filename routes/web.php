<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pages/tour-packages', [HomeController::class, 'allTourPackages'])->name('tour-packages');
Route::get('/company', function () {
    return view('pages.company');
})->name('company');



