@extends('layouts.dashboard')

@section('content')
<div class="mb-10 space-y-1">
    <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">System <span class="text-blue-500">Config.</span></h3>
    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Parameter Global, Integrasi API & Kawalan Kunci Sistem</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 space-y-8">
        <div class="bg-white p-12 rounded-[3.5rem] border border-gray-100 shadow-sm relative overflow-hidden">
            <h4 class="text-[11px] font-black text-[#1E3A8A] uppercase tracking-[0.2em] mb-10 italic italic">MyDigitalID Integration (SSO)</h4>
            <div class="space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Client ID</label>
                        <div class="bg-gray-50 p-4 rounded-xl font-mono text-[10px] text-gray-600 border border-gray-100 italic">PNS-GW-8821-X9</div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest">API Secret Key</label>
                        <div class="bg-gray-50 p-4 rounded-xl font-mono text-[10px] text-gray-600 border border-gray-100 italic">************************</div>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 bg-green-50 rounded-2xl border border-green-100">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <p class="text-[9px] font-black text-green-700 uppercase">Koneksi Berjaya: Gateway Selangor Identity Provider (IDP)</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-12 rounded-[3.5rem] border border-gray-100 shadow-sm">
            <h4 class="text-[11px] font-black text-[#1E3A8A] uppercase tracking-[0.2em] mb-10 italic">Global System Parameters</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest italic">Tahun Kewangan Semasa</label>
                    <select class="w-full bg-gray-50 border-none rounded-xl p-4 text-xs font-bold outline-none ring-1 ring-gray-100">
                        <option>2026</option>
                        <option>2025</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest italic">Had Perolehan Terus (RM)</label>
                    <input type="text" value="500,000.00" class="w-full bg-gray-50 border-none rounded-xl p-4 text-xs font-bold outline-none ring-1 ring-gray-100">
                </div>
            </div>
            <button class="mt-10 px-10 py-5 bg-[#1E3A8A] text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] shadow-xl shadow-blue-100 hover:scale-105 transition-all">Kemaskini Parameter</button>
        </div>
    </div>

    <div class="space-y-8">
        <div class="bg-[#1E3A8A] p-10 rounded-[3rem] text-white flex flex-col justify-center shadow-xl shadow-blue-100 relative overflow-hidden">
            <p class="text-[9px] font-bold opacity-60 uppercase tracking-widest mb-2 italic">Database Engine</p>
            <h4 class="text-2xl font-black">PostgreSQL 16</h4>
            <div class="mt-8 pt-8 border-t border-white/10 space-y-4">
                <div class="flex justify-between text-[8px] font-black uppercase tracking-widest">
                    <span>Uptime</span>
                    <span class="text-blue-300">99.99%</span>
                </div>
                <div class="flex justify-between text-[8px] font-black uppercase tracking-widest">
                    <span>Storage Used</span>
                    <span class="text-blue-300">42.1 GB</span>
                </div>
            </div>
        </div>

        <div class="bg-red-50 p-10 rounded-[3rem] border border-red-100">
            <h4 class="text-[10px] font-black text-red-600 uppercase tracking-widest mb-4 italic">Maintenance Mode</h4>
            <p class="text-[9px] font-bold text-red-400 uppercase leading-relaxed mb-6 italic italic">Bila diaktifkan, hanya Admin yang boleh akses sistem untuk tujuan penyelenggaraan data.</p>
            <button class="w-full py-4 bg-white border border-red-200 text-red-600 rounded-2xl text-[9px] font-black uppercase tracking-widest hover:bg-red-600 hover:text-white transition-all shadow-sm">Aktifkan Sekarang</button>
        </div>
    </div>
</div>
@endsection