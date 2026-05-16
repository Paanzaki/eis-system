@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Selenggara Status Aset
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Data Rujukan Status Aset Semasa</p>
        </div>
        <a href="{{ route('selenggara.aset.status', ['status' => 'tambah']) }}" class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Status
        </a>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Status Aset',
        'headers' => ['Kod Status','Label Status','Keterangan','Status Rekod'],
        'rows'    => [
            ['STA-01','Aktif','Aset dalam penggunaan normal','Aktif'],
            ['STA-02','Penyenggaraan','Aset sedang dalam kerja-kerja baik pulih','Aktif'],
            ['STA-03','Simpanan','Aset disimpan dan tidak digunakan buat sementara','Aktif'],
            ['STA-04','Hilang','Aset tidak dapat dikesan dalam verifikasi','Aktif'],
            ['STA-05','Rosak (Tidak Boleh Diperbaiki)','Aset rosak teruk dan perlu dilupuskan','Aktif'],
            ['STA-06','Dilupuskan','Aset telah diluluskan untuk pelupusan','Aktif'],
            ['STA-07','Dipindah','Aset telah dipindah ke jabatan / lokasi lain','Aktif'],
        ]
    ])
</div>
@endsection
