@extends('layouts.dashboard')

@section('content')
<div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-1">
        <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">Asset <span class="text-blue-500">Disposal.</span></h3>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Pengurusan Pelupusan Aset & Hapus Kira Kehilangan (KEW.PA-19/31)</p>
    </div>
    <div class="flex gap-2 text-[9px] font-black uppercase">
        <div class="px-4 py-2 bg-orange-50 text-orange-600 rounded-xl border border-orange-100 flex items-center gap-2">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-width="2.5"/></svg>
            Pending Board Approval
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm group">
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 italic">Menunggu Pelupusan</p>
        <h4 class="text-3xl font-black text-[#1E3A8A]">RM 241.5k</h4>
        <p class="text-[9px] font-bold text-orange-500 mt-2 uppercase">14 Item Flagged</p>
    </div>
    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 italic">Kaedah Terlaris</p>
        <h4 class="text-3xl font-black text-[#1E3A8A]">E-WASTE</h4>
        <p class="text-[9px] font-bold text-gray-300 mt-2 uppercase italic">Pematuhan Alam Sekitar</p>
    </div>
    <div class="bg-[#1E3A8A] p-8 rounded-[2.5rem] text-white flex flex-col justify-center shadow-xl shadow-blue-100">
        <p class="text-[9px] font-bold opacity-60 uppercase tracking-widest mb-1 italic">Tindakan Hapus Kira</p>
        <h4 class="text-3xl font-black italic tracking-tighter">03 <span class="text-xs font-normal">KES AKTIF</span></h4>
        <div class="mt-4 h-1.5 bg-white/10 rounded-full overflow-hidden"><div class="h-full bg-orange-400 w-1/2"></div></div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 bg-white p-12 rounded-[3.5rem] border border-gray-100 shadow-sm">
        <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-10">Borang Permohonan Pelupusan</h4>
        <form class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2">ID Aset (Barcode)</label>
                    <input type="text" placeholder="PNS/ICT/2026/..." class="w-full bg-gray-50 border-none rounded-2xl p-5 text-xs font-bold outline-none focus:ring-2 focus:ring-blue-100 transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2">Kaedah Pelupusan</label>
                    <select class="w-full bg-gray-50 border-none rounded-2xl p-5 text-xs font-bold appearance-none outline-none">
                        <option>Jualan Sisa (E-Waste)</option>
                        <option>Tukar Barang (Trade-In)</option>
                        <option>Musnah (Bury/Burn)</option>
                    </select>
                </div>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2">Justifikasi (Sebab)</label>
                <textarea rows="4" class="w-full bg-gray-50 border-none rounded-2xl p-5 text-xs font-bold outline-none" placeholder="Cth: Aset rosak dan kos pembaikan melebihi 50% nilai semasa..."></textarea>
            </div>
            <button class="w-full py-6 bg-[#1E3A8A] text-white rounded-2xl text-[11px] font-black uppercase tracking-[0.3em] shadow-xl shadow-blue-100 hover:scale-[1.01] transition-transform">Hantar ke Urus Setia</button>
        </form>
    </div>

    <div class="space-y-6">
        <div class="bg-red-50 p-10 rounded-[3rem] border border-red-100">
            <div class="flex items-center gap-3 mb-6 text-red-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2.5"/></svg>
                <h4 class="text-[11px] font-black uppercase tracking-widest">Hapus Kira (Kehilangan)</h4>
            </div>
            <p class="text-[10px] font-bold text-red-800 leading-relaxed uppercase tracking-tighter italic italic">Laporan Polis wajib dilampirkan bagi setiap kes hapus kira aset hilang sebelum siasatan dijalankan.</p>
            <button class="mt-8 w-full py-4 bg-white border border-red-200 text-red-600 rounded-xl text-[9px] font-black uppercase tracking-widest shadow-sm">Daftar Kehilangan</button>
        </div>
    </div>
</div>
@endsection