@extends('layouts.dashboard')

@section('content')
<style>
    body { background-color: #FAFAFA; }
    .glass-panel { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.3); }
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
</style>

<div class="max-w-5xl mx-auto h-[85vh] flex flex-col">
    <div class="mb-8 flex items-center justify-between px-4">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-[#1E3A8A] rounded-2xl flex items-center justify-center shadow-xl shadow-blue-100 relative overflow-hidden">
                <svg class="w-6 h-6 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-400/20 to-transparent"></div>
            </div>
            <div>
                <h3 class="text-2xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">PNS <span class="text-blue-500">IntelliHub.</span></h3>
                <p class="text-[9px] font-bold text-gray-400 uppercase tracking-[0.3em]">Neural Engine v1.5</p>
            </div>
        </div>
        <div class="flex items-center gap-2 px-4 py-2 bg-green-50 rounded-full border border-green-100">
            <div class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></div>
            <span class="text-[9px] font-black text-green-600 uppercase tracking-widest">AI Online</span>
        </div>
    </div>

    <div class="flex-1 glass-panel rounded-[3.5rem] shadow-2xl shadow-blue-50/50 flex flex-col overflow-hidden relative">
        <div class="flex-1 p-10 overflow-y-auto space-y-10 custom-scrollbar">
            
            <div class="flex gap-5 max-w-[85%] group">
                <div class="w-10 h-10 rounded-xl bg-white border border-gray-100 flex items-center justify-center shadow-sm flex-shrink-0 self-end">
                    <span class="text-[10px] font-black text-[#1E3A8A]">AI</span>
                </div>
                <div class="space-y-2">
                    <div class="bg-white p-7 rounded-[2.5rem] rounded-bl-none shadow-sm border border-gray-50">
                        <p class="text-[13px] font-bold text-gray-700 leading-relaxed italic">
                            "Selamat sejahtera, {{ Auth::user()->name }}. Saya adalah asisten digital PNS. Saya boleh bantu anda semak status pendaftaran aset, baki perolehan tahunan, atau mencari dokumen audit. Apa yang anda ingin tahu hari ini?"
                        </p>
                    </div>
                    <span class="text-[8px] font-black text-gray-300 uppercase tracking-widest ml-2">Just Now — Automated Response</span>
                </div>
            </div>

            <div class="flex flex-row-reverse gap-5 max-w-[85%] ml-auto group">
                <div class="w-10 h-10 rounded-xl bg-[#1E3A8A] flex items-center justify-center shadow-lg shadow-blue-100 flex-shrink-0 self-end">
                    <span class="text-[10px] font-black text-white uppercase">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div class="space-y-2 text-right">
                    <div class="bg-[#1E3A8A] p-7 rounded-[2.5rem] rounded-br-none shadow-xl shadow-blue-100">
                        <p class="text-[13px] font-bold text-white leading-relaxed">
                            Boleh tolong tunjukkan senarai aset yang perlu diselenggara bulan ni?
                        </p>
                    </div>
                    <span class="text-[8px] font-black text-gray-300 uppercase tracking-widest mr-2">Sent — Delivered</span>
                </div>
            </div>

        </div>

        <div class="px-10 py-4 flex gap-3 overflow-x-auto no-scrollbar">
            @foreach(['Semak Baki Perolehan', 'Status Audit HQ', 'Daftar Aset Baru', 'Laporan Kerosakan'] as $chip)
            <button class="flex-shrink-0 px-5 py-2 bg-white border border-gray-100 rounded-full text-[9px] font-black text-gray-400 hover:text-[#1E3A8A] hover:border-blue-200 hover:shadow-sm transition-all uppercase tracking-widest">
                {{ $chip }}
            </button>
            @endforeach
        </div>

        <div class="p-8 bg-white/50 border-t border-gray-100/50 backdrop-blur-md">
            <div class="relative flex items-center">
                <input type="text" placeholder="Tanya sesuatu kepada IntelliHub..." 
                    class="w-full bg-white border-none rounded-[2rem] px-10 py-6 text-sm font-bold shadow-xl shadow-blue-50/50 focus:ring-4 focus:ring-blue-100 transition-all outline-none pr-32">
                
                <div class="absolute right-3 flex gap-2">
                    <button class="p-3 text-gray-300 hover:text-[#1E3A8A] transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.414a4 4 0 00-5.656-5.656l-6.415 6.415a6 6 0 108.486 8.486L20.5 13" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                    <button class="bg-[#1E3A8A] text-white px-8 py-3 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] shadow-lg shadow-blue-200 hover:scale-105 transition-all">
                        Hantar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Simple auto-scroll to bottom
    const container = document.querySelector('.overflow-y-auto');
    container.scrollTop = container.scrollHeight;
</script>
@endsection