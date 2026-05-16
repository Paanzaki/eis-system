@extends('layouts.dashboard')

@section('content')


<div class="content-fluid space-y-8 pb-12">

    {{-- â”€â”€ Page Header â”€â”€ --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div class="space-y-1">
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Executive Overview
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Pusat Kawalan Data Perbendaharaan Negeri Selangor</p>
        </div>

        <div class="flex flex-wrap gap-4 items-center">
            <button onclick="exportAllPDF()" class="btn-export-outline btn-pdf-new group flex items-center gap-4 px-6 py-3.5 rounded-[5px] shadow-sm">
                <div class="icon-box w-9 h-9 rounded-[5px] bg-rose-50 flex items-center justify-center text-rose-600 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2.5"/></svg>
                </div>
                <div class="text-left">
                    <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Generate Report</p>
                    <p class="text-[11px] font-black text-[#1E3A8A] uppercase tracking-tighter">Portable PDF</p>
                </div>
            </button>

            <button onclick="exportAllExcel()" class="btn-export-outline btn-excel-new group flex items-center gap-4 px-6 py-3.5 rounded-[5px] shadow-sm">
                <div class="icon-box w-9 h-9 rounded-[5px] bg-emerald-50 flex items-center justify-center text-emerald-600 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2.5"/></svg>
                </div>
                <div class="text-left">
                    <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Data Spreadsheet</p>
                    <p class="text-[11px] font-black text-[#1E3A8A] uppercase tracking-tighter">Microsoft Excel</p>
                </div>
            </button>
        </div>
    </div>

    {{-- â”€â”€ KPI Cards Row 1 â”€â”€ --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach([
            ['label' => 'Perolehan Semasa',  'val' => 'RM 8.24M', 'sub' => '+12.5% VS 2025',       'color' => 'blue'],
            ['label' => 'Aset Berdaftar',    'val' => '12,402',   'sub' => 'Unit Aktif',            'color' => 'red'],
            ['label' => 'Status Naziran',    'val' => '94.2%',    'sub' => 'Pematuhan Standard',    'color' => 'green'],
            ['label' => 'Teguran Audit',     'val' => '02',       'sub' => 'Perlu Tindakan',        'color' => 'yellow'],
        ] as $stat)
        <div class="bg-white p-10 rounded-[5px] card-stat-pns group">
            <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">{{ $stat['label'] }}</p>
            <h4 class="text-4xl font-black text-[#1E3A8A] tracking-tighter">{{ $stat['val'] }}</h4>
            <div class="mt-6 flex items-center gap-2">
                <div class="w-2 h-2 bg-{{ $stat['color'] == 'blue' ? 'blue' : ($stat['color'] == 'red' ? 'red' : ($stat['color'] == 'yellow' ? 'yellow' : 'green')) }}-500 rounded-full animate-pulse"></div>
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">{{ $stat['sub'] }}</span>
            </div>
        </div>
        @endforeach
    </div>

    {{-- â”€â”€ KPI Cards Row 2 â”€â”€ --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach([
            ['label' => 'Kontrak Aktif',    'val' => '38',    'sub' => '5 Tamat Bulan Ini',     'color' => 'blue'],
            ['label' => 'Tender Terbuka',   'val' => '12',    'sub' => '3 Dalam Penilaian',     'color' => 'yellow'],
            ['label' => 'Aset Pelupusan',   'val' => '247',   'sub' => 'Syor Pelupusan',        'color' => 'red'],
            ['label' => 'PTJ Berdaftar',    'val' => '64',    'sub' => '9 Daerah Selangor',     'color' => 'green'],
        ] as $stat)
        <div class="bg-white p-10 rounded-[5px] card-stat-pns group">
            <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">{{ $stat['label'] }}</p>
            <h4 class="text-4xl font-black text-[#1E3A8A] tracking-tighter">{{ $stat['val'] }}</h4>
            <div class="mt-6 flex items-center gap-2">
                <div class="w-2 h-2 bg-{{ $stat['color'] == 'blue' ? 'blue' : ($stat['color'] == 'red' ? 'red' : ($stat['color'] == 'yellow' ? 'yellow' : 'green')) }}-500 rounded-full animate-pulse"></div>
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">{{ $stat['sub'] }}</span>
            </div>
        </div>
        @endforeach
    </div>

    {{-- â”€â”€ Row 1: Line + Donut â”€â”€ --}}
    <div class="grid grid-cols-12 gap-8">

        {{-- Line Chart --}}
        <div class="col-span-12 lg:col-span-8 bg-white p-10 rounded-[5px] border border-gray-100 shadow-sm">
            <div class="flex items-start justify-between mb-2">
                <div>
                    <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Aliran Tunai & Perolehan (2026)</h4>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Nilai dalam Ringgit Malaysia (RM)</p>
                </div>
                <div class="flex gap-2">
                    <button onclick="exportChartPDF('bigTrendChart','Aliran Tunai Perolehan 2026')" class="mini-export-btn mini-pdf">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg> PDF
                    </button>
                    <button onclick="exportChartExcel('trend')" class="mini-export-btn mini-excel">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg> Excel
                    </button>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 mb-6 mt-4">
                <div class="bg-slate-50 rounded-[5px] px-5 py-3">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Jumlah 6 Bulan</p>
                    <p class="text-lg font-black text-[#1E3A8A]">RM 12.4M</p>
                </div>
                <div class="bg-slate-50 rounded-[5px] px-5 py-3">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Purata Bulanan</p>
                    <p class="text-lg font-black text-[#1E3A8A]">RM 2.07M</p>
                </div>
                <div class="bg-emerald-50 rounded-[5px] px-5 py-3">
                    <p class="text-[9px] font-black text-emerald-600 uppercase tracking-widest">Pertumbuhan YTD</p>
                    <p class="text-lg font-black text-emerald-600">+158.3%</p>
                </div>
            </div>

            <div class="flex items-center gap-6 mb-4">
                <span class="flex items-center gap-2 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                    <span class="legend-dot" style="background:#1E3A8A;"></span> Perolehan Semasa
                </span>
                <span class="flex items-center gap-2 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                    <span class="legend-dot" style="background:#E11D48; opacity:0.5;"></span> Sasaran Tahunan
                </span>
            </div>

            <div style="position:relative; height:280px;">
                <canvas id="bigTrendChart" role="img" aria-label="Line chart showing monthly procurement Jan to Jun 2026.">Jan 1.2M, Feb 1.9M, Mac 1.5M, Apr 2.5M, Mei 2.2M, Jun 3.1M</canvas>
            </div>
        </div>

        {{-- Donut Chart --}}
        <div class="col-span-12 lg:col-span-4 bg-white p-10 rounded-[5px] border border-gray-100 shadow-sm flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Kategori Aset Utama</h4>
                <div class="flex gap-2">
                    <button onclick="exportChartPDF('categoryPieChart','Kategori Aset Utama')" class="mini-export-btn mini-pdf">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg> PDF
                    </button>
                    <button onclick="exportChartExcel('category')" class="mini-export-btn mini-excel">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg> Excel
                    </button>
                </div>
            </div>

            <div class="text-center mb-3">
                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Jumlah Aset</p>
                <p class="text-3xl font-black text-[#1E3A8A]">12,402</p>
            </div>

            <div style="position:relative; height:200px;">
                <canvas id="categoryPieChart" role="img" aria-label="Doughnut chart of asset categories.">ICT 45%, Kenderaan 25%, Perabot 20%, Peralatan 10%.</canvas>
            </div>

            <div class="mt-5 space-y-2.5">
                @foreach([
                    ['label'=>'ICT',       'pct'=>'45%', 'count'=>'5,581', 'color'=>'#1E3A8A'],
                    ['label'=>'Kenderaan', 'pct'=>'25%', 'count'=>'3,101', 'color'=>'#E11D48'],
                    ['label'=>'Perabot',   'pct'=>'20%', 'count'=>'2,480', 'color'=>'#F59E0B'],
                    ['label'=>'Peralatan', 'pct'=>'10%', 'count'=>'1,240', 'color'=>'#10B981'],
                ] as $item)
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="legend-dot" style="background:{{ $item['color'] }};"></span>
                        <span class="text-[10px] font-black text-slate-600 uppercase tracking-wide">{{ $item['label'] }}</span>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] font-black text-slate-500">{{ $item['count'] }}</span>
                        <span class="text-[9px] font-bold text-slate-400 ml-2">{{ $item['pct'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- â”€â”€ Row 2: Bar + AI Insight â”€â”€ --}}
    <div class="grid grid-cols-12 gap-8">

        {{-- Bar Chart --}}
        <div class="col-span-12 bg-white p-10 rounded-[5px] border border-gray-100 shadow-sm">
            <div class="flex items-start justify-between mb-2">
                <div>
                    <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Pematuhan Pemeriksaan Mengikut Daerah</h4>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Peratusan pematuhan standard (%) â€” Q2 2026</p>
                </div>
                <div class="flex gap-2">
                    <button onclick="exportChartPDF('districtBarChart','Pematuhan Pemeriksaan Daerah')" class="mini-export-btn mini-pdf">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg> PDF
                    </button>
                    <button onclick="exportChartExcel('district')" class="mini-export-btn mini-excel">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg> Excel
                    </button>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 mt-4 mb-5">
                <div class="bg-slate-50 rounded-[5px] px-4 py-2.5">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Purata</p>
                    <p class="text-base font-black text-[#1E3A8A]">72.5%</p>
                </div>
                <div class="bg-emerald-50 rounded-[5px] px-4 py-2.5">
                    <p class="text-[9px] font-black text-emerald-600 uppercase tracking-widest">Tertinggi</p>
                    <p class="text-base font-black text-emerald-600">Sepang 90%</p>
                </div>
                <div class="bg-rose-50 rounded-[5px] px-4 py-2.5">
                    <p class="text-[9px] font-black text-rose-600 uppercase tracking-widest">Terendah</p>
                    <p class="text-base font-black text-rose-600">Hulu Langat 55%</p>
                </div>
                <div class="bg-blue-50 rounded-[5px] px-4 py-2.5">
                    <p class="text-[9px] font-black text-blue-600 uppercase tracking-widest">Sasaran</p>
                    <p class="text-base font-black text-blue-600">80%</p>
                </div>
            </div>

            <div class="flex items-center gap-6 mb-4">
                <span class="flex items-center gap-2 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                    <span class="legend-dot" style="background:#1E3A8A;"></span> Pematuhan â‰¥80% (Lulus)
                </span>
                <span class="flex items-center gap-2 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                    <span class="legend-dot" style="background:#3B82F6;"></span> 65â€“79% (Sederhana)
                </span>
                <span class="flex items-center gap-2 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                    <span class="legend-dot" style="background:#E11D48;"></span> &lt;65% (Kritikal)
                </span>
                <span class="flex items-center gap-2 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                    <span class="legend-dot" style="background:#E11D48; opacity:0.4;"></span> Sasaran (80%)
                </span>
            </div>

            <div style="position:relative; height:280px;">
                <canvas id="districtBarChart" role="img" aria-label="Bar chart showing inspection compliance by district in Selangor Q2 2026.">Petaling 85%, Gombak 72%, Klang 65%, Sepang 90%, Hulu Langat 55%, Kuala Selangor 68%</canvas>
            </div>
        </div>

        </div>

    {{-- â”€â”€ Row 3: Allocation Bar + Condition Donut + Inspection Progress â”€â”€ --}}
    <div class="grid grid-cols-12 gap-8">

        {{-- Allocation Horizontal Bar --}}
        <div class="col-span-12 lg:col-span-4 bg-white p-10 rounded-[5px] border border-gray-100 shadow-sm">
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Analisis Perolehan 2026</h4>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Mengikut Jabatan / Fungsi</p>
                </div>
                <div class="flex gap-2">
                    <button onclick="exportChartPDF('allocationChart','Analisis Perolehan 2026')" class="mini-export-btn mini-pdf">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg> PDF
                    </button>
                    <button onclick="exportChartExcel('allocation')" class="mini-export-btn mini-excel">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg> Excel
                    </button>
                </div>
            </div>
            <div style="position:relative; height:220px;">
                <canvas id="allocationChart" role="img" aria-label="Horizontal bar chart of budget allocation by department 2026.">ICT 3.64M, Infrastruktur 2.91M, Operasi 2.29M, Pentadbiran 1.56M</canvas>
            </div>
        </div>

        {{-- Condition Donut --}}
        <div class="col-span-12 lg:col-span-4 bg-white p-10 rounded-[5px] border border-gray-100 shadow-sm flex flex-col">
            <div class="flex items-start justify-between mb-4">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Status Aset Mengikut Kondisi</h4>
                <button onclick="exportChartPDF('conditionChart','Status Kondisi Aset')" class="mini-export-btn mini-pdf">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg> PDF
                </button>
            </div>
            <div style="position:relative; height:160px;">
                <canvas id="conditionChart" role="img" aria-label="Doughnut chart of asset condition status.">Baik 68%, Sederhana 22%, Rosak 7%, Pelupusan 3%</canvas>
            </div>
            <div class="mt-4 space-y-2">
                @foreach([
                    ['label'=>'Baik',      'count'=>'8,433', 'pct'=>'68%', 'color'=>'#10B981'],
                    ['label'=>'Sederhana', 'count'=>'2,728', 'pct'=>'22%', 'color'=>'#F59E0B'],
                    ['label'=>'Rosak',     'count'=>'868',   'pct'=>'7%',  'color'=>'#E11D48'],
                    ['label'=>'Pelupusan', 'count'=>'373',   'pct'=>'3%',  'color'=>'#94A3B8'],
                ] as $c)
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="legend-dot" style="background:{{ $c['color'] }};"></span>
                        <span class="text-[10px] font-black text-slate-600 uppercase tracking-wide">{{ $c['label'] }}</span>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] font-black text-slate-500">{{ $c['count'] }}</span>
                        <span class="text-[9px] font-bold text-slate-400 ml-2">{{ $c['pct'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Inspection Progress Bars --}}
        <div class="col-span-12 lg:col-span-4 bg-white p-10 rounded-[5px] border border-gray-100 shadow-sm">
            <div class="mb-6">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Log Pemeriksaan Fizikal</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Mengikut Daerah â€” Q2 2026</p>
            </div>
            <div class="space-y-5">
                @foreach([
                    ['daerah'=>'Sepang',         'pct'=>90, 'color'=>'#10B981', 'status'=>'Lulus'],
                    ['daerah'=>'Petaling',        'pct'=>85, 'color'=>'#1E3A8A', 'status'=>'Lulus'],
                    ['daerah'=>'Gombak',          'pct'=>72, 'color'=>'#3B82F6', 'status'=>'Sederhana'],
                    ['daerah'=>'Kuala Selangor',  'pct'=>68, 'color'=>'#3B82F6', 'status'=>'Sederhana'],
                    ['daerah'=>'Klang',           'pct'=>65, 'color'=>'#3B82F6', 'status'=>'Sederhana'],
                    ['daerah'=>'Hulu Langat',     'pct'=>55, 'color'=>'#E11D48', 'status'=>'Kritikal'],
                ] as $d)
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="text-[10px] font-black text-slate-600 uppercase tracking-wider">{{ $d['daerah'] }}</span>
                        <span class="text-[10px] font-black" style="color:{{ $d['color'] }};">{{ $d['pct'] }}%</span>
                    </div>
                    <div class="prog-wrap">
                        <div class="prog-fill" style="width:{{ $d['pct'] }}%; background:{{ $d['color'] }};"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const fmtRM = v => 'RM ' + (v >= 1000000 ? (v / 1000000).toFixed(1) + 'M' : (v / 1000).toFixed(0) + 'K');

    // â”€â”€ Line Chart: Aliran Tunai & Perolehan â”€â”€
    const trendLabels = ['JAN', 'FEB', 'MAC', 'APR', 'MEI', 'JUN'];
    const trendData   = [1200000, 1900000, 1500000, 2500000, 2200000, 3100000];
    const targetData  = [2000000, 2000000, 2000000, 2000000, 2000000, 2000000];

    new Chart(document.getElementById('bigTrendChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: trendLabels,
            datasets: [
                {
                    label: 'Perolehan Semasa',
                    data: trendData,
                    borderColor: '#1E3A8A',
                    backgroundColor: 'rgba(30,58,138,0.06)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#1E3A8A',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointHoverRadius: 7
                },
                {
                    label: 'Sasaran Tahunan',
                    data: targetData,
                    borderColor: '#E11D48',
                    borderWidth: 2,
                    borderDash: [6, 4],
                    pointRadius: 0,
                    fill: false,
                    tension: 0
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1E3A8A',
                    titleColor: '#93C5FD',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 12,
                    callbacks: { label: ctx => ' ' + ctx.dataset.label + ': ' + fmtRM(ctx.parsed.y) }
                }
            },
            scales: {
                x: { grid: { display: false }, ticks: { color: '#94A3B8', font: { size: 11, weight: '800' } } },
                y: { grid: { color: 'rgba(0,0,0,0.04)' }, ticks: { color: '#94A3B8', font: { size: 11 }, callback: v => fmtRM(v) } }
            }
        }
    });

    // â”€â”€ Donut Chart: Kategori Aset â”€â”€
    const catData  = [5581, 3101, 2480, 1240];
    const catTotal = catData.reduce((a, b) => a + b, 0);

    new Chart(document.getElementById('categoryPieChart').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['ICT', 'Kenderaan', 'Perabot', 'Peralatan'],
            datasets: [{
                data: catData,
                backgroundColor: ['#1E3A8A', '#E11D48', '#F59E0B', '#10B981'],
                borderWidth: 4,
                borderColor: '#ffffff',
                hoverOffset: 6,
                cutout: '78%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1E3A8A',
                    titleColor: '#93C5FD',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 12,
                    callbacks: { label: ctx => ' ' + ctx.label + ': ' + ctx.parsed.toLocaleString() + ' unit (' + Math.round(ctx.parsed / catTotal * 100) + '%)' }
                }
            }
        }
    });

    // â”€â”€ Bar Chart: Pematuhan Daerah â”€â”€
    const districtLabels = ['Petaling', 'Gombak', 'Klang', 'Sepang', 'Hulu Langat', 'Kuala Selangor'];
    const districtData   = [85, 72, 65, 90, 55, 68];
    const barColors      = districtData.map(v => v >= 80 ? '#1E3A8A' : v >= 65 ? '#3B82F6' : '#E11D48');

    new Chart(document.getElementById('districtBarChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: districtLabels,
            datasets: [
                {
                    label: 'Pematuhan Semasa (%)',
                    data: districtData,
                    backgroundColor: barColors,
                    borderRadius: 10,
                    barThickness: 32
                },
                {
                    label: 'Sasaran (80%)',
                    data: Array(districtLabels.length).fill(80),
                    type: 'line',
                    borderColor: '#E11D48',
                    borderWidth: 2,
                    borderDash: [6, 4],
                    pointRadius: 0,
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1E3A8A',
                    titleColor: '#93C5FD',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 12,
                    callbacks: { label: ctx => ' ' + ctx.dataset.label + ': ' + ctx.parsed.y + '%' }
                }
            },
            scales: {
                x: { grid: { display: false }, ticks: { color: '#94A3B8', font: { size: 11, weight: '800' } } },
                y: {
                    min: 0, max: 100,
                    grid: { color: 'rgba(0,0,0,0.04)' },
                    ticks: { color: '#94A3B8', font: { size: 11 }, callback: v => v + '%' }
                }
            }
        }
    });

    // â”€â”€ Horizontal Bar: Agihan Peruntukan â”€â”€
    new Chart(document.getElementById('allocationChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Teknologi Maklumat', 'Infrastruktur', 'Operasi', 'Pentadbiran & Lain'],
            datasets: [{
                label: 'Peruntukan (RM)',
                data: [3640000, 2912000, 2288000, 1560000],
                backgroundColor: ['#1E3A8A', '#3B82F6', '#F59E0B', '#10B981'],
                borderRadius: 8,
                barThickness: 26
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1E3A8A',
                    titleColor: '#93C5FD',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 12,
                    callbacks: { label: ctx => ' ' + fmtRM(ctx.parsed.x) }
                }
            },
            scales: {
                x: { grid: { color: 'rgba(0,0,0,0.04)' }, ticks: { color: '#94A3B8', font: { size: 10 }, callback: v => fmtRM(v) } },
                y: { grid: { display: false }, ticks: { color: '#94A3B8', font: { size: 10, weight: '800' } } }
            }
        }
    });

    // â”€â”€ Donut Chart: Kondisi Aset â”€â”€
    const condData  = [8433, 2728, 868, 373];
    const condTotal = condData.reduce((a, b) => a + b, 0);

    new Chart(document.getElementById('conditionChart').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Baik', 'Sederhana', 'Rosak', 'Pelupusan'],
            datasets: [{
                data: condData,
                backgroundColor: ['#10B981', '#F59E0B', '#E11D48', '#94A3B8'],
                borderWidth: 4,
                borderColor: '#ffffff',
                hoverOffset: 6,
                cutout: '74%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1E3A8A',
                    titleColor: '#93C5FD',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 12,
                    callbacks: { label: ctx => ' ' + ctx.label + ': ' + ctx.parsed.toLocaleString() + ' unit (' + Math.round(ctx.parsed / condTotal * 100) + '%)' }
                }
            }
        }
    
    // ── Trend Penyelenggaraan Aset ──
    const maintLabels = ['JAN', 'FEB', 'MAC', 'APR', 'MEI', 'JUN'];
    const maintData = [45, 52, 38, 60, 48, 70];

    new Chart(document.getElementById('maintenanceTrendChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: maintLabels,
            datasets: [{
                label: 'Permintaan Penyelenggaraan',
                data: maintData,
                borderColor: '#E11D48',
                backgroundColor: 'rgba(225,29,72,0.06)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#E11D48',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1E3A8A',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 8,
                    callbacks: { label: ctx => ' ' + ctx.dataset.label + ': ' + ctx.parsed.y + ' Kes' }
                }
            },
            scales: {
                x: { grid: { display: false }, ticks: { color: '#94A3B8', font: { size: 11, weight: '800' } } },
                y: { grid: { color: 'rgba(0,0,0,0.04)' }, ticks: { color: '#94A3B8', font: { size: 11 } } }
            }
        }
    });
});


// â”€â”€ Export Helpers â”€â”€
function exportChartPDF(canvasId, title) {
    const canvas = document.getElementById(canvasId);
    const url    = canvas.toDataURL('image/png');
    const win    = window.open('', '_blank');
    win.document.write(
        '<html><head><title>' + title + '</title>' +
        '' +
        '</head><body>' +
        '<h2>' + title + '</h2>' +
        '<p>Dijana pada: ' + new Date().toLocaleString('ms-MY') + '</p>' +
        '<img src="' + url + '" />' +
        '<scr' + 'ipt>window.onload=()=>{window.print();}<\/scr' + 'ipt>' +
        '</body></html>'
    );
    win.document.close();
}

function exportTablePDF(tableId, title) {
    const table = document.getElementById(tableId);
    if (!table) return;
    const win = window.open('', '_blank');
    win.document.write(
        '<html><head><title>' + title + '</title>' +
        '' +
        '</head><body>' +
        '<h2>' + title + '</h2>' +
        '<p>Dijana pada: ' + new Date().toLocaleString('ms-MY') + '</p>' +
        table.outerHTML +
        '<scr' + 'ipt>window.onload=()=>{window.print();}<\/scr' + 'ipt>' +
        '</body></html>'
    );
    win.document.close();
}

function exportChartExcel(type) {
    const datasets = {
        trend: {
            headers: ['Bulan', 'Perolehan Semasa (RM)', 'Sasaran (RM)'],
            rows: [
                ['JAN', 1200000, 2000000], ['FEB', 1900000, 2000000], ['MAC', 1500000, 2000000],
                ['APR', 2500000, 2000000], ['MEI', 2200000, 2000000], ['JUN', 3100000, 2000000]
            ]
        },
        category: {
            headers: ['Kategori', 'Bilangan Unit', 'Peratusan (%)'],
            rows: [['ICT', 5581, 45], ['Kenderaan', 3101, 25], ['Perabot', 2480, 20], ['Peralatan', 1240, 10]]
        },
        district: {
            headers: ['Daerah', 'Pematuhan (%)', 'Sasaran (%)'],
            rows: [
                ['Petaling', 85, 80], ['Gombak', 72, 80], ['Klang', 65, 80],
                ['Sepang', 90, 80], ['Hulu Langat', 55, 80], ['Kuala Selangor', 68, 80]
            ]
        },
        allocation: {
            headers: ['Jabatan', 'Peruntukan (RM)'],
            rows: [['Teknologi Maklumat', 3640000], ['Infrastruktur', 2912000], ['Operasi', 2288000], ['Pentadbiran & Lain', 1560000]]
        },
        contracts: {
            headers: ['No. Kontrak', 'Tajuk', 'PTJ', 'Nilai (RM)', 'Tarikh Mula', 'Tarikh Tamat', 'Status', 'Progres (%)'],
            rows: [
                ['KTR/2026/001', 'Pembekalan Server HPE Rack G11',        'Teknologi Maklumat',  1250000, 'Jan 2026', 'Jun 2026', 'Dalam Proses', 65],
                ['KTR/2026/002', 'Perkhidmatan Penyelenggaraan Bangunan', 'Pengurusan Hartanah', 890000,  'Jan 2026', 'Dis 2026', 'Aktif',        30],
                ['KTR/2026/003', 'Bekalan Kenderaan Operasi (4WD)',       'Jabatan Kejuruteraan',2100000, 'Feb 2026', 'Mac 2027', 'Aktif',        15],
                ['KTR/2026/004', 'Sistem Pengurusan Dokumen (DMS)',       'Pentadbiran Am',      450000,  'Okt 2025', 'Mei 2026', 'Hampir Tamat', 92],
                ['KTR/2026/005', 'Perkhidmatan Keselamatan Bangunan',    'Unit Keselamatan',    360000,  'Jan 2026', 'Dis 2026', 'Aktif',        40],
                ['KTR/2026/006', 'Ubahsuai Pejabat Aras 3',              'Pengurusan Hartanah', 780000,  'Mei 2026', 'Ogos 2026','Tender',       10],
                ['KTR/2026/007', 'Pembekalan Perabot Pejabat',           'Pengurusan Aset',     320000,  'Mar 2026', 'Jul 2026', 'Dalam Proses', 45],
                ['KTR/2026/008', 'Sistem CCTV Bersepadu',                'Unit Keselamatan',    610000,  'Apr 2026', 'Sep 2026', 'Aktif',        20],
            ]
        },
        aset: {
            headers: ['No. KEW', 'Keterangan', 'Kategori', 'Nilai (RM)', 'Lokasi', 'Kondisi'],
            rows: [
                ['PNS/ICT/089', 'Laptop Apple MacBook M3 Pro',    'ICT',       8500,   'Pej. ICT Aras 2',     'Baik'],
                ['PNS/KDR/044', 'Kenderaan Toyota Hilux (2024)',  'Kenderaan', 145000, 'Pej. Kejuruteraan',   'Baik'],
                ['PNS/ICT/090', 'Pelayan Dell PowerEdge R750',    'ICT',       62000,  'Bilik Server B1',     'Sederhana'],
                ['PNS/PRB/112', 'Meja Kerja Eksekutif (Set 6)',   'Perabot',   4200,   'Bilik Mesyuarat A',   'Baik'],
                ['PNS/KDR/041', 'Bas Mini 15 Tempat Duduk',      'Kenderaan', 210000, 'Parking Blok A',      'Rosak'],
                ['PNS/ICT/091', 'Switch Cisco Catalyst 9300',     'ICT',       18500,  'Bilik Server B1',     'Baik'],
                ['PNS/PRL/028', 'Mesin Fotostat Canon iR3530',   'Peralatan', 12800,  'Aras 1 Pentadbiran',  'Sederhana'],
            ]
        },
        audit: {
            headers: ['Timestamp', 'Pengguna', 'Peranan', 'Modul', 'Tindakan', 'Rekod', 'Status'],
            rows: [
                ['30/04/2026 14:32', 'Ahmad Fadzil',  'Pentadbir',    'Perolehan', 'Kemaskini',       'KTR/2026/001', 'Berjaya'],
                ['30/04/2026 13:15', 'Siti Hajar',    'Pegawai Aset', 'Aset',      'Daftar Baru',     'PNS/ICT/089',  'Berjaya'],
                ['30/04/2026 11:40', 'Mohd Razif',    'Eksekutif',    'Dashboard', 'Log Masuk',       'â€”',            'Info'],
                ['30/04/2026 10:22', 'Nurul Ain',     'Pegawai Aset', 'Aset',      'Kemaskini Lokasi','PNS/KDR/041',  'Berjaya'],
                ['30/04/2026 09:05', 'Zulkifli Omar', 'Pentadbir',    'Perolehan', 'Tambah Kontrak',  'KTR/2026/008', 'Berjaya'],
                ['29/04/2026 17:45', 'Azlan Shah',    'Pengguna',     'Laporan',   'Jana PDF',        'Laporan Q2',   'Info'],
                ['29/04/2026 16:30', 'Faridah Idris', 'Pegawai Aset', 'Pelupusan', 'Kemaskini Status','PNS/PRB/055',  'Semakan'],
            ]
        }
    };

    const d = datasets[type];
    if (!d) return;
    let csv = d.headers.join(',') + '\n';
    d.rows.forEach(r => { csv += r.map(c => '"' + String(c).replace(/"/g, '""') + '"').join(',') + '\n'; });
    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    link.href  = URL.createObjectURL(blob);
    link.download = 'EIS_PNS_' + type + '_' + new Date().toISOString().slice(0, 10) + '.csv';
    link.click();
}

function exportAllPDF()   { exportChartPDF('bigTrendChart', 'Laporan Penuh EIS PNS'); }
function exportAllExcel() { ['trend', 'category', 'district', 'allocation'].forEach(t => exportChartExcel(t)); }
</script>
@endsection
