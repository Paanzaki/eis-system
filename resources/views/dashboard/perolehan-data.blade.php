@extends('layouts.dashboard')

@section('content')
<style>
    body { background-color: #F8FAFC; color: #1E293B; }
    .rounded-sharp { border-radius: 1.25rem; }
    .rounded-header { border-radius: 2rem; }
    .hero-shadow { box-shadow: 0 20px 25px -5px rgba(30, 58, 138, 0.05); }
</style>

<div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6 border-b border-gray-100 pb-8">
    <div class="space-y-1">
        <div class="flex items-center gap-2 mb-3">
            <div class="h-1.5 w-12 bg-red-600 rounded-full"></div>
            <div class="h-1.5 w-6 bg-yellow-400 rounded-full"></div>
        </div>
        <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase italic leading-none">
            Analytics <span class="text-blue-600">& ETL<span class="text-yellow-400">.</span></span>
        </h3>
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mt-2">Kawalan Migrasi Data & Pembersihan Integrasi PNS</p>
    </div>
    <div class="flex gap-3">
        <button onclick="alert('Starting ETL Cleanup Process...')" 
            class="bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3.5 rounded-xl text-[9px] font-black uppercase tracking-widest shadow-xl shadow-blue-900/20 transition-all hover:scale-105 active:scale-95">
            Run Data Cleansing
        </button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-8 rounded-header border border-gray-100 shadow-sm flex items-center gap-6 group hover:border-blue-200 transition-all">
        <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 shadow-inner group-hover:rotate-6 transition-transform">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Integriti Data</p>
            <h4 class="text-3xl font-black text-[#1E3A8A] tracking-tighter">99.8% <span class="text-[9px] text-green-500 italic tracking-normal uppercase ml-1">Healthy</span></h4>
        </div>
    </div>

    <div class="bg-white p-8 rounded-header border border-gray-100 shadow-sm flex items-center gap-6 group hover:border-blue-200 transition-all">
        <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 shadow-inner group-hover:rotate-6 transition-transform">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
        </div>
        <div>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Rekod Dimigrasi</p>
            <h4 class="text-3xl font-black text-[#1E3A8A] tracking-tighter">45,201 <span class="text-[9px] text-blue-400 italic tracking-normal uppercase ml-1">Rows</span></h4>
        </div>
    </div>

    <div class="bg-orange-50 p-8 rounded-header border border-orange-100 shadow-sm flex items-center gap-6 group hover:bg-white hover:border-orange-200 transition-all">
        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-orange-500 shadow-md group-hover:rotate-6 transition-transform">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
        </div>
        <div>
            <p class="text-[10px] font-black text-orange-500/60 uppercase tracking-widest italic">Duplikasi Dikesan</p>
            <h4 class="text-3xl font-black text-orange-600 tracking-tighter">12 <span class="text-[9px] text-orange-400 italic tracking-normal uppercase ml-1">Resolved</span></h4>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="bg-white p-10 rounded-header border border-gray-100 shadow-sm relative overflow-hidden">
        <div class="flex items-center justify-between mb-10">
            <h4 class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] italic">ETL Pipeline Status</h4>
            <div class="flex items-center gap-2">
                <span class="text-[8px] font-black text-green-500 uppercase tracking-widest">Live Monitoring</span>
                <div class="w-2 h-2 bg-green-500 rounded-full animate-ping"></div>
            </div>
        </div>
        <div class="space-y-10">
            @foreach([
                ['Extraction', 'PNS_Legacy_DB', '100%', 'bg-blue-900'],
                ['Transformation', 'Data Mapping & Cleaning', '85%', 'bg-blue-600'],
                ['Loading', 'Cloud Production Server', '40%', 'bg-yellow-400']
            ] as $step)
            <div class="space-y-3">
                <div class="flex justify-between text-[10px] font-black uppercase tracking-widest">
                    <span class="text-slate-700">{{ $step[0] }} <span class="text-slate-300 mx-2">|</span> <span class="text-[8px] text-slate-400 italic">{{ $step[1] }}</span></span>
                    <span class="text-[#1E3A8A] italic">{{ $step[2] }}</span>
                </div>
                <div class="h-2 bg-slate-50 rounded-full overflow-hidden border border-slate-100 shadow-inner p-[1px]">
                    <div class="h-full {{ $step[3] }} rounded-full transition-all duration-1000 shadow-[0_0_8px_rgba(30,58,138,0.2)]" style="width: {{ $step[2] }}"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="bg-[#1E3A8A] p-10 rounded-header shadow-2xl shadow-blue-900/20 text-white relative overflow-hidden group">
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-400/20 rounded-full blur-3xl group-hover:bg-blue-400/30 transition-all duration-700"></div>
        
        <div class="relative z-10 h-full flex flex-col justify-between">
            <div>
                <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-6 border border-white/10">
                    <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"/></svg>
                </div>
                <h4 class="text-[11px] font-bold opacity-50 uppercase tracking-[0.2em] mb-4 italic">Laporan Pembersihan Data</h4>
                <p class="text-xl font-black italic leading-relaxed tracking-tighter">
                    "Sistem berjaya mengesan 1,202 ralat format tarikh dalam fail Excel dan telah ditukarkan secara automatik kepada format ISO (YYYY-MM-DD)."
                </p>
            </div>
            
            <div class="mt-12 pt-8 border-t border-white/10 grid grid-cols-2 gap-4">
                <div>
                    <p class="text-[8px] font-bold opacity-40 uppercase tracking-widest mb-1">Terakhir Disinkron</p>
                    <p class="text-[10px] font-black uppercase tracking-widest text-white">28 APR 2026 <span class="text-yellow-400 mx-1">•</span> 08:30</p>
                </div>
                <div class="text-right">
                    <p class="text-[8px] font-bold opacity-40 uppercase tracking-widest mb-1">Status Enjin</p>
                    <div class="flex items-center justify-end gap-2">
                        <p class="text-[10px] font-black uppercase tracking-widest text-green-400 italic">Optimal</p>
                    </div>
                </div>
            </div>
        </div>
        <svg class="absolute right-[-20px] top-[-20px] w-48 h-48 text-white/5 rotate-12" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/></svg>
    </div>
</div>

<div class="mt-8 bg-white p-10 rounded-header border border-gray-100 shadow-sm overflow-hidden group">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-3">
            <div class="w-1.5 h-1.5 bg-blue-600 rounded-full group-hover:scale-150 transition-transform"></div>
            <h4 class="text-[11px] font-black text-slate-400 uppercase tracking-widest italic">Log Transaksi ETL Terkini</h4>
        </div>
        <button class="text-[9px] font-black text-blue-600 uppercase tracking-widest hover:text-red-600 transition-colors">Lihat Semua Log</button>
    </div>
    <div class="space-y-4">
        @foreach([
            ['Membetulkan format RM pada 420 rekod kontrak.', 'Success', '02m ago', 'text-green-600 bg-green-50'],
            ['Menghapuskan 12 rekod duplikasi vendor dari Excel_A.', 'Resolved', '15m ago', 'text-orange-600 bg-orange-50'],
            ['Pemetaan (Mapping) 2,000 baris data perolehan 2025.', 'Processing', 'Just now', 'text-blue-600 bg-blue-50']
        ] as $log)
        <div class="flex items-center justify-between p-4 bg-slate-50/50 rounded-xl border border-transparent hover:border-slate-100 hover:bg-white transition-all">
            <div class="flex items-center gap-4">
                <div class="w-2 h-2 rounded-full {{ $log[1] == 'Processing' ? 'bg-blue-400 animate-pulse' : 'bg-slate-200' }}"></div>
                <p class="text-xs font-bold text-slate-700 italic">"{{ $log[0] }}"</p>
            </div>
            <div class="flex items-center gap-6">
                <span class="text-[9px] font-black uppercase px-4 py-1.5 rounded-lg border border-current {{ $log[3] }} shadow-sm">
                    {{ $log[1] }}
                </span>
                <span class="text-[9px] font-bold text-slate-300 uppercase italic w-16 text-right">{{ $log[2] }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection