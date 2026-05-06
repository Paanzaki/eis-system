@extends('layouts.dashboard')

@section('content')

<div class="max-w-6xl mx-auto space-y-6">
    
    <div class="mb-8 flex flex-col lg:flex-row lg:items-end justify-between gap-6 border-b border-gray-100 pb-8">
        <div class="space-y-1">
            <div class="flex items-center gap-2 mb-3">
                <div class="h-1.5 w-10 bg-red-600 rounded-full"></div>
                <div class="h-1.5 w-5 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase  leading-none">
                FAI <span class="text-blue-600">Chatbot<span class="text-yellow-400">.</span></span>
            </h3>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3 flex items-center gap-2">
                Automasi Pintar & Analitik Perbendaharaan
            </p>
        </div>
        
        <div class="flex items-center gap-3 px-5 py-2.5 bg-white border border-gray-100 rounded-2xl shadow-sm">
            <div class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
            </div>
            <span class="text-[9px] font-black text-slate-600 uppercase tracking-widest ">FAI Engine Active</span>
        </div>
    </div>

    <div class="bg-white rounded-[2rem] shadow-2xl shadow-slate-200/60 flex flex-col border border-gray-100 overflow-hidden">
        
        <div class="chat-container p-10 overflow-y-auto space-y-10 custom-scrollbar">
            
            <div class="flex items-end gap-4">
                <div class="avatar-frame">
                    <img src="{{ asset('images/bot-avatar.png') }}" alt="FAI" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col gap-1.5">
                    <span class="text-[8px] font-black text-[#1E3A8A] uppercase tracking-[0.2em] ml-1">FAI Chatbot</span>
                    <div class="bubble bot-style">
                        Selamat sejahtera, Farhan. Saya adalah **FAI**, asisten analitik anda. <br><br>
                        Data perolehan dan aset bagi suku kedua (Q2) 2026 telah dikemaskini. Apa yang anda ingin saya analisiskan?
                    </div>
                </div>
            </div>

            <div class="flex items-end flex-row-reverse gap-4">
                <div class="avatar-frame bg-yellow-400 flex items-center justify-center border-2 border-white">
                    <span class="text-[11px] font-black text-[#1E3A8A] uppercase">{{ substr(Auth::user()->name, 0, 2) }}</span>
                </div>
                <div class="flex flex-col gap-1.5 items-end">
                    <span class="text-[8px] font-black text-slate-400 uppercase tracking-[0.2em] mr-1 ">Eksekutif PNS</span>
                    <div class="bubble user-style ">
                        Berapakah jumlah aset ICT yang telah didaftarkan untuk suku kedua tahun 2026 mengikut Jata Selangor?
                    </div>
                </div>
            </div>

            <div class="flex items-end gap-4">
                <div class="avatar-frame grayscale opacity-40 border border-dashed border-gray-300">
                    <img src="{{ asset('images/bot-avatar.png') }}" alt="FAI" class="w-full h-full object-cover">
                </div>
                <div class="bubble bot-style bg-white/50 border-dashed border-gray-200 py-4 px-6">
                    <div class="flex gap-1.5 items-center">
                        <span class="w-1.5 h-1.5 bg-blue-600 rounded-full typing-dot"></span>
                        <span class="w-1.5 h-1.5 bg-blue-600 rounded-full typing-dot"></span>
                        <span class="w-1.5 h-1.5 bg-blue-600 rounded-full typing-dot"></span>
                        <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest ml-2 ">FAI sedang memproses...</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-8 bg-white border-t border-gray-100/50">
            <div class="flex items-center gap-5 max-w-5xl mx-auto">
                <div class="relative flex-1 group">
                    <input type="text" placeholder="Tanya FAI tentang data, aset atau naziran..." 
                        class="w-full bg-slate-50 border border-slate-100 py-5 px-8 rounded-2xl text-xs font-bold outline-none focus:ring-4 focus:ring-blue-50 focus:border-blue-200 focus:bg-white transition-all shadow-inner">
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 flex items-center gap-3">
                        <button class="text-slate-300 hover:text-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-20a3 3 0 013 3v10a3 3 0 01-6 0V5a3 3 0 013-3z" stroke-width="2.2"/></svg>
                        </button>
                    </div>
                </div>
                <button class="bg-[#1E3A8A] hover:bg-red-600 text-white w-16 h-16 rounded-2xl flex items-center justify-center shadow-xl shadow-blue-900/20 transition-all hover:scale-105 active:scale-95 group">
                    <svg class="w-6 h-6 transform group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M2 21l21-9L2 3v7l15 2-15 2v7z" stroke-width="2.5"/></svg>
                </button>
            </div>
            
            <div class="mt-5 flex flex-wrap gap-2 max-w-5xl mx-auto">
                @foreach(['Baki Bajet Perolehan', 'Status Aset ICT Sabak', 'Panduan KEW.PA'] as $tag)
                <button class="px-4 py-2 bg-gray-50 hover:bg-yellow-50 border border-gray-100 rounded-xl text-[9px] font-black uppercase text-slate-400 hover:text-yellow-600 transition-all ">
                    # {{ $tag }}
                </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
