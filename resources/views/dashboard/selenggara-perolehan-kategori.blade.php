@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Selenggara Kategori Perolehan
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Data Rujukan Kategori Perolehan Kerajaan</p>
        </div>
        <a href="{{ route('selenggara.perolehan.kategori', ['status' => 'tambah']) }}" class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Kategori
        </a>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Kategori Perolehan',
        'headers' => ['Kod Kategori','Nama Kategori','Keterangan','Status'],
        'rows'    => [
            ['KAT-P-01','Bekalan','Perolehan bekalan pejabat, peralatan dan bahan habis guna','Aktif'],
            ['KAT-P-02','Perkhidmatan','Perkhidmatan profesional, penyelenggaraan dan sokongan','Aktif'],
            ['KAT-P-03','Kerja','Pembinaan, naik taraf bangunan dan infrastruktur','Aktif'],
            ['KAT-P-04','ICT','Perkakasan, perisian dan sistem maklumat','Aktif'],
            ['KAT-P-05','Peralatan Khas','Peralatan teknikal, makmal dan perubatan','Aktif'],
            ['KAT-P-06','Kenderaan','Kenderaan operasi dan jentera','Aktif'],
            ['KAT-P-07','Percetakan','Bahan cetakan, penerbitan dan dokumentasi','Aktif'],
            ['KAT-P-08','Latihan','Program latihan, seminar dan pembangunan SDM','Aktif'],
        ]
    ])
</div>
@endsection
