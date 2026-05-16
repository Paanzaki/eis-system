@extends('layouts.dashboard')
@section('content')
<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3"><div class="h-2 w-16 bg-red-600 rounded-full"></div><div class="h-2 w-8 bg-yellow-400 rounded-full"></div></div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Pengurusan Jabatan
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">FB-EIS-MA &mdash; Konfigurasi Jabatan & Hierarki Organisasi</p>
        </div>
        <a href="{{ route('admin.jabatan', ['status' => 'tambah']) }}" class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Jabatan
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Jumlah Jabatan','val'=>'60','sub'=>'Jabatan & agensi berdaftar'],
            ['label'=>'Jabatan Aktif','val'=>'58','sub'=>'Operasi penuh dalam sistem'],
            ['label'=>'Pegawai Dikaitkan','val'=>'47','sub'=>'Pengguna berdaftar aktif'],
            ['label'=>'Daerah Diliputi','val'=>'9','sub'=>'Dari Sabak Bernam ke Sepang'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-[5px] border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    @include('partials.selenggara-table', [
        'title'   => 'Senarai Jabatan & Agensi PNS Selangor',
        'headers' => ['Kod Jabatan','Nama Jabatan / Agensi','Jenis Entiti','Daerah','Ketua Jabatan','Status'],
        'rows'    => [
            ['PNS-001','Perbendaharaan Negeri Selangor','Jabatan Kerajaan Negeri','Petaling','Dato\' Hj. Ahmad bin Yusof','Aktif'],
            ['JAS-002','Jabatan Audit Selangor','Jabatan Kerajaan Negeri','Gombak','Tuan Hj. Razali bin Ibrahim','Aktif'],
            ['SUK-003','Pejabat Setiausaha Kerajaan','Jabatan Kerajaan Negeri','Petaling','Dato\' Sri Hj. Mohd Khusairi','Aktif'],
            ['JKR-004','Jabatan Kerja Raya Selangor','Jabatan Persekutuan','Petaling','Ir. Mohd Azlan bin Kassim','Aktif'],
            ['MPK-005','Majlis Perbandaran Klang','Pihak Berkuasa Tempatan','Klang','Datuk Hj. Noraini binti Hashim','Aktif'],
            ['MBSA-006','Majlis Bandaraya Shah Alam','Pihak Berkuasa Tempatan','Petaling','Datuk Hj. Kamarulzaman','Aktif'],
            ['JIS-007','Jabatan Imigresen Selangor','Jabatan Persekutuan','Petaling','Pn. Siti Nurhaliza binti Ali','Aktif'],
            ['UiTM-008','Universiti Teknologi MARA','Institusi Pengajian Tinggi','Petaling','Prof. Dato\' Dr. Rozilah','Aktif'],
            ['MPS-009','Majlis Perbandaran Sepang','Pihak Berkuasa Tempatan','Sepang','En. Fadzli bin Samsudin','Aktif'],
            ['JPH-010','Jabatan Perhutanan Selangor','Jabatan Kerajaan Negeri','Hulu Langat','En. Ridzuan bin Hamid','Tidak Aktif'],
        ]
    ])
</div>
@endsection
