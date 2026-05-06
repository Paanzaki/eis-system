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
                Pelantikan <span class="text-red-600">Pegawai.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-AS-PA &mdash; Lantikan Pegawai Pemeriksa & Lembaga Pelupusan (KEW.PA-15)
            </p>
        </div>
        <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Lantikan Baharu
        </button>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Pegawai Pemeriksa Aktif','val'=>'12','sub'=>'Dilantik & sijil sah'],
            ['label'=>'Ahli Lembaga Pelupusan','val'=>'8','sub'=>'Dilantik & sijil sah'],
            ['label'=>'Sijil Hampir Luput','val'=>'3','sub'=>'Dalam tempoh 30 hari'],
            ['label'=>'Sijil Telah Tamat','val'=>'1','sub'=>'Perlu pembaharuan segera'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-2xl border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm p-5">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <svg class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2.5"/></svg>
                <input type="text" placeholder="Cari nama pegawai atau no. kad pengenalan..."
                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-[11px] font-bold outline-none focus:border-[#1E3A8A] focus:bg-white transition-all">
            </div>
            <select class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
                <option>Semua Kategori</option>
                <option>Pegawai Pemeriksa</option>
                <option>Lembaga Pelupusan</option>
            </select>
            <select class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
                <option>Semua Status</option>
                <option>Aktif</option>
                <option>Hampir Luput</option>
                <option>Tamat</option>
            </select>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">Profil Pegawai</th>
                        <th>Jabatan</th>
                        <th>Kategori Lantikan</th>
                        <th>No. Sijil</th>
                        <th>Tarikh Lantik</th>
                        <th>Tarikh Luput</th>
                        <th class="pr-10">Status Sijil</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $pegawai = [
                        ['nama'=>'Ahmad Farhan bin Zulkifli','gred'=>'W54','jabatan'=>'Unit Kewangan PNS','kat'=>'Pegawai Pemeriksa','sijil'=>'KEW.PA-15/2024/001','lantik'=>'01/01/2024','luput'=>'31/12/2026','status'=>'Aktif'],
                        ['nama'=>'Siti Nurhaliza binti Ahmad','gred'=>'N41','jabatan'=>'Unit Pengurusan','kat'=>'Lembaga Pelupusan','sijil'=>'KEW.PA-15/2024/002','lantik'=>'01/01/2024','luput'=>'31/12/2026','status'=>'Aktif'],
                        ['nama'=>'Zulkifli bin Omar','gred'=>'W48','jabatan'=>'Jabatan Audit Selangor','kat'=>'Pegawai Pemeriksa','sijil'=>'KEW.PA-15/2024/003','lantik'=>'01/01/2024','luput'=>'31/12/2026','status'=>'Aktif'],
                        ['nama'=>'Rosnah binti Kadir','gred'=>'N44','jabatan'=>'Pejabat SUK Selangor','kat'=>'Lembaga Pelupusan','sijil'=>'KEW.PA-15/2024/004','lantik'=>'15/04/2024','luput'=>'14/04/2026','status'=>'Hampir Luput'],
                        ['nama'=>'Mohd Ridhwan bin Azmi','gred'=>'W41','jabatan'=>'Unit ICT PNS','kat'=>'Pegawai Pemeriksa','sijil'=>'KEW.PA-15/2023/011','lantik'=>'01/06/2023','luput'=>'31/05/2025','status'=>'Tamat'],
                        ['nama'=>'Nurul Ain binti Abdul Wahab','gred'=>'N41','jabatan'=>'Unit HRD PNS','kat'=>'Lembaga Pelupusan','sijil'=>'KEW.PA-15/2025/001','lantik'=>'01/01/2025','luput'=>'31/12/2027','status'=>'Aktif'],
                    ];
                    $statusMap = ['Aktif'=>'badge-green','Hampir Luput'=>'badge-amber','Tamat'=>'badge-red'];
                    @endphp
                    @foreach($pegawai as $p)
                    <tr>
                        <td class="pl-10">
                            <p class="text-[11px] font-black text-[#1E293B]">{{ $p['nama'] }}</p>
                            <p class="text-[9px] text-slate-400 font-bold mt-0.5">Gred {{ $p['gred'] }}</p>
                        </td>
                        <td class="text-[11px] text-slate-600 font-bold">{{ $p['jabatan'] }}</td>
                        <td><span class="badge badge-blue">{{ $p['kat'] }}</span></td>
                        <td class="text-[11px] font-black text-[#1E3A8A]">{{ $p['sijil'] }}</td>
                        <td class="text-[11px] text-slate-400 font-bold">{{ $p['lantik'] }}</td>
                        <td class="text-[11px] font-black {{ $p['status']==='Tamat'?'text-red-500':($p['status']==='Hampir Luput'?'text-amber-600':'text-slate-600') }}">
                            {{ $p['luput'] }}
                        </td>
                        <td class="pr-10"><span class="badge {{ $statusMap[$p['status']] ?? 'badge-gray' }}">{{ $p['status'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
