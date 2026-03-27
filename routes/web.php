<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// homepage
Route::get('/', function () {
    return view('pages/welcome');
});

// test | about page
Route::get('/about', function () {
    return view('pages/about');
});

// test | contacts
Route::get('/contact', function () {
    return 'Contacts';
});

// dashboard
Route::get('/dashboard', function () {
    return view('pages/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// middleware i guess
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
