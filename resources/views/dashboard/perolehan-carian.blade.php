@extends('layouts.dashboard')

@section('content')
<style>
    body { background-color: #FAFAFA; }
</style>

<div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-1">
        <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">Search<span class="text-blue-500">.</span>Records</h3>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Carian & Penapisan Maklumat Perolehan PNS</p>
    </div>
</div>

<div class="bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm mb-10 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50/50 rounded-bl-[5rem] -z-0"></div>
    
    <div class="relative z-10 grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
        <div class="md:col-span-2 space-y-2">
            <label class="text-[9px] font-black uppercase text-gray-400 tracking-widest ml-2">Kata Kunci / No. Kontrak</label>
            <div class="relative">
                <input type="text" placeholder="Cth: PNS/TND/2026/001 atau Kodewave..." 
                    class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 text-xs font-bold outline-none focus:ring-2 focus:ring-blue-100 transition-all">
                <svg class="w-4 h-4 text-gray-300 absolute right-5 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="3"/></svg>
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-[9px] font-black uppercase text-gray-400 tracking-widest ml-2">Kategori Perolehan</label>
            <select class="w-full bg-gray-50 border-none rounded-2xl p-4 text-xs font-bold outline-none appearance-none">
                <option>Semua Jenis</option>
                <option>Tender Terbuka</option>
                <option>Sebut Harga</option>
                <option>Kontrak Terus</option>
            </select>
        </div>

        <button class="w-full py-4 bg-[#1E3A8A] text-white rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-xl shadow-blue-100 hover:scale-[1.02] transition-transform">
            Tapis Rekod
        </button>
    </div>
</div>

<div class="bg-white rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50/50">
                <tr>
                    <th class="px-10 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">ID Kontrak</th>
                    <th class="px-10 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Vendor / Syarikat</th>
                    <th class="px-10 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Tarikh Mula</th>
                    <th class="px-10 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Nilai (RM)</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach([
                    ['id' => 'PNS/TND/26/001', 'vendor' => 'KODEWAVE SDN BHD', 'date' => '05 JAN 2026', 'val' => '450,000.00'],
                    ['id' => 'PNS/SH/26/012', 'vendor' => 'SELANGOR TECH CORP', 'date' => '12 FEB 2026', 'val' => '85,420.00'],
                    ['id' => 'PNS/TND/26/045', 'vendor' => 'DATA SYNERGY LTD', 'date' => '01 MAC 2026', 'val' => '1,200,000.00'],
                    ['id' => 'PNS/KT/26/009', 'vendor' => 'MAJU LOGISTICS', 'date' => '22 APR 2026', 'val' => '15,000.00'],
                ] as $row)
                <tr class="hover:bg-blue-50/30 transition-all cursor-pointer group">
                    <td class="px-10 py-8 text-xs font-black text-[#1E3A8A] group-hover:underline">{{ $row['id'] }}</td>
                    <td class="px-10 py-8">
                        <p class="text-xs font-black text-gray-700 uppercase">{{ $row['vendor'] }}</p>
                        <p class="text-[9px] font-bold text-gray-300 uppercase italic">Verified Partner</p>
                    </td>
                    <td class="px-10 py-8 text-[10px] font-black text-gray-400 uppercase">{{ $row['date'] }}</td>
                    <td class="px-10 py-8 text-right">
                        <span class="text-xs font-black text-blue-600 italic">RM {{ $row['val'] }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="p-8 bg-gray-50/50 border-t border-gray-50 flex justify-between items-center">
        <p class="text-[9px] font-black text-gray-400 uppercase">Menunjukkan 4 daripada 142 rekod</p>
        <div class="flex gap-2">
            <button class="w-8 h-8 rounded-lg bg-white border border-gray-100 flex items-center justify-center text-gray-400 hover:text-[#1E3A8A] transition-all shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-width="3"/></svg>
            </button>
            <button class="w-8 h-8 rounded-lg bg-[#1E3A8A] text-white flex items-center justify-center text-[10px] font-black shadow-lg shadow-blue-100">1</button>
            <button class="w-8 h-8 rounded-lg bg-white border border-gray-100 flex items-center justify-center text-gray-400 hover:text-[#1E3A8A] transition-all shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="3"/></svg>
            </button>
        </div>
    </div>
</div>
@endsection