<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Utama
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Halaman Perolehan
    Route::get('/perolehan', function () {
        return view('perolehan');
    })->name('perolehan');

    // Halaman Aset
    Route::get('/aset', function () {
        return view('aset');
    })->name('aset');

    // Halaman AI Chatbot
    Route::get('/chatbot', function () {
        return view('chatbot');
    })->name('chatbot');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';