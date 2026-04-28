@extends('layouts.dashboard')

@section('content')
<style>
    .rounded-sharp { border-radius: 1rem; }
    .status-pill { padding: 0.35rem 1rem; border-radius: 0.75rem; font-size: 9px; font-weight: 900; text-transform: uppercase; letter-spacing: -0.025em; }
    .progress-bar-thin { height: 4px; border-radius: 99px; background: #F1F5F9; overflow: hidden; }
</style>

<div class="space-y-8">
    
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <div class="h-1.5 w-10 bg-red-600 rounded-full"></div>
                <div class="h-1.5 w-5 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">Naziran <span class="text-blue-600">Aset Alih.</span></h3>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mt-2">Audit Pengurusan Harta Modal & Aset Rendah (FS-EIS-MS)</p>
        </div>

        <div class="flex items-center gap-4">
            <div class="relative group">
                <input type="text" placeholder="CARI NO. FAIL AUDIT..." 
                    class="bg-white border-2 border-gray-50 py-3.5 px-6 rounded-xl text-[10px] font-black uppercase tracking-widest focus:ring-4 focus:ring-yellow-400/20 focus:border-yellow-400 outline-none shadow-sm w-64 lg:w-72 transition-all">
                <svg class="w-4 h-4 absolute right-5 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="3"/></svg>
            </div>
            <button class="bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all italic">
                + Buka Fail Naziran
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @php
            $metrics = [
                ['label' => 'Kadar Verifikasi', 'val' => '88.5%', 'sub' => 'Fizikal vs Sistem', 'color' => 'blue'],
                ['label' => 'Aset Tak Ditemui', 'val' => '24', 'sub' => 'Perlu Siasatan', 'color' => 'red'],
                ['label' => 'Pelupusan Selesai', 'val' => '156', 'sub' => 'Q1 - 2026', 'color' => 'green'],
                ['label' => 'Baki Belum Audit', 'val' => '12', 'sub' => 'Jabatan/Agensi', 'color' => 'yellow'],
            ];
        @endphp
        @foreach($metrics as $m)
        <div class="bg-white p-6 rounded-sharp border border-gray-100 shadow-sm">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1 italic">{{ $m['label'] }}</p>
            <h4 class="text-2xl font-black text-[#1E3A8A]">{{ $m['val'] }}</h4>
            <p class="text-[8px] font-bold text-slate-300 uppercase mt-2 tracking-tighter">{{ $m['sub'] }}</p>
        </div>
        @endforeach
    </div>

    <div class="bg-white rounded-sharp border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Entiti Naziran</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Status KEW.PA</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Integriti Fizikal</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Status Audit</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @php
                    $assetAudits = [
                        ['dept' => 'SUK Cawangan Klang', 'kewpa' => 'Lengkap', 'integrity' => 95, 'status' => 'Selesai', 'color' => 'bg-green-100 text-green-700 border-green-200'],
                        ['dept' => 'Pejabat Daerah Sabak Bernam', 'kewpa' => 'Kemas kini', 'integrity' => 82, 'status' => 'Draf', 'color' => 'bg-blue-100 text-blue-700 border-blue-200'],
                        ['dept' => 'Hospital Shah Alam (PNS)', 'kewpa' => 'Tidak Lengkap', 'integrity' => 45, 'status' => 'Teguran', 'color' => 'bg-red-100 text-red-700 border-red-200'],
                        ['dept' => 'Jabatan Perhutanan Selangor', 'kewpa' => 'Lengkap', 'integrity' => 70, 'status' => 'Dalam Proses', 'color' => 'bg-yellow-100 text-yellow-700 border-yellow-200'],
                    ];
                @endphp

                @foreach($assetAudits as $aa)
                <tr class="hover:bg-yellow-50/30 transition-all group">
                    <td class="px-8 py-6">
                        <span class="text-[11px] font-black text-[#1E3A8A] block uppercase">{{ $aa['dept'] }}</span>
                        <span class="text-[8px] font-bold text-slate-300 uppercase italic">ID: ASSET-NZR-{{ rand(100,999) }}</span>
                    </td>
                    <td class="px-8 py-6 text-center">
                        <span class="text-[10px] font-bold {{ $aa['kewpa'] == 'Tidak Lengkap' ? 'text-red-500' : 'text-slate-600' }} uppercase tracking-tighter">
                            {{ $aa['kewpa'] }}
                        </span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex flex-col items-center gap-1">
                            <span class="text-[10px] font-black text-[#1E3A8A]">{{ $aa['integrity'] }}%</span>
                            <div class="w-20 progress-bar-thin">
                                <div class="h-full {{ $aa['integrity'] < 50 ? 'bg-red-500' : 'bg-blue-600' }}" style="width: {{ $aa['integrity'] }}%"></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-6 text-center">
                        <span class="status-pill {{ $aa['color'] }} shadow-sm">
                            {{ $aa['status'] }}
                        </span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex justify-end gap-2">
                            <button class="p-2.5 bg-white border border-gray-100 rounded-lg text-slate-400 hover:text-[#1E3A8A] hover:shadow-md transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M9 17v-2m3 2v-4m3 2v-6m-8 2.25V17.25c0 .414.336.75.75.75h14.5c.414 0 .75-.336.75-.75V6.75c0-.414-.336-.75-.75-.75H13.5l-3-3H3.75c-.414 0-.75.336-.75.75v13.5c0 .414.336.75.75.75H9z"/></svg>
                            </button>
                            <button onclick="alert('Buka Aliran Kerja Siasatan (FS-EIS-MS-PJ)')" class="p-2.5 bg-white border border-gray-100 rounded-lg text-slate-400 hover:text-red-600 hover:shadow-md transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection