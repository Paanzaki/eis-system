@extends('layouts.dashboard')

@section('content')
<div class="content-fluid space-y-8 pb-12">

    {{-- ── Page Header ── --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div class="space-y-1">
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Kawalan Capaian RBAC
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-MA-PP-03 &mdash; Role-Based Access Control
            </p>
        </div>
        <a href="{{ route('admin.peranan', ['status' => 'tambah']) }}" class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Tambah Peranan
        </a>
    </div>

    {{-- ── Role Cards Grid ── --}}
    @php
    $roles = [
        [
            'name'  => 'Super Admin',
            'code'  => 'ROLE-01',
            'color' => 'red',
            'users' => 1,
            'perms' => 42,
            'desc'  => 'Akses penuh kepada semua modul sistem, tetapan, dan pengurusan pengguna. Tidak terhad.',
            'modules'=> ['Dashboard','Perolehan','Aset','Laporan','Naziran','Tetapan','Selenggara','Audit Log','Pengguna'],
        ],
        [
            'name'  => 'Pentadbir Sistem',
            'code'  => 'ROLE-02',
            'color' => 'blue',
            'users' => 3,
            'perms' => 32,
            'desc'  => 'Menguruskan pengguna, peranan, konfigurasi sistem dan penyelenggaraan data rujukan.',
            'modules'=> ['Dashboard','Tetapan','Selenggara Perolehan','Selenggara Aset','Pengguna','Audit Log'],
        ],
        [
            'name'  => 'Pegawai Perolehan',
            'code'  => 'ROLE-03',
            'color' => 'purple',
            'users' => 12,
            'perms' => 18,
            'desc'  => 'Menguruskan rekod PPT, tender, rundingan terus, dan kontrak perolehan kerajaan.',
            'modules'=> ['Dashboard','Perolehan PPT','Pelaksanaan','Tender','Rundingan Terus','Kontrak','Laporan'],
        ],
        [
            'name'  => 'Pegawai Aset',
            'code'  => 'ROLE-04',
            'color' => 'amber',
            'users' => 18,
            'perms' => 16,
            'desc'  => 'Menguruskan daftar aset, verifikasi fizikal, pindahan, pelupusan dan naziran aset.',
            'modules'=> ['Dashboard','Daftar Aset','Verifikasi','Pindahan','Pelupusan','Kehilangan','Laporan Aset'],
        ],
        [
            'name'  => 'Eksekutif',
            'code'  => 'ROLE-05',
            'color' => 'green',
            'users' => 8,
            'perms' => 8,
            'desc'  => 'Capaian baca sahaja kepada Dashboard BI, laporan eksekutif, dan KPI sistem.',
            'modules'=> ['Dashboard','Laporan Suku Tahun','Laporan Eksekutif','Naziran (Baca)'],
        ],
        [
            'name'  => 'Pengguna Umum',
            'code'  => 'ROLE-06',
            'color' => 'gray',
            'users' => 5,
            'perms' => 4,
            'desc'  => 'Capaian terhad kepada modul yang dibenarkan oleh pentadbir sahaja.',
            'modules'=> ['Dashboard (Ringkasan)','FAQ Chatbot'],
        ],
    ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($roles as $role)
        @php
        $colorMap = [
            'red'    => ['bg'=>'bg-red-50',    'text'=>'text-red-600',    'border'=>'border-red-200',    'badge'=>'badge-red'],
            'blue'   => ['bg'=>'bg-blue-50',   'text'=>'text-blue-600',   'border'=>'border-blue-200',   'badge'=>'badge-blue'],
            'purple' => ['bg'=>'bg-purple-50', 'text'=>'text-purple-600', 'border'=>'border-purple-200', 'badge'=>'badge-purple'],
            'amber'  => ['bg'=>'bg-amber-50',  'text'=>'text-amber-600',  'border'=>'border-amber-200',  'badge'=>'badge-amber'],
            'green'  => ['bg'=>'bg-emerald-50','text'=>'text-emerald-600','border'=>'border-emerald-200','badge'=>'badge-green'],
            'gray'   => ['bg'=>'bg-slate-50',  'text'=>'text-slate-500',  'border'=>'border-slate-200',  'badge'=>'badge-gray'],
        ];
        $c = $colorMap[$role['color']];
        @endphp
        <div class="role-card bg-white rounded-[5px] border border-gray-100 shadow-sm p-8 flex flex-col gap-5
            {{ $role['color'] === 'red' ? 'glow-red' : ($role['color'] === 'blue' ? 'glow-blue' : ($role['color'] === 'yellow' ? 'glow-yellow' : '')) }}">

            {{-- Header --}}
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-[5px] {{ $c['bg'] }} flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 {{ $c['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-width="2"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-[13px] font-black text-[#1E3A8A] uppercase tracking-tight">{{ $role['name'] }}</h4>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">{{ $role['code'] }}</p>
                    </div>
                </div>
                <button class="p-2 rounded-[5px] hover:bg-gray-50 text-slate-400 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2"/></svg>
                </button>
            </div>

            {{-- Stats --}}
            <div class="flex items-center gap-4">
                <div class="flex-1 {{ $c['bg'] }} rounded-[5px] px-4 py-3 text-center">
                    <p class="text-2xl font-black {{ $c['text'] }}">{{ $role['users'] }}</p>
                    <p class="text-[9px] font-black text-slate-500 uppercase tracking-wider mt-0.5">Pengguna</p>
                </div>
                <div class="flex-1 bg-gray-50 rounded-[5px] px-4 py-3 text-center">
                    <p class="text-2xl font-black text-[#1E3A8A]">{{ $role['perms'] }}</p>
                    <p class="text-[9px] font-black text-slate-500 uppercase tracking-wider mt-0.5">Kebenaran</p>
                </div>
            </div>

            {{-- Description --}}
            <p class="text-[11px] text-slate-500 font-bold leading-relaxed">{{ $role['desc'] }}</p>

            {{-- Modules --}}
            <div>
                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Capaian Modul</p>
                <div class="flex flex-wrap gap-1.5">
                    @foreach($role['modules'] as $mod)
                    <span class="badge {{ $c['badge'] }}">{{ $mod }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Action --}}
            <div class="flex items-center justify-between pt-2 border-t border-gray-50">
                <button class="text-[9px] font-black text-slate-400 hover:text-[#1E3A8A] uppercase tracking-widest transition-colors">
                    Lihat Semua Pengguna &rarr;
                </button>
                <button class="text-[9px] font-black text-red-400 hover:text-red-600 uppercase tracking-widest transition-colors">
                    Urus Kebenaran
                </button>
            </div>
        </div>
        @endforeach
    </div>

    {{-- ── Permission Matrix Table ── --}}
    <div class="section-divider">Matriks Kebenaran CRUD</div>

    <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-10 py-6 border-b border-gray-50">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Kebenaran Modul Mengikut Peranan</h4>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">C = Cipta &nbsp;|&nbsp; B = Baca &nbsp;|&nbsp; K = Kemaskini &nbsp;|&nbsp; P = Padam</p>
        </div>
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10 w-48">Modul</th>
                        <th class="text-center">Super Admin</th>
                        <th class="text-center">Pentadbir</th>
                        <th class="text-center">Peg. Perolehan</th>
                        <th class="text-center">Peg. Aset</th>
                        <th class="text-center">Eksekutif</th>
                        <th class="text-center pr-10">Pengguna Umum</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $matrix = [
                        ['Pengurusan Pengguna',   'CBKP','CBKP','—','—','—','—'],
                        ['Perolehan – PPT',        'CBKP','B','CBKP','—','B','—'],
                        ['Perolehan – Tender',     'CBKP','B','CBKP','—','B','—'],
                        ['Perolehan – Kontrak',    'CBKP','B','CBKP','—','B','—'],
                        ['Aset – Daftar',          'CBKP','B','—','CBKP','B','—'],
                        ['Aset – Verifikasi',      'CBKP','B','—','CBKP','B','—'],
                        ['Aset – Pelupusan',       'CBKP','B','—','CBKP','B','—'],
                        ['Laporan Eksekutif',       'CBKP','B','B','B','B','—'],
                        ['Naziran',                'CBKP','B','CB','CB','B','—'],
                        ['Selenggara Sistem',       'CBKP','CBKP','—','—','—','—'],
                        ['Audit Log',              'CBKP','B','—','—','—','—'],
                        ['Dashboard BI',           'CBKP','B','B','B','B','B'],
                        ['Chatbot AI',             'CBKP','CBKP','B','B','B','B'],
                    ];
                    @endphp
                    @foreach($matrix as $row)
                    <tr>
                        <td class="pl-10 font-black text-[11px] text-[#1E3A8A]">{{ $row[0] }}</td>
                        @foreach(array_slice($row, 1) as $perm)
                        <td class="text-center">
                            @if($perm === '—')
                                <span class="text-slate-200 font-bold text-[11px]">—</span>
                            @else
                                <span class="badge badge-blue text-[9px]">{{ $perm }}</span>
                            @endif
                        </td>
                        @endforeach
                        <td class="pr-10"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
