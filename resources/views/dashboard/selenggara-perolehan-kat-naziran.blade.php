@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Selenggara Kategori Naziran (Perolehan)
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Data Rujukan Kategori Naziran Perolehan</p>
        </div>
        <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Kategori
        </button>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Kategori Naziran Perolehan',
        'headers' => ['Kod','Nama Kategori','Skop Semakan','Status'],
        'rows'    => [
            ['KNP-01','Pematuhan Dokumen','Kelengkapan dokumen sokongan perolehan','Aktif'],
            ['KNP-02','Proses Sebut Harga','Kepatuhan tatacara sebut harga SPP 2023','Aktif'],
            ['KNP-03','Proses Tender','Proses tender terbuka dan terhad','Aktif'],
            ['KNP-04','Pengurusan Kontrak','Pemantauan kontrak aktif dan pelanjutan','Aktif'],
            ['KNP-05','Had Nilai','Pematuhan had nilai bagi setiap kaedah','Aktif'],
            ['KNP-06','Etika Perolehan','Pematuhan kod etika & konflik kepentingan','Aktif'],
        ]
    ])
</div>
@endsection
