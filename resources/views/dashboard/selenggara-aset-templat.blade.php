@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Selenggara Templat Laporan Aset
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Konfigurasi Templat Jana Laporan Aset Automatik</p>
        </div>
        <a href="{{ route('selenggara.aset.templat', ['status' => 'tambah']) }}" class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Templat
        </a>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Templat Laporan Aset',
        'headers' => ['Kod Templat','Nama Laporan','Format','Skop','Status'],
        'rows'    => [
            ['TMP-A-01','Laporan Inventori Aset Tahunan','PDF / Excel','Semua Aset Aktif','Aktif'],
            ['TMP-A-02','Laporan Verifikasi Fizikal Suku Tahun','PDF','Per Suku Tahun','Aktif'],
            ['TMP-A-03','Laporan Pelupusan & Pindahan','Excel','Pelupusan & Pindahan','Aktif'],
            ['TMP-A-04','Laporan Kehilangan & Hapus Kira','PDF','Kes Kehilangan','Aktif'],
            ['TMP-A-05','Laporan Ringkasan Eksekutif Aset','PDF','KPI & Ringkasan','Aktif'],
            ['TMP-A-06','Data Aset (Eksport Mentah)','CSV','Semua Rekod','Aktif'],
        ]
    ])
</div>
@endsection
