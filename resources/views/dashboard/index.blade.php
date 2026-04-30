@extends('layouts.dashboard')

@section('content')
<style>
    body { background-color: #F8FAFC; }
    .content-fluid { width: 100%; max-width: 100%; padding: 0 1.5rem; }
    
    /* PNS CARD IDENTITY */
    .card-stat-pns {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #F1F5F9;
        position: relative;
        overflow: hidden;
    }
    .card-stat-pns:hover {
        transform: translateY(-8px);
        box-shadow: -10px 20px 30px -15px rgba(225, 29, 72, 0.2), 10px 20px 30px -15px rgba(250, 204, 21, 0.2);
        border-color: rgba(225, 29, 72, 0.1);
    }

    /* Sleek Export Buttons */
    .btn-export-mini {
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 9px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 6px;
        border: 1.5px solid #F1F5F9;
        background: white;
    }
    .btn-export-mini:hover { background: #F8FAFC; border-color: #1E3A8A; color: #1E3A8A; }

    .btn-export-outline { background: white; transition: all 0.4s ease; border: 1.5px solid #F1F5F9; }
    .icon-box { transition: all 0.3s ease; }
    .btn-pdf-new:hover { border-color: #E11D48; background: rgba(225, 29, 72, 0.02); }
    .btn-pdf-new:hover .icon-box { background: #E11D48; color: white; transform: scale(1.1) rotate(-5deg); }
    .btn-excel-new:hover { border-color: #10B981; background: rgba(16, 185, 129, 0.02); }
    .btn-excel-new:hover .icon-box { background: #10B981; color: white; transform: scale(1.1) rotate(-5deg); }

    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #E2E8F0; border-radius: 10px; }
</style>

<div class="content-fluid space-y-8 pb-12">
    
    <!-- HEADER SECTION -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div class="space-y-1">
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none" style="font-family: Arial !important;">
                Executive <span class="text-blue-600">Overview<span class="text-yellow-400">.</span></span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3" style="font-family: Arial !important;">Pusat Kawalan Data Perbendaharaan Negeri Selangor</p>
        </div>
        
        <div class="flex flex-wrap gap-4 items-center">
            <button class="btn-export-outline btn-pdf-new group flex items-center gap-4 px-6 py-3.5 rounded-2xl shadow-sm">
                <div class="icon-box w-9 h-9 rounded-xl bg-rose-50 flex items-center justify-center text-rose-600 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2.5"/></svg>
                </div>
                <div class="text-left">
                    <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Generate Report</p>
                    <p class="text-[11px] font-black text-[#1E3A8A] uppercase tracking-tighter">Portable PDF</p>
                </div>
            </button>
            <button class="btn-export-outline btn-excel-new group flex items-center gap-4 px-6 py-3.5 rounded-2xl shadow-sm">
                <div class="icon-box w-9 h-9 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2.5"/></svg>
                </div>
                <div class="text-left">
                    <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Data Spreadsheet</p>
                    <p class="text-[11px] font-black text-[#1E3A8A] uppercase tracking-tighter">Microsoft Excel</p>
                </div>
            </button>
        </div>
    </div>

    <!-- CARDS STATS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach([
            ['label' => 'Perolehan Semasa', 'val' => 'RM 8.24M', 'sub' => '+12.5% VS 2025', 'color' => 'blue'],
            ['label' => 'Aset Berdaftar', 'val' => '12,402', 'sub' => 'Unit Aktif', 'color' => 'red'],
            ['label' => 'Status Naziran', 'val' => '94.2%', 'sub' => 'Pematuhan Standard', 'color' => 'green'],
            ['label' => 'Teguran Audit', 'val' => '02', 'sub' => 'Perlu Tindakan', 'color' => 'yellow']
        ] as $stat)
        <div class="bg-white p-10 rounded-[2.5rem] card-stat-pns group border border-gray-100">
            <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">{{ $stat['label'] }}</p>
            <h4 class="text-4xl font-black text-[#1E3A8A] tracking-tighter">{{ $stat['val'] }}</h4>
            <div class="mt-6 flex items-center gap-2">
                <div class="w-2 h-2 bg-{{ $stat['color'] == 'blue' ? 'blue' : ($stat['color'] == 'red' ? 'red' : 'green') }}-500 rounded-full animate-pulse"></div>
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">{{ $stat['sub'] }}</span>
            </div>
        </div>
        @endforeach
    </div>

    <!-- MAIN GRAPHS -->
    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-8 bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Aliran Tunai & Perolehan (2026)</h4>
                </div>
                <div class="flex gap-2">
                    <button class="btn-export-mini">PDF</button>
                    <button class="btn-export-mini">EXCEL</button>
                </div>
            </div>
            <div class="h-[350px]"><canvas id="bigTrendChart"></canvas></div>
        </div>

        <!-- Doughnut Chart Section -->
        <div class="col-span-12 lg:col-span-4 bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm flex flex-col relative overflow-hidden">
            <div class="flex justify-between items-center mb-10 text-center">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest w-full" style="font-family: Arial !important;">Kategori Aset Utama</h4>
            </div>

            <!-- Chart Container -->
            <div class="h-[250px] w-full relative">
                <canvas id="categoryPieChart"></canvas>
                <!-- Center Text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                    <span class="text-3xl font-black text-[#1E3A8A] tracking-tighter" style="font-family: Arial !important;">100%</span>
                    <span class="text-[8px] font-bold text-slate-400 uppercase tracking-widest" style="font-family: Arial !important;">Total Aset</span>
                </div>
            </div>

            <!-- NEW: Analytical Legend (Detail yang tertinggal) -->
            <div class="mt-8 grid grid-cols-2 gap-y-4 gap-x-2 border-t border-gray-50 pt-6">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-md bg-[#1E3A8A] shadow-sm"></div>
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-[#1E3A8A] uppercase" style="font-family: Arial !important;">ICT & Gadget</span>
                        <span class="text-[8px] font-bold text-slate-400">45.0% (RM 3.7M)</span>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-md bg-[#E11D48] shadow-sm"></div>
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-[#1E3A8A] uppercase" style="font-family: Arial !important;">Kenderaan</span>
                        <span class="text-[8px] font-bold text-slate-400">25.0% (RM 2.1M)</span>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-md bg-[#F59E0B] shadow-sm"></div>
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-[#1E3A8A] uppercase" style="font-family: Arial !important;">Perabot</span>
                        <span class="text-[8px] font-bold text-slate-400">20.0% (RM 1.6M)</span>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-md bg-[#10B981] shadow-sm"></div>
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-[#1E3A8A] uppercase" style="font-family: Arial !important;">Peralatan</span>
                        <span class="text-[8px] font-bold text-slate-400">10.0% (RM 0.8M)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECONDARY GRAPHS + FAI INSIGHT -->
    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-9 bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm relative overflow-hidden">
            <div class="flex justify-between items-center mb-10">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Pematuhan Pemeriksaan Daerah</h4>
                <button class="btn-export-mini">Export Excel</button>
            </div>
            <div class="h-[300px]"><canvas id="districtBarChart"></canvas></div>
        </div>
        <div class="col-span-12 lg:col-span-3">
            <div class="bg-[#1E3A8A] p-10 rounded-[3rem] text-white shadow-2xl h-full flex flex-col justify-between group overflow-hidden relative border border-white/10">
                <div class="absolute -right-10 -top-10 w-48 h-48 bg-blue-400/20 rounded-full blur-3xl"></div>
                <div>
                    <div class="w-14 h-14 bg-white/10 rounded-[1.5rem] flex items-center justify-center mb-10 border border-white/10 shadow-inner">
                        <svg class="w-7 h-7 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-width="2.5"/></svg>
                    </div>
                    <h4 class="text-[11px] font-bold opacity-50 uppercase tracking-[0.3em] mb-4">FAI Insight Engine</h4>
                    <p class="text-2xl font-black leading-tight tracking-tighter">"Daerah Petaling merekodkan pematuhan tertinggi bagi Q2."</p>
                </div>
                <a href="{{ route('chatbot') }}" class="mt-12 w-full py-4 bg-white text-[#1E3A8A] rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-yellow-400 hover:scale-105 transition-all text-center shadow-lg block">Tanya FAI</a>
            </div>
        </div>
    </div>

    <!-- LIVE ACTIVITY STREAM (RESTORED) -->
    <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-[0.3em] mt-12 border-l-4 border-red-600 pl-4">Live Activity Stream</h4>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach([
            ['cat' => 'Perolehan', 'color' => 'blue', 'logs' => [
                ['title' => 'PO Diluluskan', 'desc' => 'PO #8821 (ICT Server)', 'time' => '2m ago'],
                ['title' => 'Tender Baru', 'desc' => 'Perolehan Van Jenazah', 'time' => '45m ago'],
                ['title' => 'Audit Selesai', 'desc' => 'Semakan Vendor Q1', 'time' => '5h ago']
            ]],
            ['cat' => 'Pengurusan Aset', 'color' => 'red', 'logs' => [
                ['title' => 'Pendaftaran Baru', 'desc' => 'PNS/ICT/089 (Laptop)', 'time' => '10m ago'],
                ['title' => 'Syor Pelupusan', 'desc' => 'Kenderaan Jabatan', 'time' => '1h ago'],
                ['title' => 'Pemeriksaan Fizikal', 'desc' => 'Unit Kewangan Selesai', 'time' => 'Yesterday']
            ]],
            ['cat' => 'Maintenance', 'color' => 'yellow', 'logs' => [
                ['title' => 'Servis Aircond', 'desc' => 'Blok Pentadbiran', 'time' => 'Now'],
                ['title' => 'Jadual Servis Lift', 'desc' => 'Pemeriksaan JKKP', 'time' => '2h ago'],
                ['title' => 'Update Software', 'desc' => 'PNS Core Update', 'time' => '5h ago']
            ]],
            ['cat' => 'Naziran & Audit', 'color' => 'green', 'logs' => [
                ['title' => 'Lawatan Tapak', 'desc' => 'Pejabat Sabak Bernam', 'time' => '1h ago'],
                ['title' => 'Teguran Audit Q1', 'desc' => 'Kategori Pematuhan', 'time' => '4h ago'],
                ['title' => 'Update KEW.PA', 'desc' => 'Semakan Borang PA-14', 'time' => '2 days ago']
            ]]
        ] as $column)
        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex flex-col h-[400px]">
            <div class="flex justify-between items-center mb-6">
                <span class="text-[10px] font-black text-{{ $column['color'] }}-600 uppercase">{{ $column['cat'] }}</span>
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            </div>
            <div class="space-y-6 overflow-y-auto custom-scrollbar flex-1 pr-2">
                @foreach($column['logs'] as $log)
                <div class="border-b border-gray-50 pb-4">
                    <h5 class="text-[11px] font-black text-slate-700 uppercase tracking-tighter">{{ $log['title'] }}</h5>
                    <p class="text-[9px] font-bold text-slate-400 mt-1 uppercase">{{ $log['desc'] }}</p>
                    <p class="text-[8px] font-black text-{{ $column['color'] }}-400 mt-1">{{ $log['time'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        Chart.defaults.font.family = 'Arial';
        Chart.defaults.font.weight = 'bold';

        // Trend Chart
        new Chart(document.getElementById('bigTrendChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['JAN', 'FEB', 'MAC', 'APR', 'MEI', 'JUN'],
                datasets: [{ 
                    label: 'Perolehan (RM)',
                    data: [1.2, 1.9, 1.5, 2.5, 2.2, 3.1], 
                    borderColor: '#1E3A8A', borderWidth: 4, fill: true, 
                    backgroundColor: (ctx) => {
                        const g = ctx.chart.ctx.createLinearGradient(0, 0, 0, 400);
                        g.addColorStop(0, 'rgba(30, 58, 138, 0.2)'); g.addColorStop(1, 'rgba(30, 58, 138, 0)');
                        return g;
                    },
                    tension: 0.4, pointRadius: 6, pointBackgroundColor: '#fff', pointBorderColor: '#1E3A8A'
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
        });

        // Pie Chart
        new Chart(document.getElementById('categoryPieChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['ICT', 'Kenderaan', 'Perabot', 'Peralatan'],
                datasets: [{ 
                    data: [45, 25, 20, 10], 
                    backgroundColor: ['#1E3A8A', '#E11D48', '#F59E0B', '#10B981'], 
                    borderWidth: 5, borderColor: '#fff'
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, cutout: '75%', plugins: { legend: { display: false } } }
        });

        // Bar Chart
        new Chart(document.getElementById('districtBarChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Petaling', 'Gombak', 'Klang', 'Sepang', 'Hulu Langat', 'Kuala Selangor'],
                datasets: [{ 
                    data: [85, 72, 65, 90, 55, 68], 
                    backgroundColor: '#1E3A8A', borderRadius: 8, barThickness: 30 
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
        });
    });
</script>
@endsection