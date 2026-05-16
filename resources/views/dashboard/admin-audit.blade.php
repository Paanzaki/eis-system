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
                Audit Forensics
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">FB-EIS-MA-AL &mdash; Security Logs & Transaction Trail Monitor</p>
        </div>
        <div class="flex items-center gap-3 px-5 py-2.5 bg-white border border-gray-100 rounded-[5px] shadow-sm">
            <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
            <span class="text-[9px] font-black text-slate-600 uppercase tracking-widest">Security System Live</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach([
            ['label' => 'Jumlah Percubaan Login', 'val' => '1,402 Kes', 'sub' => '24 Jam Terakhir'],
            ['label' => 'Aktiviti Mencurigakan',  'val' => '02 Kes',    'sub' => 'Perlu Semakan'],
            ['label' => 'Saiz Fail Log',          'val' => '239.28 GB', 'sub' => 'Digunakan / Bulan'],
        ] as $stat)
        <div class="card-stat-pns bg-white p-6 rounded-[5px] border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $stat['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $stat['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $stat['sub'] }}</p>
        </div>
        @endforeach
    </div>

    <div class="log-terminal-card p-12 text-white shadow-2xl shadow-blue-900/30 group">
        <div class="glow-pulse"></div>
        
        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="w-12 h-12 bg-white/10 rounded-[5px] flex items-center justify-center border border-white/10">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                </div>
                <h4 class="text-3xl font-black italic tracking-tighter uppercase">
                    Akses Portal <span class="text-blue-400">Log Viewer.</span>
                </h4>
                <p class="text-sm font-bold text-slate-400 leading-relaxed italic">
                    Sila gunakan butang di bawah untuk mengakses paparan log viewer. Paparan ini termasuk **HTTP Access**, **Nginx Errors**, dan **Laravel Logs** untuk tujuan pemantauan teknikal menyeluruh.
                </p>
                <div class="pt-4">
                    <a href="{{ route('admin.log_viewer') }}" 
                       class="inline-flex items-center gap-4 bg-blue-600 hover:bg-red-700 text-white px-10 py-5 rounded-[5px] text-[11px] font-black uppercase tracking-[0.2em] shadow-xl shadow-blue-600/30 transition-all hover:scale-105 active:scale-95 group">
                        Buka Log Viewer
                        <svg class="w-4 h-4 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-width="3"/></svg>
                    </a>
                </div>
            </div>

            <div class="hidden lg:block bg-black/40 rounded-[5px] p-6 border border-white/5 shadow-inner backdrop-blur-sm">
                <div class="flex gap-2 mb-4">
                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                    <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                </div>
                <div class="space-y-3 font-mono text-[10px] text-blue-300 opacity-60">
                    <p>[2026-04-29 08:30:12] local.INFO: User 1202 Login Success...</p>
                    <p>[2026-04-29 08:32:45] local.ERROR: SQL Integrity Violation...</p>
                    <p>[2026-04-29 08:35:01] local.WARNING: SMTP Connection Timeout...</p>
                    <p class="animate-pulse">_</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center gap-4 p-6 bg-blue-50/50 rounded-[5px] border border-blue-100">
        <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"/></svg>
        <p class="text-[10px] font-bold text-slate-500 italic">
            Nota: Akses kepada Log Viewer terhad kepada peranan **Super Admin** sahaja. Semua aktiviti pembacaan log juga akan direkodkan.
        </p>
    </div>
</div>
@endsection
