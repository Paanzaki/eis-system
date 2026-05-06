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
                Pelupusan <span class="text-red-600">Aset.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-AS-PL &mdash; Proses Keluar Aset & Pelupusan (KEW.PA-19)
            </p>
        </div>
        <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
            Syor Pelupusan Baharu
        </button>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Menunggu Kelulusan',  'val'=>'24',       'sub'=>'Syor belum diluluskan'],
            ['label'=>'Nilai Anggaran',       'val'=>'RM 42,500','sub'=>'Jumlah nilai syor aktif'],
            ['label'=>'Diluluskan & Proses',  'val'=>'11',       'sub'=>'Sedang dilaksanakan'],
            ['label'=>'Selesai Dilupuskan',   'val'=>'142',      'sub'=>'Kumulatif 2026'],
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
                <input type="text" placeholder="Cari no. siri KEW.PA-19 atau nama aset..."
                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-[11px] font-bold outline-none focus:border-[#1E3A8A] focus:bg-white transition-all">
            </div>
            <select class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
                <option>Semua Status</option>
                <option>Menunggu Kelulusan</option>
                <option>Diluluskan</option>
                <option>Selesai</option>
                <option>Ditolak</option>
            </select>
            <select class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
                <option>Semua Kaedah</option>
                <option>Lelong Awam</option>
                <option>Musnah</option>
                <option>Derma</option>
                <option>Jual Terus</option>
            </select>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">No. Siri & Nama Aset</th>
                        <th>Jabatan</th>
                        <th>Sebab Pelupusan</th>
                        <th>Kaedah</th>
                        <th>Nilai Anggaran (RM)</th>
                        <th>Tempoh Guna</th>
                        <th class="pr-10">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $items = [
                        ['siri'=>'PNS/ICT/2018/012','nama'=>'Server Rack Dell PowerEdge (Blok C)','jabatan'=>'Unit ICT PNS','sebab'=>'Usang / Tidak Ekonomik','kaedah'=>'Lelong Awam','nilai'=>8500,'tempoh'=>'8 Tahun','status'=>'Menunggu Kelulusan'],
                        ['siri'=>'PNS/KND/2015/004','nama'=>'Van Hiace BPA 2231','jabatan'=>'Pejabat SUK','sebab'=>'Kerosakan Enjin (Tidak Ekonomik Dibaiki)','kaedah'=>'Musnah','nilai'=>2000,'tempoh'=>'11 Tahun','status'=>'Menunggu Kelulusan'],
                        ['siri'=>'PNS/ICT/2016/033','nama'=>'Laptop HP EliteBook (Batch 2016)','jabatan'=>'Unit Kewangan','sebab'=>'Usang & Tidak Digunakan','kaedah'=>'Derma','nilai'=>500,'tempoh'=>'10 Tahun','status'=>'Diluluskan'],
                        ['siri'=>'PNS/PJBT/2014/021','nama'=>'Kerusi Pejabat Lama (12 Unit)','jabatan'=>'Unit HRD PNS','sebab'=>'Rosak & Tidak Selamat','kaedah'=>'Musnah','nilai'=>1200,'tempoh'=>'12 Tahun','status'=>'Selesai'],
                        ['siri'=>'PNS/LAB/2019/007','nama'=>'Mesin Fotostat Canon IR4025','jabatan'=>'Jabatan Audit','sebab'=>'Kos Selenggara Tinggi','kaedah'=>'Jual Terus','nilai'=>3800,'tempoh'=>'7 Tahun','status'=>'Selesai'],
                        ['siri'=>'PNS/KND/2017/009','nama'=>'Proton Perdana BPA 9912','jabatan'=>'Pejabat SUK','sebab'=>'Kerosakan Teruk','kaedah'=>'Lelong Awam','nilai'=>6000,'tempoh'=>'9 Tahun','status'=>'Menunggu Kelulusan'],
                    ];
                    $statusMap = ['Menunggu Kelulusan'=>'badge-amber','Diluluskan'=>'badge-blue','Selesai'=>'badge-green','Ditolak'=>'badge-red'];
                    $kaedahMap = ['Lelong Awam'=>'badge-purple','Musnah'=>'badge-red','Derma'=>'badge-blue','Jual Terus'=>'badge-green'];
                    @endphp
                    @foreach($items as $a)
                    <tr>
                        <td class="pl-10">
                            <p class="text-[11px] font-black text-[#1E3A8A]">{{ $a['siri'] }}</p>
                            <p class="text-[10px] font-black text-[#1E293B] mt-0.5">{{ $a['nama'] }}</p>
                        </td>
                        <td class="text-[11px] text-slate-600 font-bold">{{ $a['jabatan'] }}</td>
                        <td class="text-[11px] text-slate-600 max-w-[180px]">{{ $a['sebab'] }}</td>
                        <td><span class="badge {{ $kaedahMap[$a['kaedah']] ?? 'badge-gray' }}">{{ $a['kaedah'] }}</span></td>
                        <td class="text-[11px] font-black text-[#1E3A8A]">RM {{ number_format($a['nilai']) }}</td>
                        <td class="text-[11px] text-slate-500 font-bold">{{ $a['tempoh'] }}</td>
                        <td class="pr-10"><span class="badge {{ $statusMap[$a['status']] ?? 'badge-gray' }}">{{ $a['status'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
