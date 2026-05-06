@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">Selenggara <span class="text-red-600">Kuasa Pelupusan.</span></h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Konfigurasi Autoriti Meluluskan Pelupusan Aset</p>
        </div>
        <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Kuasa
        </button>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Kuasa Meluluskan Pelupusan',
        'headers' => ['Kod','Pihak Berkuasa','Had Nilai Diluluskan','Rujukan Surat Arahan','Status'],
        'rows'    => [
            ['KUA-01','Pegawai Aset Negeri','≤ RM 5,000','SA/PNS/2024/001','Aktif'],
            ['KUA-02','Jawatankuasa Aset & Kewangan','RM 5,001 – RM 100,000','SA/PNS/2024/001','Aktif'],
            ['KUA-03','Menteri Besar Selangor','> RM 100,000','MB/SEL/2022/PKP','Aktif'],
            ['KUA-04','Perbendaharaan Negeri','Semua nilai (kes khas)','PNS/2023/ARH','Aktif'],
        ]
    ])
</div>
@endsection
