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
                Laporan Eksekutif Tahunan
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-AS-LA &mdash; Laporan Eksekutif Tahunan JKPAK PNS Selangor
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke-width="2"/></svg>
                Muat Turun Laporan PDF
            </button>
            <button class="mini-export-btn mini-excel px-5 py-3 rounded-[5px] text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                Excel
            </button>
        </div>
    </div>

    {{-- ── Executive KPI Dashboard ── --}}
    <div class="bg-gradient-to-br from-[#0f1e45] to-[#1E3A8A] rounded-[5px] p-10 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-400/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="relative">
            <div class="flex items-center gap-3 mb-6">
                <div class="h-1 w-8 bg-yellow-400 rounded-full"></div>
                <p class="text-[10px] font-black text-blue-300 uppercase tracking-[0.3em]">Laporan Eksekutif Tahunan 2025</p>
            </div>
            <h2 class="text-[22px] font-black text-white leading-tight mb-2">
                Perbendaharaan Negeri Selangor
            </h2>
            <p class="text-[12px] text-blue-300 font-bold mb-8">Ringkasan Prestasi Tahunan — Perolehan, Aset & Naziran</p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach([
                    ['label'=>'Jumlah Perbelanjaan','val'=>'RM 94.2M','trend'=>'+8.3%','sub'=>'vs Sasaran RM 88M','up'=>true],
                    ['label'=>'Aset Berdaftar','val'=>'12,402','trend'=>'+3.1%','sub'=>'vs 12,027 (2024)','up'=>true],
                    ['label'=>'Pematuhan Naziran','val'=>'91.2%','trend'=>'+2.4%','sub'=>'vs Sasaran 85%','up'=>true],
                    ['label'=>'Nilai Aset Dilupus','val'=>'RM 1.84M','trend'=>'-12%','sub'=>'vs RM 2.09M (2024)','up'=>false],
                ] as $kpi)
                <div class="bg-white/8 backdrop-blur-sm rounded-[5px] p-6 border border-white/10">
                    <p class="text-[28px] font-black text-white leading-none">{{ $kpi['val'] }}</p>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="text-[10px] font-black {{ $kpi['up'] ? 'text-emerald-400' : 'text-red-400' }}">
                            {{ $kpi['up'] ? '▲' : '▼' }} {{ $kpi['trend'] }}
                        </span>
                    </div>
                    <p class="text-[9px] font-black text-blue-300 uppercase tracking-widest mt-1">{{ $kpi['label'] }}</p>
                    <p class="text-[9px] text-blue-400/60 font-bold mt-0.5">{{ $kpi['sub'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── Perolehan Annual Summary ── --}}
    <div class="section-divider">Prestasi Perolehan Tahunan 2025</div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-50">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Ringkasan Perolehan Mengikut Kategori</h4>
            </div>
            <div class="overflow-x-auto">
                <table class="eis-table">
                    <thead>
                        <tr>
                            <th class="pl-8">Kategori</th>
                            <th>Bilangan</th>
                            <th>Nilai Unjuran (RM)</th>
                            <th>Nilai Sebenar (RM)</th>
                            <th>Penjimatan (RM)</th>
                            <th class="pr-8">Pencapaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $katData = [
                            ['kat'=>'Kerja / Pembinaan',  'bil'=>28,'unjuran'=>38500000,'sebenar'=>36800000,'penjimatan'=>1700000],
                            ['kat'=>'ICT & Teknologi',    'bil'=>42,'unjuran'=>22400000,'sebenar'=>21950000,'penjimatan'=>450000],
                            ['kat'=>'Perkhidmatan',       'bil'=>65,'unjuran'=>18600000,'sebenar'=>18200000,'penjimatan'=>400000],
                            ['kat'=>'Bekalan & Peralatan','bil'=>91,'unjuran'=>14800000,'sebenar'=>14600000,'penjimatan'=>200000],
                        ];
                        @endphp
                        @foreach($katData as $k)
                        @php $pct = round(($k['sebenar']/$k['unjuran'])*100); @endphp
                        <tr>
                            <td class="pl-8 font-black text-[11px] text-[#1E3A8A]">{{ $k['kat'] }}</td>
                            <td class="text-[11px] font-bold text-slate-600">{{ $k['bil'] }} projek</td>
                            <td class="text-[11px] font-bold text-slate-600">RM {{ number_format($k['unjuran']) }}</td>
                            <td class="text-[11px] font-black text-[#1E3A8A]">RM {{ number_format($k['sebenar']) }}</td>
                            <td class="text-[11px] font-black text-emerald-600">RM {{ number_format($k['penjimatan']) }}</td>
                            <td class="pr-8 w-32">
                                <div class="prog-wrap">
                                    <div class="prog-fill" style="width:{{ min(100,$pct) }}%;background:#10B981"></div>
                                </div>
                                <p class="text-[9px] text-slate-400 font-bold mt-1">{{ $pct }}%</p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm p-8">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest mb-6">Statistik Utama 2025</h4>
            <div class="space-y-5">
                @foreach([
                    ['label'=>'Jumlah Projek Perolehan','val'=>'226','pct'=>100,'color'=>'#1E3A8A'],
                    ['label'=>'Berjaya Dilaksana','val'=>'209 (92.5%)','pct'=>93,'color'=>'#10B981'],
                    ['label'=>'Melebihi Tempoh','val'=>'12 (5.3%)','pct'=>5,'color'=>'#F59E0B'],
                    ['label'=>'Dibatal / Gagal','val'=>'5 (2.2%)','pct'=>2,'color'=>'#E11D48'],
                    ['label'=>'Dengan Perintah Perubahan','val'=>'28 (12.4%)','pct'=>12,'color'=>'#8B5CF6'],
                ] as $stat)
                <div>
                    <div class="flex justify-between mb-1">
                        <p class="text-[10px] font-black text-slate-600">{{ $stat['label'] }}</p>
                        <p class="text-[10px] font-black text-[#1E3A8A]">{{ $stat['val'] }}</p>
                    </div>
                    <div class="prog-wrap">
                        <div class="prog-fill" style="width:{{ $stat['pct'] }}%;background:{{ $stat['color'] }}"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── Aset Annual Summary ── --}}
    <div class="section-divider">Prestasi Aset Tahunan 2025</div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Harta Modal','val'=>'8,433','sub'=>'Nilai buku: RM 142.8M'],
            ['label'=>'Aset Rendah Nilai','val'=>'3,969','sub'=>'Nilai buku: RM 18.4M'],
            ['label'=>'Dilupuskan 2025','val'=>'142 Unit','sub'=>'Nilai: RM 1.84M'],
            ['label'=>'Kadar Verifikasi','val'=>'96.2%','sub'=>'11,940 daripada 12,402'],
        ] as $s)
        <div class="bg-white p-6 rounded-[5px] border border-gray-100 shadow-sm card-stat-pns">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Report Archive ── --}}
    <div class="section-divider">Arkib Laporan Eksekutif</div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach([
            ['tahun'=>'2025','label'=>'Laporan Eksekutif Tahunan 2025','tarikh'=>'15/01/2026','saiz'=>'12.4 MB','status'=>'Tersedia'],
            ['tahun'=>'2024','label'=>'Laporan Eksekutif Tahunan 2024','tarikh'=>'14/01/2025','saiz'=>'10.8 MB','status'=>'Tersedia'],
            ['tahun'=>'2023','label'=>'Laporan Eksekutif Tahunan 2023','tarikh'=>'12/01/2024','saiz'=>'9.6 MB','status'=>'Tersedia'],
        ] as $ar)
        <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm p-7 flex items-center gap-5">
            <div class="w-14 h-14 rounded-[5px] bg-[#1E3A8A]/5 flex items-center justify-center flex-shrink-0">
                <svg class="w-7 h-7 text-[#1E3A8A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-[12px] font-black text-[#1E3A8A]">Laporan {{ $ar['tahun'] }}</p>
                <p class="text-[10px] text-slate-400 font-bold mt-0.5">{{ $ar['tarikh'] }} &bull; {{ $ar['saiz'] }}</p>
            </div>
            <button class="mini-export-btn mini-pdf flex-shrink-0">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke-width="2"/></svg>
                PDF
            </button>
        </div>
        @endforeach
    </div>

</div>
@endsection
