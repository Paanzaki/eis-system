@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Selenggara Kaedah Pelupusan
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Data Rujukan Kaedah Pelupusan Aset</p>
        </div>
        <a href="{{ route('selenggara.aset.kaedah-pelupusan', ['status' => 'tambah']) }}" class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Kaedah
        </a>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Kaedah Pelupusan Aset',
        'headers' => ['Kod','Kaedah Pelupusan','Keterangan','Autoriti Meluluskan','Status'],
        'rows'    => [
            ['KPL-01','Lelong Awam','Jualan awam melalui jurulelong berlesen','Jawatankuasa Aset & Kewangan','Aktif'],
            ['KPL-02','Musnah','Pemusnahan fizikal aset tidak boleh guna','Jawatankuasa Aset & Kewangan','Aktif'],
            ['KPL-03','Derma','Penderma kepada badan kebajikan / sekolah','Pegawai Aset Negeri','Aktif'],
            ['KPL-04','Jual Terus','Jualan terus kepada pembeli yang diluluskan','Jawatankuasa Aset & Kewangan','Aktif'],
            ['KPL-05','Tukar Barang','Pertukaran dengan aset baru (trade-in)','Jawatankuasa Aset & Kewangan','Aktif'],
        ]
    ])
</div>
@endsection
