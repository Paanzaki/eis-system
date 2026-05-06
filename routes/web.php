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
        Route::get('/data', function () {
            return view('dashboard.perolehan-data');
        })->name('data');
        Route::get('/carian', function () {
            return view('dashboard.perolehan-carian');
        })->name('carian');
        Route::get('/pendaftaran', function () {
            return view('dashboard.perolehan-daftar');
        })->name('index');
        Route::get('/ppt', function () {
            return view('dashboard.perolehan-ppt');
        })->name('ppt');
        Route::get('/pelaksanaan', function () {
            return view('dashboard.perolehan-pelaksanaan');
        })->name('pelaksanaan');
        Route::get('/rundingan-harga', function () {
            return view('dashboard.perolehan-rundingan-harga');
        })->name('rundingan-harga');
        Route::get('/kontrak-perunding', function () {
            return view('dashboard.perolehan-kontrak-perunding');
        })->name('kontrak-perunding');
        Route::get('/kontrak-kerja', function () {
            return view('dashboard.perolehan-kontrak-kerja');
        })->name('kontrak-kerja');
    });

    // Alias untuk Sidebar
    Route::get('/daftar-perolehan', function () {
        return view('dashboard.perolehan-daftar');
    })->name('perolehan');

    // 3. MODUL PENGURUSAN ASET (FS-EIS-MS)
    Route::prefix('aset')->name('aset.')->group(function () {
        Route::get('/senarai', function () {
            return view('dashboard.aset-senarai');
        })->name('index');
        Route::get('/pemeriksaan', function () {
            return view('dashboard.aset-pemeriksaan');
        })->name('pemeriksaan');
        Route::get('/pelupusan', function () {
            return view('dashboard.aset-pelupusan');
        })->name('pelupusan');
        Route::get('/pelantikan', function () {
            return view('dashboard.aset-pelantikan');
        })->name('pelantikan');
        Route::get('/verifikasi', function () {
            return view('dashboard.aset-verifikasi');
        })->name('verifikasi');
        Route::get('/pindahan-pelupusan', function () {
            return view('dashboard.aset-pindahan-pelupusan');
        })->name('pindahan-pelupusan');
        Route::get('/kehilangan-hapuskira', function () {
            return view('dashboard.aset-kehilangan-hapuskira');
        })->name('kehilangan-hapuskira');
    });

    // Alias untuk Sidebar
    Route::get('/maklumat-aset', function () {
        return view('dashboard.aset-senarai');
    })->name('aset');

    // 4. MODUL PENYELENGGARAAN
    Route::prefix('penyelenggaraan')->name('penyelenggaraan.')->group(function () {
        Route::get('/jadual', function () {
            return view('dashboard.aset-penyelenggaraan');
        })->name('index');

        Route::get('/aduan', function () {
            return view('dashboard.aset-penyelenggaraan');
        })->name('aduan');
        Route::get('/kenderaan', function () {
            return view('dashboard.aset-penyelenggaraan');
        })->name('kenderaan');
    });

    // Alias untuk mudahkan route sedia ada
    Route::get('/penyelenggaraan-utama', function () {
        return view('dashboard.aset-penyelenggaraan');
    })->name('penyelenggaraan');

    // 5. MODUL NAZIRAN (FB-EIS-NZ)
    Route::prefix('naziran')->name('naziran.')->group(function () {
        Route::get('/perolehan', function () {
            return view('dashboard.naziran-perolehan');
        })->name('perolehan');
        Route::get('/aset', function () {
            return view('dashboard.naziran-aset');
        })->name('aset');
    });

    Route::get('/naziran-utama', function () {
        return view('dashboard.naziran-perolehan');
    })->name('naziran');

    // 6. CHATBOT AI (FS-EIS-AI)
    Route::get('/chatbot', function () {
        return view('dashboard.chatbot');
    })->name('chatbot');

    // 7. TETAPAN & ADMIN (FS-EIS-MA)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/rbac', function () {
            return view('dashboard.admin-rbac');
        })->name('rbac');
        Route::get('/config', function () {
            return view('dashboard.admin-config');
        })->name('config');
        Route::get('/audit', function () {
            return view('dashboard.perolehan-audit');
        })->name('audit');

        // Log Viewer Connection
        Route::get('/log-viewer', function () {
            return view('dashboard.log-viewer');
        })->name('log_viewer');

        Route::get('/pengguna', function () {
            return view('dashboard.admin-pengguna');
        })->name('pengguna');
        Route::get('/peranan', function () {
            return view('dashboard.admin-peranan');
        })->name('peranan');
        Route::get('/jabatan', function () {
            return view('dashboard.admin-jabatan');
        })->name('jabatan');
    });

    // LAPORAN
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/suku-tahun', function () {
            return view('dashboard.laporan-suku-tahun');
        })->name('suku-tahun');
        Route::get('/eksekutif', function () {
            return view('dashboard.laporan-eksekutif');
        })->name('eksekutif');
        Route::get('/naziran', function () {
            return view('dashboard.laporan-naziran');
        })->name('naziran');
    });

    // SOKONGAN
    Route::prefix('sokongan')->name('sokongan.')->group(function () {
        Route::get('/migrasi', function () {
            return view('dashboard.sokongan-migrasi');
        })->name('migrasi');
        Route::get('/bantuan', function () {
            return view('dashboard.sokongan-bantuan');
        })->name('bantuan');
    });

    // SELENGGARA PEROLEHAN
    Route::prefix('selenggara/perolehan')->name('selenggara.perolehan.')->group(function () {
        Route::get('/kategori', function () {
            return view('dashboard.selenggara-perolehan-kategori');
        })->name('kategori');
        Route::get('/kaedah', function () {
            return view('dashboard.selenggara-perolehan-kaedah');
        })->name('kaedah');
        Route::get('/sumber', function () {
            return view('dashboard.selenggara-perolehan-sumber');
        })->name('sumber');
        Route::get('/jabatan', function () {
            return view('dashboard.selenggara-perolehan-jabatan');
        })->name('jabatan');
        Route::get('/memohon', function () {
            return view('dashboard.selenggara-perolehan-memohon');
        })->name('memohon');
        Route::get('/kat-naziran', function () {
            return view('dashboard.selenggara-perolehan-kat-naziran');
        })->name('kat-naziran');
        Route::get('/bor-naziran', function () {
            return view('dashboard.selenggara-perolehan-bor-naziran');
        })->name('bor-naziran');
    });

    // SELENGGARA ASET
    Route::prefix('selenggara/aset')->name('selenggara.aset.')->group(function () {
        Route::get('/kategori', function () {
            return view('dashboard.selenggara-aset-kategori');
        })->name('kategori');
        Route::get('/sub-kategori', function () {
            return view('dashboard.selenggara-aset-sub');
        })->name('sub-kategori');
        Route::get('/status', function () {
            return view('dashboard.selenggara-aset-status');
        })->name('status');
        Route::get('/kuasa-melulus', function () {
            return view('dashboard.selenggara-aset-kuasa');
        })->name('kuasa-melulus');
        Route::get('/kaedah-pelupusan', function () {
            return view('dashboard.selenggara-aset-kaedah');
        })->name('kaedah-pelupusan');
        Route::get('/kat-naziran', function () {
            return view('dashboard.selenggara-aset-kat-naziran');
        })->name('kat-naziran');
        Route::get('/bor-naziran', function () {
            return view('dashboard.selenggara-aset-bor-naziran');
        })->name('bor-naziran');
        Route::get('/had-nilai', function () {
            return view('dashboard.selenggara-aset-had');
        })->name('had-nilai');
        Route::get('/templat', function () {
            return view('dashboard.selenggara-aset-templat');
        })->name('templat');
    });

    // 8. PENGURUSAN PROFIL (BREEZE)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
