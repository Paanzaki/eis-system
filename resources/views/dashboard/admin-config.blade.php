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
                Konfigurasi Sistem
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-MA-CF &mdash; Tetapan Global, Integrasi API & Parameter Sistem
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.config', ['status' => 'reset']) }}" class="px-6 py-3 bg-white border border-gray-200 rounded-[5px] text-[10px] font-black text-slate-400 uppercase tracking-widest hover:bg-gray-50 transition-all">
                Reset Default
            </a>
            <a href="{{ route('admin.config', ['status' => 'simpan']) }}" class="px-6 py-3 bg-[#1E3A8A] text-white rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-xl hover:bg-red-700 transition-all">
                Simpan Semua
            </a>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-7 space-y-6">

            {{-- MyDigitalID SSO --}}
            <div class="bg-white p-8 rounded-[5px] border border-gray-100 shadow-sm">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-[5px] flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-width="2"/></svg>
                    </div>
                    <div>
                        <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Integrasi MyDigitalID (SSO)</h4>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Single Sign-On via Kerajaan Malaysia</p>
                    </div>
                </div>
                <div class="space-y-5">
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="label-heavy">Client ID</label>
                            <input type="text" value="PNS-SEL-PROD-9921" class="input-heavy rounded-[5px]" readonly>
                        </div>
                        <div>
                            <label class="label-heavy">Environment</label>
                            <select class="input-heavy rounded-[5px]">
                                <option>Production Mode</option>
                                <option>Sandbox / Staging</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="label-heavy">API Endpoint URL</label>
                        <input type="text" value="https://api.mydigitalid.gov.my/v1/auth/pns-selangor" class="input-heavy rounded-[5px]">
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-emerald-50 rounded-[5px] border border-emerald-100">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                        <p class="text-[10px] font-black text-emerald-700 uppercase tracking-widest">Status: Sambungan Aktif &bull; 200 OK</p>
                    </div>
                </div>
            </div>

            {{-- SMTP Notification --}}
            <div class="bg-white p-8 rounded-[5px] border border-gray-100 shadow-sm">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-red-50 text-red-600 rounded-[5px] flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" stroke-width="2"/></svg>
                    </div>
                    <div>
                        <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Sistem Notifikasi (SMTP)</h4>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Emel automatik untuk amaran & laporan</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="label-heavy">Mail Host</label>
                        <input type="text" value="smtp.selangor.gov.my" class="input-heavy rounded-[5px]">
                    </div>
                    <div>
                        <label class="label-heavy">Port</label>
                        <input type="text" value="587" class="input-heavy rounded-[5px]">
                    </div>
                    <div>
                        <label class="label-heavy">Username</label>
                        <input type="text" value="eis-noreply@pns.gov.my" class="input-heavy rounded-[5px]">
                    </div>
                    <div>
                        <label class="label-heavy">Enkripsi</label>
                        <select class="input-heavy rounded-[5px]">
                            <option>TLS</option>
                            <option>SSL</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Audit Log Retention --}}
            <div class="bg-white p-8 rounded-[5px] border border-gray-100 shadow-sm">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-amber-50 text-amber-600 rounded-[5px] flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                    </div>
                    <div>
                        <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Pengurusan Audit Log</h4>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Tempoh penyimpanan log & dasar arkib</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="label-heavy">Tempoh Simpanan Log (Hari)</label>
                        <input type="number" value="365" class="input-heavy rounded-[5px]">
                    </div>
                    <div>
                        <label class="label-heavy">Auto-Arkib Selepas</label>
                        <select class="input-heavy rounded-[5px]">
                            <option>90 Hari</option>
                            <option>180 Hari</option>
                            <option>365 Hari</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-5 space-y-6">

            {{-- Threshold Parameters --}}
            <div class="bg-[#1E3A8A] p-8 rounded-[5px] text-white shadow-xl relative overflow-hidden">
                <div class="absolute -right-8 -bottom-8 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                <h4 class="text-[11px] font-black opacity-60 uppercase tracking-widest mb-6">Parameter Ambang (Threshold)</h4>
                <div class="space-y-8 relative">
                    @foreach([
                        ['label'=>'Had Nilai Perolehan Terus','val'=>'RM 50,000','min'=>0,'max'=>200,'cur'=>50],
                        ['label'=>'Amaran Penyenggaraan (Hari)','val'=>'14 Hari','min'=>1,'max'=>60,'cur'=>14],
                        ['label'=>'Had Skor Pematuhan Minimum (%)','val'=>'75%','min'=>50,'max'=>100,'cur'=>75],
                    ] as $param)
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[10px] font-black text-white/80 uppercase tracking-tight">{{ $param['label'] }}</span>
                            <span class="text-[14px] font-black text-yellow-400">{{ $param['val'] }}</span>
                        </div>
                        <input type="range" value="{{ $param['cur'] }}" min="{{ $param['min'] }}" max="{{ $param['max'] }}"
                            class="w-full h-1.5 bg-white/10 rounded-[5px] appearance-none cursor-pointer accent-yellow-400">
                    </div>
                    @endforeach
                </div>
                <div class="mt-8 p-4 bg-white/5 rounded-[5px] border border-white/10 text-[10px] font-bold text-blue-200 leading-relaxed">
                    Parameter ini mengawal logik FAI Chatbot dalam memberikan amaran awal kepada eksekutif.
                </div>
            </div>

            {{-- Maintenance Mode --}}
            <div class="bg-white p-8 rounded-[5px] border border-gray-100 shadow-sm" x-data="{ maintenance: false }">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest mb-6">Mod Penyelenggaraan Sistem</h4>
                <div class="flex items-center justify-between p-5 rounded-[5px] border transition-all"
                    :class="maintenance ? 'bg-red-50 border-red-200' : 'bg-gray-50 border-gray-100'">
                    <div>
                        <p class="text-[11px] font-black uppercase tracking-tighter"
                            :class="maintenance ? 'text-red-600' : 'text-slate-600'">
                            Maintenance Mode
                        </p>
                        <p class="text-[9px] font-bold uppercase mt-1"
                            :class="maintenance ? 'text-red-400' : 'text-slate-400'">
                            <span x-text="maintenance ? 'Akses awam telah dinyahaktifkan' : 'Sistem dalam operasi normal'"></span>
                        </p>
                    </div>
                    <button @click="maintenance = !maintenance"
                        class="w-12 h-6 rounded-full relative p-1 transition-all duration-300"
                        :class="maintenance ? 'bg-red-500' : 'bg-gray-200'">
                        <div class="w-4 h-4 bg-white rounded-full shadow-sm transition-transform duration-300"
                            :class="maintenance ? 'translate-x-6' : 'translate-x-0'"></div>
                    </button>
                </div>
            </div>

            {{-- Version Info --}}
            <div class="bg-white p-8 rounded-[5px] border border-gray-100 shadow-sm">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest mb-5">Maklumat Versi Sistem</h4>
                <div class="space-y-3">
                    @foreach([
                        ['label'=>'Versi EIS','val'=>'v2.3.1 (Stable)'],
                        ['label'=>'Laravel Framework','val'=>'v11.x'],
                        ['label'=>'Kemaskini Terakhir','val'=>'06/05/2026'],
                        ['label'=>'Persekitaran','val'=>'Production'],
                    ] as $info)
                    <div class="flex justify-between items-center py-2 border-b border-gray-50 last:border-0">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $info['label'] }}</span>
                        <span class="text-[11px] font-black text-[#1E3A8A]">{{ $info['val'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
