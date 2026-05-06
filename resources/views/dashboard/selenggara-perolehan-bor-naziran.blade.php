@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">Selenggara <span class="text-red-600">Borang Naziran (Perolehan).</span></h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Templat Borang Semakan Naziran Perolehan</p>
        </div>
        <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Borang
        </button>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Templat Borang Naziran Perolehan',
        'headers' => ['Kod Borang','Nama Borang','Versi','Kategori Naziran','Status'],
        'rows'    => [
            ['BNP-SH-01','Borang Semakan Sebut Harga','v3.2 (2024)','Proses Sebut Harga','Aktif'],
            ['BNP-TD-01','Borang Semakan Tender Terbuka','v2.8 (2024)','Proses Tender','Aktif'],
            ['BNP-RT-01','Borang Semakan Rundingan Terus','v2.5 (2024)','Rundingan Terus','Aktif'],
            ['BNP-KT-01','Borang Semakan Pengurusan Kontrak','v4.0 (2025)','Pengurusan Kontrak','Aktif'],
            ['BNP-PP-01','Borang Pematuhan Dokumen Am','v3.0 (2024)','Pematuhan Dokumen','Aktif'],
        ]
    ])
</div>
@endsection
