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
                Carian <span class="text-red-600">Rekod.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">FB-EIS-AS-CR &mdash; Pangkalan Data Berpusat PNS Selangor</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="flex-1 relative">
                <input type="text" placeholder="Masukkan No. Siri, Tajuk, atau ID..." 
                    class="w-full bg-gray-50 border border-gray-200 py-3 px-5 rounded-lg text-xs font-bold outline-none focus:border-[#1E3A8A] focus:bg-white transition-all shadow-inner">
            </div>
            <select class="bg-gray-50 border border-gray-200 py-3 px-5 rounded-lg text-[10px] font-black uppercase outline-none cursor-pointer">
                <option>Semua Kategori</option>
                <option>Harta Modal</option>
                <option>Aset Rendah</option>
            </select>
            <button class="bg-[#1E3A8A] text-white px-8 py-3 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-red-700 transition-all shadow-lg shadow-blue-900/10">
                Cari Data
            </button>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="table-list">
            <thead>
                <tr>
                    <th class="text-left w-1/4">No. Rujukan / ID</th>
                    <th class="text-left">Perihalan Rekod</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Status</th>
                    <th class="text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $results = [
                        ['id' => 'PNS/ICT/2026/001', 'title' => 'MacBook Pro M3 Max - Unit BTM', 'cat' => 'Harta Modal', 'status' => 'Aktif', 'color' => 'text-green-600 bg-green-50'],
                        ['id' => 'TDR/SEL/2026/012', 'title' => 'Tender Bekalan Perabot Sepang', 'cat' => 'Sebut Harga', 'status' => 'Proses', 'color' => 'text-blue-600 bg-blue-50'],
                        ['id' => 'PNS/KND/2026/089', 'title' => 'Proton X70 (BQC 1234) - Kewangan', 'cat' => 'Aset Alih', 'status' => 'Servis', 'color' => 'text-yellow-600 bg-yellow-50'],
                        ['id' => 'PNS/PJBT/2026/115', 'title' => 'Kerusi Ergonomik Steelcase', 'cat' => 'Aset Rendah', 'status' => 'Aktif', 'color' => 'text-green-600 bg-green-50'],
                    ];
                @endphp

                @foreach($results as $res)
                <tr class="group">
                    <td>
                        <span class="text-[10px] font-black text-[#1E3A8A] block tracking-tighter">{{ $res['id'] }}</span>
                        <span class="text-[8px] font-bold text-slate-300 uppercase italic">Daftar: 24/04/2026</span>
                    </td>
                    <td>
                        <span class="text-[11px] font-bold text-slate-700 uppercase">{{ $res['title'] }}</span>
                    </td>
                    <td class="text-center">
                        <span class="text-[9px] font-black text-slate-400 uppercase italic tracking-tighter">{{ $res['cat'] }}</span>
                    </td>
                    <td class="text-center">
                        <span class="status-badge {{ $res['color'] }}">
                            {{ $res['status'] }}
                        </span>
                    </td>
                    <td class="text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button class="p-2 bg-white border border-gray-100 text-slate-400 hover:bg-[#1E3A8A] hover:text-white rounded-lg transition-all shadow-sm">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                            <button class="p-2 bg-white border border-gray-100 text-slate-400 hover:bg-yellow-400 hover:text-white rounded-lg transition-all shadow-sm">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-between items-center px-2">
        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Menunjukkan 4 daripada 120 Rekod</p>
        <div class="flex gap-1">
            <button class="w-8 h-8 flex items-center justify-center bg-[#1E3A8A] text-white rounded text-[10px] font-black">1</button>
            <button class="w-8 h-8 flex items-center justify-center bg-white border border-gray-100 rounded text-[10px] font-black text-slate-400 hover:bg-gray-50 transition-all">2</button>
            <button class="w-8 h-8 flex items-center justify-center bg-white border border-gray-100 rounded text-[10px] font-black text-slate-400 hover:bg-gray-50 transition-all">></button>
        </div>
    </div>
</div>
@endsection
