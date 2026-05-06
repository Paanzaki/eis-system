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
                Pengurusan Kontrak <span class="text-red-600">Perunding.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-MP-KT &mdash; Pemantauan Kontrak Perkhidmatan Perunding
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Daftar Kontrak Baharu
            </button>
            <button class="mini-export-btn mini-excel px-5 py-3 rounded-xl text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                Excel
            </button>
        </div>
    </div>

    {{-- ── KPI Stats ── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Kontrak Aktif',    'val'=>'14',       'sub'=>'Perunding dalam operasi',    'color'=>'blue'],
            ['label'=>'Nilai Keseluruhan','val'=>'RM 9.4M',  'sub'=>'Jumlah nilai kontrak aktif', 'color'=>'green'],
            ['label'=>'Tamat Bulan Ini',  'val'=>'3',        'sub'=>'Perlu pembaharuan segera',   'color'=>'amber'],
            ['label'=>'Pelarasan Kos',    'val'=>'2',        'sub'=>'VO / Pindaan kontrak',       'color'=>'red'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-2xl border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Contracts Table ── --}}
    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-10 py-6 border-b border-gray-50">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Senarai Kontrak Perunding Aktif</h4>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">14 kontrak sedang dalam tempoh pelaksanaan</p>
        </div>
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">No. Kontrak</th>
                        <th>Nama Syarikat Perunding</th>
                        <th>Skop Perkhidmatan</th>
                        <th>Nilai Kontrak (RM)</th>
                        <th>Tempoh Kontrak</th>
                        <th>Kemajuan</th>
                        <th>Tarikh Tamat</th>
                        <th class="pr-10">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $contracts = [
                        ['no'=>'KTR-P/2026/001','syarikat'=>'Sistem Maklumat Teknologi (M) Sdn Bhd','skop'=>'Pembangunan Sistem EIS PNS','nilai'=>2800000,'mula'=>'01/01/2026','tamat'=>'31/12/2026','kemajuan'=>62,'status'=>'Aktif'],
                        ['no'=>'KTR-P/2026/002','syarikat'=>'Perunding Akitek Andalan Sdn Bhd','skop'=>'Kajian Naik Taraf Bangunan PNS','nilai'=>380000,'mula'=>'15/02/2026','tamat'=>'15/08/2026','kemajuan'=>80,'status'=>'Aktif'],
                        ['no'=>'KTR-P/2026/003','syarikat'=>'GlobalCyber Security Sdn Bhd','skop'=>'Audit Keselamatan Siber','nilai'=>195000,'mula'=>'01/03/2026','tamat'=>'31/05/2026','kemajuan'=>100,'status'=>'Selesai'],
                        ['no'=>'KTR-P/2026/004','syarikat'=>'Data Analytics Expert Sdn Bhd','skop'=>'Perkhidmatan Analitik & BI','nilai'=>420000,'mula'=>'01/02/2026','tamat'=>'31/07/2026','kemajuan'=>55,'status'=>'Aktif'],
                        ['no'=>'KTR-P/2026/005','syarikat'=>'Urusbina Maju Sdn Bhd','skop'=>'Penyeliaan Projek Renovasi','nilai'=>145000,'mula'=>'10/01/2026','tamat'=>'10/05/2026','kemajuan'=>100,'status'=>'Tamat'],
                        ['no'=>'KTR-P/2026/006','syarikat'=>'Penasihat Undang-Undang PNS','skop'=>'Khidmat Nasihat Perundangan','nilai'=>240000,'mula'=>'01/01/2026','tamat'=>'31/12/2026','kemajuan'=>40,'status'=>'Aktif'],
                        ['no'=>'KTR-P/2026/007','syarikat'=>'HR Dynamics Consulting Sdn Bhd','skop'=>'Latihan & Pembangunan Kompetensi','nilai'=>88000,'mula'=>'01/04/2026','tamat'=>'30/06/2026','kemajuan'=>20,'status'=>'Aktif'],
                        ['no'=>'KTR-P/2026/008','syarikat'=>'Perunding GIS Selangor Sdn Bhd','skop'=>'Pemetaan Aset & GIS','nilai'=>175000,'mula'=>'15/01/2026','tamat'=>'15/06/2026','kemajuan'=>90,'status'=>'Hampir Tamat'],
                    ];
                    $statusMap = ['Aktif'=>'badge-green','Selesai'=>'badge-blue','Tamat'=>'badge-gray','Hampir Tamat'=>'badge-amber','Ditangguh'=>'badge-red'];
                    @endphp
                    @foreach($contracts as $c)
                    <tr>
                        <td class="pl-10 font-black text-[11px] text-[#1E3A8A]">{{ $c['no'] }}</td>
                        <td>
                            <p class="text-[11px] font-black text-[#1E293B]">{{ $c['syarikat'] }}</p>
                        </td>
                        <td class="text-[11px] text-slate-600">{{ $c['skop'] }}</td>
                        <td class="text-[11px] font-black text-slate-700">RM {{ number_format($c['nilai']) }}</td>
                        <td class="text-[11px] text-slate-500 font-bold">{{ $c['mula'] }}<br><span class="text-[9px]">— {{ $c['tamat'] }}</span></td>
                        <td class="w-32">
                            <div class="prog-wrap">
                                <div class="prog-fill" style="width:{{ $c['kemajuan'] }}%;background:{{ $c['kemajuan']>=80 ? '#10B981' : ($c['kemajuan']>=50 ? '#1E3A8A' : '#F59E0B') }}"></div>
                            </div>
                            <p class="text-[9px] text-slate-400 font-bold mt-1">{{ $c['kemajuan'] }}%</p>
                        </td>
                        <td class="text-[11px] font-bold {{ strtotime(str_replace('/','-',$c['tamat'])) < strtotime('+30 days') ? 'text-red-500' : 'text-slate-500' }}">
                            {{ $c['tamat'] }}
                        </td>
                        <td class="pr-10">
                            <span class="badge {{ $statusMap[$c['status']] ?? 'badge-gray' }}">{{ $c['status'] }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
