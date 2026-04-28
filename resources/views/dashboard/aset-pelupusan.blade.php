@extends('layouts.dashboard')

@section('content')
<style>
    body { background-color: #F8FAFC; }
    .content-fluid { width: 100%; padding: 0 1rem; }
    .rounded-sharp { border-radius: 1rem; }
</style>

<div class="content-fluid space-y-10">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-8">
        <div class="space-y-1">
            <div class="flex items-center gap-2 mb-3">
                <div class="h-1.5 w-10 bg-red-600 rounded-full"></div>
                <div class="h-1.5 w-5 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase italic leading-none">
                Pelupusan <span class="text-blue-600">Aset<span class="text-yellow-400">.</span></span>
            </h3>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mt-3 italic">Proses Keluar Aset & Pelupusan (KEW.PA-19)</p>
        </div>
        
        <div class="flex gap-3">
            <button class="bg-[#1E3A8A] hover:bg-red-700 text-white px-8 py-3.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-xl shadow-blue-900/20 transition-all italic">
                + Syor Pelupusan
            </button>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col lg:flex-row gap-4">
        <div class="flex-1 relative group">
            <input type="text" placeholder="Cari No. Siri KEW.PA-19 atau Nama Aset..." 
                class="w-full bg-gray-50 border border-gray-200 py-3.5 px-6 rounded-xl text-xs font-bold outline-none focus:border-[#1E3A8A] focus:bg-white transition-all shadow-inner">
            <svg class="w-4 h-4 absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-[#1E3A8A] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="3"/></svg>
        </div>
        <select class="bg-gray-50 border border-gray-200 py-3.5 px-6 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer hover:bg-white transition-all">
            <option>Status: Semua</option>
            <option>Menunggu Kelulusan</option>
            <option>Selesai Pelupusan</option>
        </select>
        <button class="bg-[#1E3A8A] text-white px-10 py-3.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-red-700 transition-all">
            Tapis Data
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-8 rounded-sharp border border-gray-100 shadow-sm">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2 italic">Menunggu Kelulusan</p>
            <h4 class="text-3xl font-black text-[#1E3A8A] tracking-tighter">24 <span class="text-[10px] font-bold text-slate-300 uppercase">Unit</span></h4>
        </div>
        <div class="bg-white p-8 rounded-sharp border border-gray-100 shadow-sm">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2 italic">Nilai Anggaran</p>
            <h4 class="text-3xl font-black text-[#1E3A8A] tracking-tighter">RM 42,500</h4>
        </div>
        <div class="bg-white p-8 rounded-sharp border border-gray-100 shadow-sm">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2 italic">Kaedah Pelupusan</p>
            <h4 class="text-2xl font-black text-blue-600 tracking-tighter uppercase italic">Sebut Harga</h4>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-100">
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest italic">No. Siri & Nama</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Sebab Utama</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Tempoh</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach([
                    ['id' => 'PNS/ICT/012', 'name' => 'SERVER RACK - BLOK C', 'reason' => 'Usang / Tidak Ekonomik', 'years' => '8 Thn'],
                    ['id' => 'PNS/KND/004', 'name' => 'VAN HIACE (BPA 2231)', 'reason' => 'Kerosakan Enjin', 'years' => '11 Thn']
                ] as $row)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-8 py-6">
                        <span class="text-[9px] font-black text-slate-300 uppercase italic">{{ $row['id'] }}</span>
                        <p class="text-xs font-black text-[#1E3A8A] uppercase">{{ $row['name'] }}</p>
                    </td>
                    <td class="px-8 py-6 text-xs font-bold text-slate-500 italic">{{ $row['reason'] }}</td>
                    <td class="px-8 py-6 text-center text-[10px] font-black text-slate-700">{{ $row['years'] }}</td>
                    <td class="px-8 py-6">
                        <div class="flex justify-end gap-2">
                            <button class="p-2.5 bg-white border border-gray-100 rounded-lg text-slate-400 hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection