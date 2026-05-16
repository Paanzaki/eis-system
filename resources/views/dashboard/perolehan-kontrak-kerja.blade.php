@extends('layouts.dashboard')

@section('content')
<div class="content-fluid space-y-8 pb-12">

    {{-- ── Page Header ── --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Pengurusan Kontrak Kerja
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-MP-KT &mdash; Pemantauan Kontrak Kerja & Infrastruktur
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Daftar Kontrak Kerja
            </button>
            <button class="mini-export-btn mini-pdf px-5 py-3 rounded-[5px] text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg>
                PDF
            </button>
        </div>
    </div>

    {{-- ── KPI Stats ── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Kontrak Aktif',      'val'=>'24',       'sub'=>'Projek kerja dalam pelaksanaan', 'color'=>'blue'],
            ['label'=>'Nilai Keseluruhan',   'val'=>'RM 38.7M', 'sub'=>'Nilai kumulatif 2026',          'color'=>'green'],
            ['label'=>'Perintah Perubahan',  'val'=>'5',        'sub'=>'VO dalam proses kelulusan',      'color'=>'amber'],
            ['label'=>'Lewat / Melampaui',   'val'=>'3',        'sub'=>'Projek melebihi tempoh',         'color'=>'red'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-[5px] border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Contracts Table ── --}}
    <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-10 py-6 border-b border-gray-50">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Senarai Kontrak Kerja 2026</h4>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Projek infrastruktur & pembinaan kerajaan negeri</p>
        </div>
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">No. Kontrak</th>
                        <th>Kontraktor</th>
                        <th>Skop Kerja</th>
                        <th>Nilai Kontrak (RM)</th>
                        <th>Nilai Semasa (RM)</th>
                        <th>Kemajuan Fizikal</th>
                        <th>Tarikh Siap</th>
                        <th>VO</th>
                        <th class="pr-10">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $works = [
                        ['no'=>'KTR-K/2026/001','kontraktor'=>'Bina Selangor Sdn Bhd','skop'=>'Naik Taraf Bangunan Pejabat PNS','nilai'=>1200000,'semasa'=>1320000,'kemajuan'=>72,'siap'=>'30/06/2026','vo'=>1,'status'=>'Dalam Proses'],
                        ['no'=>'KTR-K/2026/002','kontraktor'=>'Kejuruteraan Maju Jaya Sdn Bhd','skop'=>'Pembinaan Parkir Bertingkat','nilai'=>4800000,'semasa'=>4800000,'kemajuan'=>35,'siap'=>'30/09/2026','vo'=>0,'status'=>'Dalam Proses'],
                        ['no'=>'KTR-K/2026/003','kontraktor'=>'Pemaju Wira Enterprise','skop'=>'Membaik Pulih Jalan Dalaman','nilai'=>380000,'semasa'=>380000,'kemajuan'=>100,'siap'=>'28/02/2026','vo'=>0,'status'=>'Selesai'],
                        ['no'=>'KTR-K/2026/004','kontraktor'=>'Techno-Build Sdn Bhd','skop'=>'Pemasangan Solar Panel','nilai'=>950000,'semasa'=>1060000,'kemajuan'=>88,'siap'=>'15/05/2026','vo'=>2,'status'=>'Hampir Tamat'],
                        ['no'=>'KTR-K/2026/005','kontraktor'=>'Infrastruktur Bestari Sdn Bhd','skop'=>'Naik Taraf Sistem Elektrik','nilai'=>620000,'semasa'=>620000,'kemajuan'=>15,'siap'=>'31/12/2026','vo'=>0,'status'=>'Dalam Proses'],
                        ['no'=>'KTR-K/2026/006','kontraktor'=>'Kontraktor Gemilang JV','skop'=>'Kerja Tanah & Geoteknik','nilai'=>2100000,'semasa'=>2100000,'kemajuan'=>60,'siap'=>'30/08/2026','vo'=>0,'status'=>'Dalam Proses'],
                        ['no'=>'KTR-K/2026/007','kontraktor'=>'Pakar Bina Sdn Bhd','skop'=>'Renovasi Bilik Mesyuarat','nilai'=>185000,'semasa'=>205000,'kemajuan'=>95,'siap'=>'10/04/2026','vo'=>1,'status'=>'Lewat'],
                        ['no'=>'KTR-K/2026/008','kontraktor'=>'Wira Cipta Construction Sdn Bhd','skop'=>'Pembinaan Kantin Pejabat','nilai'=>430000,'semasa'=>430000,'kemajuan'=>50,'siap'=>'31/07/2026','vo'=>0,'status'=>'Dalam Proses'],
                    ];
                    $statusMap = ['Dalam Proses'=>'badge-blue','Selesai'=>'badge-green','Hampir Tamat'=>'badge-amber','Lewat'=>'badge-red','Ditangguh'=>'badge-gray'];
                    @endphp
                    @foreach($works as $w)
                    <tr>
                        <td class="pl-10 font-black text-[11px] text-[#1E3A8A]">{{ $w['no'] }}</td>
                        <td class="text-[11px] font-black text-[#1E293B]">{{ $w['kontraktor'] }}</td>
                        <td class="text-[11px] text-slate-600">{{ $w['skop'] }}</td>
                        <td class="text-[11px] font-black text-slate-700">RM {{ number_format($w['nilai']) }}</td>
                        <td class="text-[11px] font-black {{ $w['semasa'] > $w['nilai'] ? 'text-red-500' : 'text-emerald-600' }}">
                            RM {{ number_format($w['semasa']) }}
                            @if($w['semasa'] > $w['nilai'])
                            <span class="text-[8px] text-red-400 font-bold block">+RM {{ number_format($w['semasa']-$w['nilai']) }}</span>
                            @endif
                        </td>
                        <td class="w-32">
                            <div class="prog-wrap">
                                <div class="prog-fill" style="width:{{ $w['kemajuan'] }}%;background:{{ $w['kemajuan']>=80 ? '#10B981' : ($w['kemajuan']>=50 ? '#1E3A8A' : '#F59E0B') }}"></div>
                            </div>
                            <p class="text-[9px] text-slate-400 font-bold mt-1">{{ $w['kemajuan'] }}%</p>
                        </td>
                        <td class="text-[11px] font-bold {{ $w['status']==='Lewat' ? 'text-red-500' : 'text-slate-500' }}">{{ $w['siap'] }}</td>
                        <td class="text-center">
                            @if($w['vo'] > 0)
                            <span class="badge badge-amber">{{ $w['vo'] }} VO</span>
                            @else
                            <span class="text-slate-300 text-[11px] font-bold">—</span>
                            @endif
                        </td>
                        <td class="pr-10">
                            <span class="badge {{ $statusMap[$w['status']] ?? 'badge-gray' }}">{{ $w['status'] }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
