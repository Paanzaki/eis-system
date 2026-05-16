@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Selenggara Borang Naziran (Aset)
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Templat Borang Semakan Naziran Aset</p>
        </div>
        <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Templat
        </button>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Templat Borang Naziran Aset',
        'headers' => ['Kod Borang','Nama Borang','Versi','Kategori Naziran','Status'],
        'rows'    => [
            ['BNA-VF-01','Borang Verifikasi Fizikal Aset','v4.1 (2025)','Verifikasi Fizikal','Aktif'],
            ['BNA-PL-01','Borang Penilaian Pelupusan Aset','v3.5 (2024)','Pengurusan Pelupusan','Aktif'],
            ['BNA-RK-01','Borang Semakan Rekod KEW.PA-2','v2.0 (2024)','Rekod & Dokumentasi','Aktif'],
            ['BNA-SM-01','Borang Laporan Kehilangan/Hapus Kira','v2.8 (2024)','Keselamatan Aset','Aktif'],
            ['BNA-PT-01','Borang Pindahan Aset (KEW.PA-8)','v3.0 (2024)','Pengurusan Pindahan','Aktif'],
        ]
    ])
</div>
@endsection
