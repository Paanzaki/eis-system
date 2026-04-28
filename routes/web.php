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
    
    // ==========================================
    // 1. CENTRALIZE DASHBOARD (FS-EIS-CD)
    // ==========================================
    Route::get('/dashboard', function () { 
        return view('dashboard.index'); 
    })->name('dashboard');

    // ==========================================
    // 2. MODUL PENTADBIRAN (FS-EIS-MA)
    // ==========================================
    Route::prefix('admin')->name('admin.')->group(function () {
        // RBAC Control (Access Management)
        Route::get('/rbac', function () { return view('dashboard.admin-rbac'); })->name('rbac');

        // System Configuration (API & Parameters)
        Route::get('/config', function () { return view('dashboard.admin-config'); })->name('config');

        // Audit Logs & Security Trails
        Route::get('/audit', function () { return view('dashboard.perolehan-audit'); })->name('audit');
    });

    // ==========================================
    // 3. MODUL PEROLEHAN (FS-EIS-MP)
    // ==========================================
    Route::prefix('perolehan')->name('perolehan.')->group(function () {
        // Pendaftaran Pengguna (SSO MyDigitalID)
        Route::get('/daftar', function () { return view('dashboard.perolehan-daftar'); })->name('index');
        
        // Analitik & Kawalan ETL
        Route::get('/data', function () { return view('dashboard.perolehan-data'); })->name('data');

        // Carian & Penapisan Rekod
        Route::get('/carian', function () { return view('dashboard.perolehan-carian'); })->name('carian');
    });
    
    // Alias Sidebar
    Route::get('/perolehan-utama', function () { return view('dashboard.perolehan-daftar'); })->name('perolehan');

    // ==========================================
    // 4. MODUL PENGURUSAN ASET (FS-EIS-MS)
    // ==========================================
    Route::prefix('aset')->name('aset.')->group(function () {
        // Daftar Harta Modal & Aset Rendah
        Route::get('/senarai', function () { return view('dashboard.aset-senarai'); })->name('index');

        // Pemeriksaan & Verifikasi Fizikal
        Route::get('/pemeriksaan', function () { return view('dashboard.aset-pemeriksaan'); })->name('pemeriksaan');

        // NEW: Pengurusan Pelupusan & Hapus Kira (FB-EIS-AS)
        Route::get('/pelupusan', function () { return view('dashboard.aset-pelupusan'); })->name('pelupusan');

        // Pengurusan Pelantikan & Siasatan
        Route::get('/pelantikan', function () { return view('dashboard.aset-pelantikan'); })->name('pelantikan');
    });

    // Alias Sidebar
    Route::get('/aset-utama', function () { return view('dashboard.aset-senarai'); })->name('aset');

    // ==========================================
    // 5. MODUL NAZIRAN (FB-EIS-NZ) - NEW
    // ==========================================
    Route::get('/naziran', function () { 
        return view('dashboard.naziran-index'); 
    })->name('naziran');

    // ==========================================
    // 6. MODUL FAQ AI - CHATBOT (FS-EIS-AI)
    // ==========================================
    Route::get('/chatbot', function () { 
        return view('dashboard.chatbot'); 
    })->name('chatbot');

    // ==========================================
    // 7. PENGURUSAN PROFIL (BREEZE)
    // ==========================================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';