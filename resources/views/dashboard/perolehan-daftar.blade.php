@extends('layouts.dashboard')

@section('content')

<div class="profile-container space-y-12">
    
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b-2 border-gray-100 pb-10">
        <div class="space-y-2">
            <div class="flex items-center gap-2 mb-4">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-5xl font-black text-[#1E3A8A] tracking-tighter uppercase italic leading-none">
                Pendaftaran <span class="text-blue-600">Aset Baru<span class="text-yellow-400">.</span></span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-4 italic">Kemasukan Data Perolehan & Penomboran Siri (KEW.PA-2/3)</p>
        </div>
        
        <div class="flex items-center gap-4 bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
            <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest italic">ID Transaksi: REG-2026-{{ rand(1000,9999) }}</span>
        </div>
    </div>

    <div class="bg-white p-12 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-gray-50 relative overflow-hidden group">
        <div class="flex items-center gap-4 mb-12 border-l-4 border-yellow-400 pl-6">
            <h4 class="text-[14px] font-black text-[#1E3A8A] uppercase tracking-widest italic">Maklumat Terperinci Aset</h4>
        </div>

        <form action="#" class="grid grid-cols-12 gap-10">
            <div class="col-span-12 lg:col-span-6 space-y-2">
                <label class="label-heavy">Kategori Aset Alih</label>
                <select class="input-heavy cursor-pointer">
                    <option>Harta Modal (Nilai > RM2,000)</option>
                    <option>Aset Alih Rendah (Nilai < RM2,000)</option>
                </select>
            </div>

            <div class="col-span-12 lg:col-span-6 space-y-2">
                <label class="label-heavy">Perihalan / Nama Aset</label>
                <input type="text" placeholder="Contoh: MacBook Pro M3 14-inch" class="input-heavy">
            </div>

            <div class="col-span-12 lg:col-span-4 space-y-2">
                <label class="label-heavy">No. Pesanan Kerajaan (LO)</label>
                <input type="text" placeholder="PNS/LO/2026/XXXX" class="input-heavy">
            </div>

            <div class="col-span-12 lg:col-span-4 space-y-2">
                <label class="label-heavy">Tarikh Terima</label>
                <input type="date" class="input-heavy">
            </div>

            <div class="col-span-12 lg:col-span-4 space-y-2">
                <label class="label-heavy">Kos Perolehan (RM)</label>
                <input type="number" step="0.01" placeholder="0.00" class="input-heavy text-blue-600">
            </div>

            <div class="col-span-12 space-y-2">
                <label class="label-heavy">Lokasi Penempatan (Jabatan / Unit)</label>
                <textarea rows="3" class="input-heavy" placeholder="Nyatakan lokasi fizikal aset dengan tepat..."></textarea>
            </div>

            <div class="col-span-12 flex justify-end gap-4 pt-10 border-t border-gray-50">
                <button type="button" class="px-12 py-5 rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 hover:bg-gray-50 transition-all">
                    Draft Simpan
                </button>
                <button type="submit" class="bg-[#1E3A8A] hover:bg-red-700 text-white px-14 py-5 rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] shadow-2xl shadow-blue-900/20 transition-all transform hover:scale-105 active:scale-95 italic">
                    Daftar & Jana No. Siri
                </button>
            </div>
        </form>
    </div>

    <div class="bg-blue-50/50 p-8 rounded-[2rem] border border-blue-100 flex items-center gap-6">
        <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-blue-600 flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2.5"/></svg>
        </div>
        <p class="text-[11px] font-bold text-slate-500 leading-relaxed italic">
            Sistem akan menjana No. Siri Pendaftaran secara automatik berdasarkan kod klasifikasi (PNS/ICT/2026/...) sebaik sahaja pendaftaran disahkan.
        </p>
    </div>
</div>
@endsection
