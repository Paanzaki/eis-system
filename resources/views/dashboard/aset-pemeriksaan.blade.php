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
                Verifikasi Fizikal
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">FB-EIS-AS-VF &mdash; Pemeriksaan Berkala & Pengesahan Lokasi Aset (KEW.PA)</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Mula Batch Baru
            </button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-6">
            <div class="relative">
                <input type="text" placeholder="IMBAS QR ATAU TAIP NO. SIRI ASET..." class="input-heavy pr-20 uppercase">
                <div class="absolute right-4 top-1/2 -translate-y-1/2">
                    <svg class="w-8 h-8 text-blue-600 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v1m6 11h2m-6 0h-2v4m0-11v-3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" stroke-width="2"/></svg>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-3">
            <select class="input-heavy cursor-pointer uppercase">
                <option value="">-- PILIH PEGAWAI --</option>
                <option>Ahmad Farhan bin Zulkifli (Pegawai Pemeriksa)</option>
                <option>Siti Nurhaliza binti Ahmad (Pegawai Pemeriksa)</option>
            </select>
        </div>
        <div class="col-span-12 lg:col-span-3">
            <select class="input-heavy cursor-pointer uppercase">
                <option value="">-- PILIH SEKSYEN --</option>
                <option>ZON A - BANGUNAN SSAAS</option>
                <option>ZON B - JABATAN KEWANGAN</option>
                <option>ZON C - UNIT TEKNOLOGI</option>
            </select>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[5px] border border-gray-100 shadow-sm">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-50">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Senarai Aset Perlu Verifikasi</h4>
            <span class="text-[10px] font-black text-slate-300 uppercase">Klik status untuk kemas kini</span>
        </div>

        <div class="space-y-6">
            @foreach([
                ['id' => 'PNS/ICT/2026/042', 'name' => 'DELL LATITUDE 5420 - UNIT AUDIT', 'loc' => 'ARAS 2, BLOK A', 'color' => 'blue'],
                ['id' => 'PNS/PJBT/2026/105', 'name' => 'MEJA KERJA EKSEKUTIF - BILIK 4', 'loc' => 'ARAS 4, BLOK B', 'color' => 'slate'],
                ['id' => 'PNS/ICT/2026/089', 'name' => 'IPAD AIR GEN 5 - NAZIRAN', 'loc' => 'ARAS 1, UNIT ICT', 'color' => 'blue']
            ] as $item)
            <div class="asset-card bg-white p-8 rounded-[5px] flex items-center justify-between group">
                <div class="flex items-center gap-8">
                    <div class="w-16 h-16 bg-slate-50 rounded-[5px] flex items-center justify-center text-[#1E3A8A] group-hover:bg-blue-50 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" stroke-width="2"/></svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-black text-slate-300 uppercase tracking-widest">{{ $item['id'] }}</span>
                        <h5 class="text-[13px] font-black text-[#1E3A8A] uppercase leading-tight">{{ $item['name'] }}</h5>
                        <p class="text-[10px] font-bold text-slate-400 uppercase mt-1">Lokasi Terakhir: <span class="text-[#1E3A8A] font-black">{{ $item['loc'] }}</span></p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <button class="px-8 py-4 bg-green-50 text-green-600 rounded-[5px] text-[10px] font-black uppercase tracking-widest border border-green-100 hover:bg-green-600 hover:text-white transition-all shadow-sm">Ada / Baik</button>
                    <button class="px-8 py-4 bg-red-50 text-red-600 rounded-[5px] text-[10px] font-black uppercase tracking-widest border border-red-100 hover:bg-red-600 hover:text-white transition-all shadow-sm">Hilang</button>
                    <button class="px-8 py-4 bg-yellow-50 text-yellow-600 rounded-[5px] text-[10px] font-black uppercase tracking-widest border border-yellow-100 hover:bg-yellow-400 hover:text-white transition-all shadow-sm">Rosak</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> {{-- content-fluid --}}
@endsection
