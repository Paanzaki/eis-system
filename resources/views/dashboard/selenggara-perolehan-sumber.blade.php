@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">Selenggara <span class="text-red-600">Sumber Peruntukan.</span></h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Data Rujukan Sumber Peruntukan Kerajaan</p>
        </div>
        <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Sumber
        </button>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Sumber Peruntukan',
        'headers' => ['Kod Sumber','Nama Sumber Peruntukan','Jenis','Status'],
        'rows'    => [
            ['SBR-01','Peruntukan Mengurus (OE)','Belanjawan Mengurus','Aktif'],
            ['SBR-02','Peruntukan Pembangunan (DE)','Belanjawan Pembangunan','Aktif'],
            ['SBR-03','Tabung Amanah','Sumber Amanah Khas','Aktif'],
            ['SBR-04','Geran Persekutuan','Bantuan Persekutuan','Aktif'],
            ['SBR-05','Hasil Negeri','Hasil Dalaman Negeri Selangor','Aktif'],
            ['SBR-06','Dana TERAS','Tabung Ekonomi Rakyat Selangor','Aktif'],
            ['SBR-07','Pinjaman Kerajaan','Pinjaman Daripada Kerajaan Persekutuan','Aktif'],
        ]
    ])
</div>
@endsection
