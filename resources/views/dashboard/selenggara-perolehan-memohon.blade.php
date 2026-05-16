@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Selenggara Pemohon Perolehan
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Data Rujukan Pemohon / Entiti Memohon Perolehan</p>
        </div>
        <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Pemohon
        </button>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Pemohon Perolehan',
        'headers' => ['Kod Pemohon','Nama Entiti','Jenis Entiti','Pegawai Pengurus','Status'],
        'rows'    => [
            ['PEM-001','Perbendaharaan Negeri Selangor','Jabatan Kerajaan Negeri','Dato\' Hj. Ahmad','Aktif'],
            ['PEM-002','Jabatan Audit Selangor','Jabatan Kerajaan Negeri','Tuan Hj. Razali','Aktif'],
            ['PEM-003','Unit ICT PNS','Unit Dalaman','En. Zulkifli Omar','Aktif'],
            ['PEM-004','Jabatan Kerja Raya','Jabatan Persekutuan','Ir. Mohd Azlan','Aktif'],
            ['PEM-005','Majlis Perbandaran Klang','Pihak Berkuasa Tempatan','Datuk Noraini','Aktif'],
            ['PEM-006','Hospital Shah Alam','Agensi Kesihatan','Dr. Faridah Ismail','Aktif'],
            ['PEM-007','UiTM Shah Alam','Institusi Pendidikan','Prof. Dr. Rozilah','Aktif'],
        ]
    ])
</div>
@endsection
