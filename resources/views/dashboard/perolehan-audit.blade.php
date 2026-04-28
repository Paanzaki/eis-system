@extends('layouts.dashboard')

@section('content')
<style>
    body { background-color: #F8FAFC; }
    .rounded-sharp { border-radius: 1.5rem; }
    .log-terminal-card { 
        background: #111827; /* Dark theme macam dalam screenshot */
        border-radius: 2rem;
        position: relative;
        overflow: hidden;
    }
    .glow-pulse {
        position: absolute;
        top: 0; right: 0;
        width: 150px; h-150px;
        background: rgba(59, 130, 246, 0.2);
        filter: blur(50px);
        animation: pulse-slow 4s infinite;
    }
    @keyframes pulse-slow { 0%, 100% { opacity: 0.3; } 50% { opacity: 0.7; } }
</style>

<div class="space-y-10">
    
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 border-b border-gray-100 pb-8">
        <div class="space-y-1">
            <div class="flex items-center gap-2 mb-3">
                <div class="h-1.5 w-12 bg-red-600 rounded-full"></div>
                <div class="h-1.5 w-6 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase italic leading-none">
                Audit <span class="text-red-600">Forensics<span class="text-yellow-400">.</span></span>
            </h3>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3 italic">Security Logs & Transaction Trail Monitor</p>
        </div>
        
        <div class="flex items-center gap-3 px-5 py-2.5 bg-white border border-gray-100 rounded-2xl shadow-sm">
            <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
            <span class="text-[9px] font-black text-slate-600 uppercase tracking-widest">Security System Live</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach([
            ['label' => 'Jumlah Percubaan Login', 'val' => '1,402', 'sub' => '24 Jam Terakhir', 'color' => 'blue'],
            ['label' => 'Aktiviti Mencurigakan', 'val' => '02', 'sub' => 'Perlu Semakan', 'color' => 'red'],
            ['label' => 'Saiz Fail Log', 'val' => '239.28', 'sub' => 'GB / Bulan', 'color' => 'yellow'],
        ] as $stat)
        <div class="bg-white p-8 rounded-sharp border border-gray-100 shadow-sm group hover:shadow-xl hover:-translate-y-1 transition-all">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2 italic">{{ $stat['label'] }}</p>
            <h4 class="text-3xl font-black text-[#1E3A8A] tracking-tighter italic">
                {{ $stat['val'] }} <span class="text-[10px] text-slate-300 font-bold uppercase">{{ $stat['color'] == 'yellow' ? 'GB' : 'Kes' }}</span>
            </h4>
            <p class="text-[8px] font-bold text-slate-300 uppercase mt-2 italic">{{ $stat['sub'] }}</p>
        </div>
        @endforeach
    </div>

    <div class="log-terminal-card p-12 text-white shadow-2xl shadow-blue-900/30 group">
        <div class="glow-pulse"></div>
        
        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center border border-white/10">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                </div>
                <h4 class="text-3xl font-black italic tracking-tighter uppercase">
                    Akses Portal <span class="text-blue-400">Log Viewer.</span>
                </h4>
                <p class="text-sm font-bold text-slate-400 leading-relaxed italic">
                    Sila gunakan butang di bawah untuk mengakses paparan log mengikut SOP Fixed Layout. Paparan ini termasuk **HTTP Access**, **Nginx Errors**, dan **Laravel Logs** untuk tujuan pemantauan teknikal menyeluruh.
                </p>
                <div class="pt-4">
                    <a href="{{ route('admin.log_viewer') }}" 
                       class="inline-flex items-center gap-4 bg-blue-600 hover:bg-red-700 text-white px-10 py-5 rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] shadow-xl shadow-blue-600/30 transition-all hover:scale-105 active:scale-95 group">
                        Buka Log Viewer (SOP)
                        <svg class="w-4 h-4 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-width="3"/></svg>
                    </a>
                </div>
            </div>

            <div class="hidden lg:block bg-black/40 rounded-3xl p-6 border border-white/5 shadow-inner backdrop-blur-sm">
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

    <div class="flex items-center gap-4 p-6 bg-blue-50/50 rounded-2xl border border-blue-100">
        <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"/></svg>
        <p class="text-[10px] font-bold text-slate-500 italic">
            Nota: Akses kepada Log Viewer terhad kepada peranan **Super Admin** sahaja. Semua aktiviti pembacaan log juga akan direkodkan.
        </p>
    </div>
</div>
@endsection