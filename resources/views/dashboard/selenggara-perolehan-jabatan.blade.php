@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Selenggara <span class="text-red-600">Jabatan.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Penyelenggaraan Data Rujukan Jabatan / Agensi</p>
        </div>
        <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Jabatan
        </button>
    </div>
    @include('partials.selenggara-table', [
        'title'   => 'Senarai Jabatan / Agensi Berdaftar',
        'headers' => ['Kod Jabatan','Nama Jabatan / Agensi','Daerah','Ketua Jabatan','Status'],
        'rows'    => [
            ['PNS-001','Perbendaharaan Negeri Selangor','Petaling','Dato\' Hj. Ahmad bin Yusof','Aktif'],
            ['JAS-002','Jabatan Audit Selangor','Gombak','Tuan Hj. Razali bin Ibrahim','Aktif'],
            ['SUK-003','Pejabat Setiausaha Kerajaan Selangor','Petaling','Dato\' Sri Hj. Mohd Khusairi','Aktif'],
            ['JKR-004','Jabatan Kerja Raya Selangor','Petaling','Ir. Mohd Azlan bin Kassim','Aktif'],
            ['MPK-005','Majlis Perbandaran Klang','Klang','Datuk Hj. Noraini binti Hashim','Aktif'],
            ['MBSA-006','Majlis Bandaraya Shah Alam','Petaling','Datuk Hj. Kamarulzaman','Aktif'],
            ['JIS-007','Jabatan Imigresen Selangor','Petaling','Pn. Siti Nurhaliza binti Ali','Aktif'],
            ['UiTM-008','Universiti Teknologi MARA Shah Alam','Petaling','Prof. Dato\' Dr. Rozilah Kasim','Aktif'],
            ['MPS-009','Majlis Perbandaran Sepang','Sepang','Encik Fadzli bin Samsudin','Aktif'],
            ['JPH-010','Jabatan Perhutanan Selangor','Hulu Langat','Encik Ridzuan bin Abdul Hamid','Tidak Aktif'],
        ]
    ])
</div>
@endsection
