@extends('layouts.dashboard')

@section('content')
<div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-1">
        <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic italic">Analytics <span class="text-blue-500">& ETL.</span></h3>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Kawalan Migrasi Data & Pembersihan Integrasi PNS</p>
    </div>
    <div class="flex gap-2">
        <button onclick="alert('Starting ETL Cleanup Process...')" class="bg-[#1E3A8A] text-white px-6 py-3 rounded-xl text-[9px] font-black uppercase tracking-widest shadow-lg shadow-blue-100 transition-all hover:scale-105">Run Data Cleansing</button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex items-center gap-6">
        <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 shadow-inner">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"/></svg>
        </div>
        <div>
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Integriti Data</p>
            <h4 class="text-2xl font-black text-[#1E3A8A]">99.8% <span class="text-[9px] text-green-500 italic">HEALTHY</span></h4>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex items-center gap-6">
        <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 shadow-inner">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" stroke-width="2"/></svg>
        </div>
        <div>
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Rekod Dimigrasi</p>
            <h4 class="text-2xl font-black text-[#1E3A8A]">45,201 <span class="text-[9px] text-blue-400 italic">ROWS</span></h4>
        </div>
    </div>

    <div class="bg-orange-50 p-8 rounded-[2.5rem] border border-orange-100 flex items-center gap-6">
        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-orange-500 shadow-sm">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" stroke-width="2"/></svg>
        </div>
        <div>
            <p class="text-[10px] font-black text-orange-400 uppercase tracking-widest">Duplikasi Dikesan</p>
            <h4 class="text-2xl font-black text-orange-600">12 <span class="text-[9px] text-orange-400 italic italic tracking-tight italic">RESOLVED</span></h4>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm relative overflow-hidden">
        <div class="flex items-center justify-between mb-10">
            <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] italic">ETL Pipeline Status</h4>
            <div class="w-2 h-2 bg-green-500 rounded-full animate-ping"></div>
        </div>
        <div class="space-y-10">
            @foreach([
                ['Extraction', 'PNS_Legacy_DB', '100%', 'bg-green-500'],
                ['Transformation', 'Data Mapping & Cleaning', '85%', 'bg-blue-500'],
                ['Loading', 'Cloud Production Server', '40%', 'bg-blue-400']
            ] as $step)
            <div class="space-y-3">
                <div class="flex justify-between text-[10px] font-black uppercase tracking-widest">
                    <span class="text-gray-800">{{ $step[0] }} <span class="text-gray-300 mx-2">|</span> <span class="text-[9px] text-gray-400 italic font-bold uppercase">{{ $step[1] }}</span></span>
                    <span class="text-[#1E3A8A]">{{ $step[2] }}</span>
                </div>
                <div class="h-2.5 bg-gray-50 rounded-full overflow-hidden flex">
                    <div class="h-full {{ $step[3] }} transition-all duration-1000" style="width: {{ $step[2] }}"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="bg-[#1E3A8A] p-10 rounded-[3rem] shadow-xl shadow-blue-100 text-white relative overflow-hidden">
        <div class="relative z-10 h-full flex flex-col justify-between">
            <div>
                <h4 class="text-[11px] font-bold opacity-60 uppercase tracking-[0.2em] mb-4">Laporan Pembersihan Data</h4>
                <p class="text-xl font-black italic leading-tight">"Sistem berjaya mengesan 1,202 ralat format tarikh dalam fail Excel dan telah ditukarkan secara automatik kepada format ISO (YYYY-MM-DD)."</p>
            </div>
            
            <div class="mt-10 pt-10 border-t border-white/10 grid grid-cols-2 gap-4">
                <div>
                    <p class="text-[8px] font-bold opacity-50 uppercase tracking-widest mb-1">Last Sync</p>
                    <p class="text-[10px] font-black uppercase tracking-widest">28 APR 2026, 08:30</p>
                </div>
                <div class="text-right">
                    <p class="text-[8px] font-bold opacity-50 uppercase tracking-widest mb-1">Status Enjin</p>
                    <p class="text-[10px] font-black uppercase tracking-widest text-blue-300 italic">Optimal</p>
                </div>
            </div>
        </div>
        <svg class="absolute right-[-20px] top-[-20px] w-48 h-48 text-white/5 rotate-12" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/></svg>
    </div>
</div>

<div class="mt-8 bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden">
    <div class="flex items-center gap-3 mb-8">
        <div class="w-1.5 h-1.5 bg-blue-500 rounded-full"></div>
        <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-widest">Log Transaksi ETL Terkini</h4>
    </div>
    <div class="space-y-6">
        @foreach([
            ['Membetulkan format RM pada 420 rekod kontrak.', 'Success', '02m ago'],
            ['Menghapuskan 12 rekod duplikasi vendor dari Excel_A.', 'Resolved', '15m ago'],
            ['Pemetaan (Mapping) 2,000 baris data perolehan 2025.', 'Processing', 'Just now']
        ] as $log)
        <div class="flex items-center justify-between border-b border-gray-50 pb-4 last:border-0">
            <p class="text-xs font-bold text-gray-700 italic">"{{ $log[0] }}"</p>
            <div class="flex items-center gap-4">
                <span class="text-[9px] font-black uppercase px-3 py-1 rounded-lg {{ $log[1] == 'Success' ? 'bg-green-50 text-green-600' : ($log[1] == 'Resolved' ? 'bg-orange-50 text-orange-600' : 'bg-blue-50 text-blue-600') }}">
                    {{ $log[1] }}
                </span>
                <span class="text-[9px] font-bold text-gray-300 uppercase italic">{{ $log[2] }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection