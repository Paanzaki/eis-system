@extends('layouts.dashboard')

@section('content')

<div class="flex h-[calc(100vh-180px)] rounded-[2rem] overflow-hidden border border-gray-800 shadow-2xl">
    
    <div class="log-sidebar flex flex-col">
        <div class="p-6 border-b border-gray-800">
            <div class="flex items-center gap-2 mb-4">
                <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M13 3H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V9l-6-6zm0 2l4.5 4.5H13V5zM7 19V5h5v5h5v9H7z"/></svg>
                <h4 class="text-xs font-black text-white uppercase tracking-widest">Log Viewer</h4>
            </div>
            
            <select class="w-full bg-[#1e293b] border border-gray-700 text-[10px] text-gray-300 p-2 rounded-lg outline-none">
                <option>HTTP Access, Nginx & Laravel</option>
            </select>
        </div>

        <div class="flex-1 overflow-y-auto custom-scrollbar p-2 space-y-1">
            @php
                $logs = [
                    ['name' => 'laravel-2026-04-29.log', 'size' => '32.19 KB'],
                    ['name' => 'laravel-2026-04-28.log', 'size' => '39.75 KB'],
                    ['name' => 'laravel-2026-04-27.log', 'size' => '95.43 KB'],
                    ['name' => 'nginx-access.log', 'size' => '1.17 MB'],
                    ['name' => 'nginx-error.log', 'size' => '4.75 KB'],
                    ['name' => 'worker-2026-04-29.log', 'size' => '12.19 KB'],
                ];
            @endphp

            <div class="px-3 py-2 text-[10px] font-black text-gray-500 uppercase tracking-widest italic">Nginx</div>
            <div class="file-item px-4 py-3 rounded-xl cursor-pointer group">
                <div class="flex justify-between items-center">
                    <span class="text-[10px] text-gray-400 group-hover:text-white transition-colors">access.log</span>
                    <span class="text-[9px] text-gray-600 italic">2.4 MB</span>
                </div>
            </div>

            <div class="px-3 py-4 text-[10px] font-black text-gray-500 uppercase tracking-widest italic border-t border-gray-800 mt-2">Laravel</div>
            @foreach($logs as $index => $log)
            <div class="file-item px-4 py-3 rounded-xl cursor-pointer group {{ $index == 0 ? 'active' : '' }}">
                <div class="flex justify-between items-center">
                    <span class="text-[10px] {{ $index == 0 ? 'text-white' : 'text-gray-400' }} group-hover:text-white transition-colors">{{ $log['name'] }}</span>
                    <span class="text-[9px] text-gray-600 italic">{{ $log['size'] }}</span>
                </div>
            </div>
            @endforeach
        </div>

        <div class="p-4 bg-[#0b0f19] border-t border-gray-800 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></div>
                <span class="text-[9px] font-black text-gray-500 uppercase tracking-tighter italic">0 B/min</span>
            </div>
            <span class="text-[10px] font-black text-blue-400 italic">239.28 GB / mo</span>
        </div>
    </div>

    <div class="flex-1 flex flex-col log-content">
        <div class="h-14 border-b border-gray-800 flex items-center justify-between px-8 bg-[#111827]">
            <div class="flex items-center gap-4">
                <span class="text-[10px] font-black text-blue-400 uppercase italic tracking-widest">laravel-2026-04-29.log</span>
                <span class="px-2 py-0.5 bg-blue-500/10 text-blue-400 text-[8px] rounded font-bold">STABLE</span>
            </div>
            <div class="flex items-center gap-4">
                <input type="text" placeholder="Search logs..." class="bg-black/20 border border-gray-700 rounded-lg px-4 py-1.5 text-[10px] text-gray-400 outline-none w-64 focus:border-blue-500">
                <button class="text-gray-500 hover:text-white"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" stroke-width="2"/></svg></button>
            </div>
        </div>

        <div class="flex-1 p-8 overflow-y-auto custom-scrollbar terminal-text">
            <div class="space-y-1">
                <p><span class="log-info">[2026-04-29 08:30:01]</span> local.INFO: Loading system configuration for PNS_SELANGOR...</p>
                <p><span class="log-info">[2026-04-29 08:30:05]</span> local.INFO: MyDigitalID API Handshake successful. Status: 200 OK</p>
                <p><span class="log-warning">[2026-04-29 08:31:12]</span> local.WARNING: Memory usage spikes at 78%. Optimizing cache...</p>
                <p><span class="log-info">[2026-04-29 08:35:44]</span> local.INFO: Background Job [ASET_SYNC] started for 45,201 rows.</p>
                <p><span class="log-error">[2026-04-29 08:40:22]</span> local.ERROR: Connection timeout on legacy_pns_db at 10.2.1.44.</p>
                <p><span class="log-error">[2026-04-29 08:40:23]</span> local.ERROR: Retrying connection in 5s... (Attempt 1/3)</p>
                <p><span class="log-info">[2026-04-29 08:42:01]</span> local.INFO: Data integrity check passed for Q2 Perolehan.</p>
                <p><span class="log-info">[2026-04-29 08:45:10]</span> local.INFO: Chatbot FAI Engine re-initialized.</p>
                <p class="animate-pulse opacity-50">_</p>
            </div>
        </div>
    </div>
</div>

<div class="mt-6 flex items-center gap-4 p-4 bg-slate-900 rounded-2xl border border-gray-800">
    <div class="p-2 bg-blue-500/10 rounded-lg">
        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"/></svg>
    </div>
    <p class="text-[10px] font-bold text-gray-400 italic leading-relaxed uppercase tracking-widest">
        SOP Peringatan: Log Viewer ini merekodkan setiap transaksi sistem secara masa nyata (real-time). Maklumat sensitif telah di-mask mengikut standard PDPA.
    </p>
</div>
@endsection
