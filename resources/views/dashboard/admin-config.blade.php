@extends('layouts.dashboard')

@section('content')
<style>
    body { background-color: #F8FAFC; }
    .rounded-sharp { border-radius: 1.25rem; }
    .config-card { transition: all 0.3s ease; border: 1px solid #f1f5f9; }
    .config-card:hover { border-color: #BFDBFE; box-shadow: 0 10px 15px -3px rgba(30, 58, 138, 0.05); }
    .input-flat { background: #F9FAFB; border: 1px solid #F1F5F9; border-radius: 0.75rem; padding: 0.75rem 1rem; font-size: 11px; font-weight: 700; width: 100%; outline: none; transition: all 0.2s; }
    .input-flat:focus { background: white; border-color: #FACC15; ring: 4px; ring-color: rgba(250, 204, 21, 0.1); }
</style>

<div class="space-y-8">
    
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-8">
        <div class="space-y-1">
            <div class="flex items-center gap-2 mb-2">
                <div class="h-1.5 w-10 bg-red-600 rounded-full"></div>
                <div class="h-1.5 w-5 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic leading-none">
                Konfigurasi <span class="text-blue-600">Sistem<span class="text-yellow-400">.</span></span>
            </h3>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mt-3 italic">Global Parameters & API Integration (FS-EIS-MA-CF)</p>
        </div>

        <div class="flex items-center gap-3">
            <button class="px-6 py-3 bg-white border border-gray-200 rounded-xl text-[10px] font-black text-slate-400 uppercase tracking-widest hover:bg-gray-50 transition-all">
                Reset Default
            </button>
            <button class="px-6 py-3 bg-[#1E3A8A] text-white rounded-xl text-[10px] font-black uppercase tracking-widest shadow-xl shadow-blue-900/20 hover:bg-red-700 transition-all">
                Simpan Semua
            </button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-8">
        
        <div class="col-span-12 lg:col-span-7 space-y-6">
            <div class="bg-white p-8 rounded-[2rem] shadow-sm config-card">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-width="2"/></svg>
                    </div>
                    <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest italic">Integrasi MyDigitalID (SSO)</h4>
                </div>

                <div class="space-y-6">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[9px] font-black text-slate-400 uppercase ml-1 tracking-widest">Client ID</label>
                            <input type="text" value="PNS-SEL-PROD-9921" class="input-flat" readonly>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[9px] font-black text-slate-400 uppercase ml-1 tracking-widest">Environment</label>
                            <select class="input-flat">
                                <option>Production Mode</option>
                                <option>Sandbox / Staging</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[9px] font-black text-slate-400 uppercase ml-1 tracking-widest">API Endpoint URL</label>
                        <input type="text" value="https://api.mydigitalid.gov.my/v1/auth/pns-selangor" class="input-flat">
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2rem] shadow-sm config-card">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-red-50 text-red-600 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" stroke-width="2"/></svg>
                    </div>
                    <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest italic">Sistem Notifikasi (SMTP)</h4>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[9px] font-black text-slate-400 uppercase ml-1 tracking-widest">Mail Host</label>
                        <input type="text" placeholder="smtp.selangor.gov.my" class="input-flat">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[9px] font-black text-slate-400 uppercase ml-1 tracking-widest">Port</label>
                        <input type="text" value="587" class="input-flat">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-5 space-y-6">
            <div class="bg-[#1E3A8A] p-8 rounded-[2rem] text-white shadow-xl shadow-blue-900/20 relative overflow-hidden group">
                <div class="absolute -right-4 -bottom-4 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
                <h4 class="text-[11px] font-black opacity-60 uppercase tracking-widest mb-8 italic">Parameter Ambang (Threshold)</h4>
                
                <div class="space-y-8">
                    <div class="space-y-4">
                        <div class="flex justify-between items-end">
                            <span class="text-[10px] font-black uppercase tracking-tighter">Had Nilai Perolehan Terus</span>
                            <span class="text-xl font-black italic text-yellow-400">RM 50,000</span>
                        </div>
                        <input type="range" class="w-full h-1.5 bg-white/10 rounded-lg appearance-none cursor-pointer accent-yellow-400">
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-end">
                            <span class="text-[10px] font-black uppercase tracking-tighter">Amaran Penyenggaraan (Hari)</span>
                            <span class="text-xl font-black italic text-yellow-400">14 Hari</span>
                        </div>
                        <input type="range" value="14" min="1" max="60" class="w-full h-1.5 bg-white/10 rounded-lg appearance-none cursor-pointer accent-yellow-400">
                    </div>
                </div>
                
                <div class="mt-10 p-4 bg-white/5 rounded-xl border border-white/10 text-[9px] font-bold text-blue-200 leading-relaxed italic">
                    "Parameter ini mengawal logik FAI Chatbot dalam memberikan amaran awal kepada eksekutif."
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100">
                <h4 class="text-[11px] font-black text-[#1E3A8A] uppercase tracking-widest mb-6 italic">Mod Penyelenggaraan Sistem</h4>
                <div class="flex items-center justify-between p-4 bg-red-50 rounded-2xl border border-red-100">
                    <div>
                        <p class="text-[10px] font-black text-red-600 uppercase tracking-tighter">Maintenance Mode</p>
                        <p class="text-[8px] font-bold text-red-400 uppercase mt-1">Nyahaktifkan akses awam</p>
                    </div>
                    <div class="w-12 h-6 bg-red-200 rounded-full relative p-1 cursor-pointer">
                        <div class="w-4 h-4 bg-white rounded-full shadow-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection