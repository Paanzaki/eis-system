@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Selenggara Had Nilai Aset
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Konfigurasi Had Nilai Harta Modal & Aset Rendah</p>
        </div>
        <a href="{{ route('selenggara.aset.had-nilai', ['status' => 'kemaskini']) }}" class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Kemaskini Had
        </a>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Konfigurasi Had Nilai Aset',
        'headers' => ['Kod','Jenis Aset','Had Nilai Minimum (RM)','Had Nilai Maksimum (RM)','Status'],
        'rows'    => [
            ['HNA-01','Harta Modal','RM 2,000','Tiada Had','Aktif'],
            ['HNA-02','Aset Rendah Nilai','RM 500','RM 1,999','Aktif'],
            ['HNA-03','Aset Luput (Tiada Nilai)','RM 0','RM 499','Aktif'],
            ['HNA-04','Kenderaan (Khas)','RM 100,000','Tiada Had','Aktif'],
            ['HNA-05','Peralatan ICT Harga Tinggi','RM 50,000','Tiada Had','Aktif'],
        ]
    ])
</div>
@endsection
