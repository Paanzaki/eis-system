@extends('layouts.dashboard')

@section('content')
<style>
    .rounded-sharp { border-radius: 1rem; }
    .table-row-hover:hover { background-color: #FEFCE8; transition: all 0.2s ease; } /* Hint Kuning Selangor */
</style>

<div class="space-y-8">
    
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <div class="h-1.5 w-10 bg-red-600 rounded-full"></div>
                <div class="h-1.5 w-5 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">Senarai <span class="text-blue-600">Inventori Aset.</span></h3>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mt-2">Modul Pengurusan Aset (FS-EIS-MS-DA)</p>
        </div>

        <div class="flex items-center gap-4">
            <div class="relative group">
                <input type="text" placeholder="CARI NO. SIRI / NAMA ASET..." 
                    class="bg-white border-2 border-gray-50 py-3.5 px-6 rounded-xl text-[10px] font-black uppercase tracking-widest focus:ring-4 focus:ring-yellow-400/20 focus:border-yellow-400 outline-none shadow-sm w-64 lg:w-80 transition-all">
                <svg class="w-4 h-4 absolute right-5 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="3"/></svg>
            </div>
            
            <button onclick="alert('Borang Daftar Aset Baru')" class="bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-blue-100 transition-all">
                + Daftar Aset
            </button>
        </div>
    </div>

    <div class="bg-white rounded-sharp border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">No. Siri Pendaftaran</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Keterangan Aset</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Kategori</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Status</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right italic">Tindakan (CRUD)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @php
                        $assets = [
                            ['siri' => 'PNS/ICT/2026/001', 'nama' => 'MacBook Pro 14" M3 - Unit IT', 'cat' => 'Harta Modal', 'status' => 'Aktif', 'color' => 'bg-green-100 text-green-700 border-green-200'],
                            ['siri' => 'PNS/KND/2026/042', 'nama' => 'Proton X70 (BQC 1234) - Jabatan SUK', 'cat' => 'Harta Modal', 'status' => 'Penyenggaraan', 'color' => 'bg-yellow-100 text-yellow-700 border-yellow-200'],
                            ['siri' => 'PNS/PJBT/2026/115', 'nama' => 'Kerusi Ergonomik Steelcase', 'cat' => 'Aset Rendah', 'status' => 'Aktif', 'color' => 'bg-green-100 text-green-700 border-green-200'],
                            ['siri' => 'PNS/ICT/2026/089', 'nama' => 'iPad Air Gen 5 - Naziran', 'cat' => 'Aset Rendah', 'status' => 'Hilang', 'color' => 'bg-red-100 text-red-700 border-red-200'],
                        ];
                    @endphp

                    @foreach($assets as $a)
                    <tr class="table-row-hover group transition-all">
                        <td class="px-8 py-5">
                            <span class="text-[11px] font-black text-[#1E3A8A] block tracking-tighter">{{ $a['siri'] }}</span>
                            <span class="text-[8px] font-bold text-slate-300 uppercase italic">QR Generated</span>
                        </td>
                        <td class="px-8 py-5">
                            <span class="text-[11px] font-bold text-slate-700 uppercase">{{ $a['nama'] }}</span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[8px] font-black rounded-md uppercase tracking-widest border border-blue-100">
                                {{ $a['cat'] }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <span class="inline-flex items-center px-4 py-1.5 rounded-lg border {{ $a['color'] }} text-[9px] font-black uppercase tracking-tighter shadow-sm">
                                {{ $a['status'] }}
                            </span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex items-center justify-end gap-2">
                                <button onclick="alert('Paparan KEW.PA-2')" class="p-2.5 hover:bg-[#1E3A8A] text-slate-400 hover:text-white rounded-lg transition-all shadow-sm bg-white border border-gray-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <button onclick="alert('Borang Kemaskini')" class="p-2.5 hover:bg-yellow-400 text-slate-400 hover:text-white rounded-lg transition-all shadow-sm bg-white border border-gray-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </button>
                                <button onclick="confirm('Hapus rekod?')" class="p-2.5 hover:bg-red-600 text-slate-400 hover:text-white rounded-lg transition-all shadow-sm bg-white border border-gray-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-8 py-5 border-t border-gray-50 flex items-center justify-between bg-gray-50/30">
            <p class="text-[9px] font-bold text-slate-400 uppercase italic">Menunjukkan 4 daripada 12,402 rekod inventori</p>
            <div class="flex gap-2">
                <button class="px-4 py-2 bg-white border border-gray-100 rounded-lg text-[9px] font-black uppercase text-slate-400">Sebelumnya</button>
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-[9px] font-black uppercase text-[#1E3A8A] shadow-sm">Seterusnya</button>
            </div>
        </div>
    </div>
</div>
@endsection