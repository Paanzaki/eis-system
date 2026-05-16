@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Selenggara Kaedah Perolehan
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Data Rujukan Kaedah Perolehan Kerajaan</p>
        </div>
        <a href="{{ route('selenggara.perolehan.kaedah', ['status' => 'tambah']) }}" class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Kaedah
        </a>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Kaedah Perolehan',
        'headers' => ['Kod Kaedah','Nama Kaedah','Had Nilai (RM)','Autoriti Meluluskan','Status'],
        'rows'    => [
            ['KAE-01','Pembelian Terus','≤ RM 10,000','Ketua Jabatan','Aktif'],
            ['KAE-02','Sebut Harga','RM 10,001 – RM 200,000','Jawatankuasa Sebut Harga','Aktif'],
            ['KAE-03','Rundingan Terus','≤ RM 500,000 (Kes Khas)','Jawatankuasa Perolehan','Aktif'],
            ['KAE-04','Tender Terbuka','> RM 200,000','Lembaga Perolehan Kerajaan Negeri','Aktif'],
            ['KAE-05','Tender Terhad','> RM 200,000 (Undangan)','Lembaga Perolehan Kerajaan Negeri','Aktif'],
            ['KAE-06','Kontrak Pusat','Mengikut Kontrak Pusat','Perbendaharaan Malaysia','Aktif'],
        ]
    ])
</div>
@endsection
