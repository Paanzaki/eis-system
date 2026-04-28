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
                Pelantikan <span class="text-blue-600">Pegawai<span class="text-yellow-400">.</span></span>
            </h3>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mt-3 italic">Lantikan Pegawai Pemeriksa & Lembaga Pelupusan (KEW.PA-15)</p>
        </div>
        
        <button class="bg-[#1E3A8A] hover:bg-red-700 text-white px-8 py-3.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-xl shadow-blue-900/20 transition-all italic">
            + Lantikan Baru
        </button>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col lg:flex-row gap-4">
        <div class="flex-1 relative group">
            <input type="text" placeholder="Cari Nama Pegawai atau No. Kad Pengenalan..." 
                class="w-full bg-gray-50 border border-gray-200 py-3.5 px-6 rounded-xl text-xs font-bold outline-none focus:border-[#1E3A8A] focus:bg-white transition-all shadow-inner">
            <svg class="w-4 h-4 absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-[#1E3A8A] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="3"/></svg>
        </div>
        <select class="bg-gray-50 border border-gray-200 py-3.5 px-6 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
            <option>Semua Kategori</option>
            <option>Pegawai Pemeriksa</option>
            <option>Lembaga Pelupusan</option>
        </select>
        <button class="bg-[#1E3A8A] text-white px-10 py-3.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-red-700 transition-all">
            Cari Pegawai
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-sharp border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1 italic">Pegawai Pemeriksa Aktif</p>
                <h4 class="text-3xl font-black text-[#1E3A8A]">12 <span class="text-xs font-normal text-slate-300">Pegawai</span></h4>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-width="2"/></svg>
            </div>
        </div>

        <div class="bg-white p-8 rounded-sharp border border-gray-100 shadow-sm flex items-center justify-between group">
            <div>
                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1 italic">Sijil Lantikan Tamat</p>
                <h4 class="text-3xl font-black text-red-600">03 <span class="text-xs font-normal text-slate-300">Pegawai</span></h4>
            </div>
            <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center shadow-inner">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-width="2"/></svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-100">
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Profil Pegawai</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Kategori Lantikan</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Tempoh Lantikan</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach([
                    ['name' => 'Ahmad Farhan Bin Zulkifli', 'post' => 'Eksekutif Kanan (BTM)', 'scope' => 'Pegawai Pemeriksa', 'expiry' => '31 Dis 2026', 'status' => 'Aktif'],
                    ['name' => 'Siti Nurhaliza Binti Ahmad', 'post' => 'Pen. Pegawai Tadbir', 'scope' => 'Lembaga Pelupusan', 'expiry' => '15 Jun 2026', 'status' => 'Aktif']
                ] as $p)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-8 py-6">
                        <p class="text-xs font-black text-[#1E3A8A] uppercase">{{ $p['name'] }}</p>
                        <p class="text-[9px] font-bold text-slate-300 uppercase italic">{{ $p['post'] }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 border border-blue-100 rounded-lg text-[9px] font-black uppercase tracking-tighter">
                            {{ $p['scope'] }}
                        </span>
                    </td>
                    <td class="px-8 py-6 text-center">
                        <p class="text-[10px] font-black text-slate-700">{{ $p['expiry'] }}</p>
                        <p class="text-[8px] font-bold text-green-500 uppercase italic mt-1">Status: {{ $p['status'] }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex justify-end gap-2">
                             <button class="p-2.5 bg-white border border-gray-100 rounded-lg text-slate-400 hover:text-blue-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                             <button class="p-2.5 bg-white border border-gray-100 rounded-lg text-slate-400 hover:text-red-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection