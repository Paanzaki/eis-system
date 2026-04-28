<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Sistem EIS Perbendaharaan Negeri Selangor (PNS)
|--------------------------------------------------------------------------
*/

Route::get('/', function () { 
    return view('welcome'); 
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    // 1. CENTRALIZE DASHBOARD (FS-EIS-CD)
    Route::get('/dashboard', function () { 
        return view('dashboard.index'); 
    })->name('dashboard');

    // 2. MODUL PEROLEHAN (FS-EIS-MP)
    Route::prefix('perolehan')->name('perolehan.')->group(function () {
        Route::get('/data', function () { return view('dashboard.perolehan-data'); })->name('data');
        Route::get('/carian', function () { return view('dashboard.perolehan-carian'); })->name('carian');
        Route::get('/pendaftaran', function () { return view('dashboard.perolehan-daftar'); })->name('index');
    });
    
    // Alias untuk Sidebar
    Route::get('/daftar-perolehan', function () { return view('dashboard.perolehan-daftar'); })->name('perolehan');

    // 3. MODUL PENGURUSAN ASET (FS-EIS-MS)
    Route::prefix('aset')->name('aset.')->group(function () {
        Route::get('/senarai', function () { return view('dashboard.aset-senarai'); })->name('index');
        Route::get('/pemeriksaan', function () { return view('dashboard.aset-pemeriksaan'); })->name('pemeriksaan');
        Route::get('/pelupusan', function () { return view('dashboard.aset-pelupusan'); })->name('pelupusan');
        Route::get('/pelantikan', function () { return view('dashboard.aset-pelantikan'); })->name('pelantikan');
    });

    // Alias untuk Sidebar
    Route::get('/maklumat-aset', function () { return view('dashboard.aset-senarai'); })->name('aset');

    // 4. MODUL PENYELENGGARAAN
    Route::prefix('penyelenggaraan')->name('penyelenggaraan.')->group(function () {
        Route::get('/jadual', function () { 
            return view('dashboard.aset-penyelenggaraan'); 
        })->name('index');
        
        Route::get('/aduan', function () { return view('dashboard.aset-penyelenggaraan'); })->name('aduan');
        Route::get('/kenderaan', function () { return view('dashboard.aset-penyelenggaraan'); })->name('kenderaan');
    });

    // Alias untuk mudahkan route sedia ada
    Route::get('/penyelenggaraan-utama', function () { return view('dashboard.aset-penyelenggaraan'); })->name('penyelenggaraan');

    // 5. MODUL NAZIRAN (FB-EIS-NZ)
    Route::prefix('naziran')->name('naziran.')->group(function () {
        Route::get('/perolehan', function () { return view('dashboard.naziran-perolehan'); })->name('perolehan');
        Route::get('/aset', function () { return view('dashboard.naziran-aset'); })->name('aset');
    });

    Route::get('/naziran-utama', function () { return view('dashboard.naziran-perolehan'); })->name('naziran');

    // 6. CHATBOT AI (FS-EIS-AI)
    Route::get('/chatbot', function () { 
        return view('dashboard.chatbot'); 
    })->name('chatbot');

    // 7. TETAPAN & ADMIN (FS-EIS-MA)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/rbac', function () { return view('dashboard.admin-rbac'); })->name('rbac');
        Route::get('/config', function () { return view('dashboard.admin-config'); })->name('config');
        Route::get('/audit', function () { return view('dashboard.perolehan-audit'); })->name('audit');
        
        // Log Viewer Connection
        Route::get('/log-viewer', function () { 
            return view('dashboard.log-viewer'); 
        })->name('log_viewer'); 
    });

    // 8. PENGURUSAN PROFIL (BREEZE)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';