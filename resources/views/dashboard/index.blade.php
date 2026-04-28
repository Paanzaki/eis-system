@extends('layouts.dashboard')

@section('content')
<style>
    body { background-color: #FAFAFA; color: #1F2937; }
    .glass-card { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); }
</style>

<div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-1">
        <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">Centralize <span class="text-blue-500">Dashboard.</span></h3>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Integrasi Modul Perolehan & Aset (Real-time BI)</p>
    </div>
    <div class="flex gap-3">
        <div class="flex bg-gray-100 p-1 rounded-xl shadow-inner">
            <button onclick="alert('Export PDF: Executive Summary')" class="px-4 py-2 text-[9px] font-black uppercase tracking-widest text-gray-500 hover:text-[#1E3A8A] transition-all">PDF Report</button>
            <button onclick="alert('Export Excel: Raw Data')" class="px-4 py-2 bg-white rounded-lg shadow-sm text-[9px] font-black uppercase tracking-widest text-[#1E3A8A] transition-all">Excel / CSV</button>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm group hover:border-blue-200 transition-all">
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 italic">Perolehan Suku Ke-2</p>
        <h4 class="text-3xl font-black text-[#1E3A8A]">RM 8,241,500</h4>
        <div class="mt-4 flex items-center gap-2 text-green-500">
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/></svg>
            <span class="text-[9px] font-black uppercase tracking-widest">+12.4% vs S1</span>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 italic">Inventori Aset</p>
        <h4 class="text-3xl font-black text-[#1E3A8A]">12,402 <span class="text-xs font-normal text-gray-400">UNIT</span></h4>
        <p class="text-[9px] font-bold text-blue-400 mt-4 uppercase">Verified by Asset Dept</p>
    </div>

    <div class="bg-[#1E3A8A] p-8 rounded-[2.5rem] text-white relative overflow-hidden shadow-xl shadow-blue-100 md:col-span-2">
        <div class="relative z-10">
            <p class="text-[10px] font-bold opacity-60 uppercase tracking-widest mb-1 italic">Status Pemeriksaan Fizikal</p>
            <h4 class="text-5xl font-black italic tracking-tighter">84.2% DONE</h4>
            <div class="mt-6 flex items-center gap-4">
                <div class="flex-1 h-2 bg-white/10 rounded-full overflow-hidden">
                    <div class="h-full bg-blue-400 w-[84%]"></div>
                </div>
                <span class="text-[10px] font-black italic">Q2-2026</span>
            </div>
        </div>
        <svg class="absolute right-[-20px] bottom-[-20px] w-48 h-48 text-white/5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
    <div class="lg:col-span-2 bg-white p-10 rounded-[3.5rem] border border-gray-100 shadow-sm relative overflow-hidden">
        <div class="flex items-center justify-between mb-10">
            <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] italic">Trend Perbelanjaan Bulanan (PNS)</h4>
            <select class="bg-gray-50 border-none rounded-lg px-4 py-1.5 text-[9px] font-black text-[#1E3A8A] uppercase outline-none ring-1 ring-gray-100">
                <option>Tahun 2026</option>
                <option>Tahun 2025</option>
            </select>
        </div>
        <div class="h-80 w-full">
            <canvas id="expenditureChart"></canvas>
        </div>
    </div>

    <div class="bg-white p-10 rounded-[3.5rem] border border-gray-100 shadow-sm flex flex-col items-center justify-center">
        <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-widest mb-10 text-center">Taburan Kategori Aset</h4>
        <div class="w-full h-64 relative">
            <canvas id="categoryChart"></canvas>
            <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                <span class="text-2xl font-black text-[#1E3A8A]">3 Sektor</span>
                <span class="text-[8px] font-bold text-gray-400 uppercase tracking-widest">Utama</span>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm">
        <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-8 italic">Status Migrasi Data (ETL)</h4>
        <div class="space-y-6">
            @foreach(['Excel_Legacy_PNS' => 100, 'Procurement_DB' => 65, 'BTM_Asset_Sync' => 30] as $file => $progress)
            <div class="space-y-2">
                <div class="flex justify-between text-[9px] font-black uppercase">
                    <span class="text-gray-600">{{ $file }}</span>
                    <span class="{{ $progress == 100 ? 'text-green-500' : 'text-blue-500' }}">{{ $progress }}%</span>
                </div>
                <div class="h-1.5 bg-gray-50 rounded-full overflow-hidden">
                    <div class="h-full bg-[#1E3A8A] transition-all duration-1000" style="width: {{ $progress }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm flex flex-col justify-center">
        <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-6">Carian Pantas Eksekutif</h4>
        <div class="relative">
            <input type="text" placeholder="No. Kontrak / ID Aset..." class="w-full bg-gray-50 border-none rounded-2xl px-6 py-5 text-xs font-bold outline-none focus:ring-2 focus:ring-blue-100 transition-all">
            <button class="absolute right-3 top-3 bg-[#1E3A8A] text-white px-5 py-2 rounded-xl text-[9px] font-black uppercase shadow-lg shadow-blue-100">Cari</button>
        </div>
        <div class="mt-6 flex flex-wrap gap-2">
            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[8px] font-black rounded-lg uppercase">#ICT_Tender</span>
            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[8px] font-black rounded-lg uppercase">#Veh_Service</span>
        </div>
    </div>

    <div class="bg-blue-50/50 p-10 rounded-[3rem] border border-blue-100 flex flex-col justify-between">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-width="2.5"/></svg>
            </div>
            <h4 class="text-[10px] font-black text-[#1E3A8A] uppercase tracking-widest">AI Insights</h4>
        </div>
        <p class="text-[11px] font-bold text-gray-600 leading-relaxed italic">"Terdapat 12 aset kenderaan yang akan tamat tempoh penyenggaraan dalam masa 7 hari."</p>
        <a href="{{ route('chatbot') }}" class="mt-4 text-[9px] font-black text-blue-500 uppercase underline">Tanya IntelliHub</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Expenditure Chart (Line)
        const expCtx = document.getElementById('expenditureChart').getContext('2d');
        new Chart(expCtx, {
            type: 'line',
            data: {
                labels: ['JAN', 'FEB', 'MAC', 'APR', 'MEI', 'JUN'],
                datasets: [{
                    data: [1200000, 1900000, 1500000, 2500000, 2200000, 3100000],
                    borderColor: '#1E3A8A',
                    borderWidth: 4,
                    fill: true,
                    backgroundColor: 'rgba(30, 58, 138, 0.05)',
                    tension: 0.45,
                    pointRadius: 0,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: '#1E3A8A'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { size: 9, weight: 'bold' }, color: '#94a3b8' } },
                    y: { grid: { color: 'rgba(0,0,0,0.03)' }, ticks: { display: false } }
                }
            }
        });

        // Category Chart (Doughnut)
        const catCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(catCtx, {
            type: 'doughnut',
            data: {
                labels: ['ICT', 'VEHICLE', 'OFFICE'],
                datasets: [{
                    data: [45, 30, 25],
                    backgroundColor: ['#1E3A8A', '#3B82F6', '#BFDBFE'],
                    borderWidth: 0,
                    cutout: '80%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });
    });
</script>
@endsection