@extends('layouts.dashboard')

@section('content')
<style>
    .rounded-sharp { border-radius: 1rem; }
    .status-pill { padding: 0.35rem 1rem; border-radius: 0.75rem; font-size: 9px; font-weight: 900; text-transform: uppercase; letter-spacing: -0.025em; }
</style>

<div class="space-y-8">
    
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <div class="h-1.5 w-10 bg-red-600 rounded-full"></div>
                <div class="h-1.5 w-5 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">Naziran <span class="text-blue-600">Perolehan.</span></h3>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mt-2">Audit & Pematuhan Tatacara Perolehan Kerajaan</p>
        </div>

        <div class="flex items-center gap-4">
            <div class="relative group">
                <input type="text" placeholder="CARI FAIL NAZIRAN..." 
                    class="bg-white border-2 border-gray-50 py-3.5 px-6 rounded-xl text-[10px] font-black uppercase tracking-widest focus:ring-4 focus:ring-yellow-400/20 focus:border-yellow-400 outline-none shadow-sm w-64 lg:w-72 transition-all">
                <svg class="w-4 h-4 absolute right-5 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="3"/></svg>
            </div>
            <button class="bg-[#1E3A8A] hover:bg-yellow-500 text-white px-6 py-3.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                Jana Laporan Naziran
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-sharp border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Purata Skor Negeri</p>
                <h4 class="text-2xl font-black text-[#1E3A8A]">92.4%</h4>
            </div>
            <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-600 font-black text-xs">A</div>
        </div>
        <div class="bg-white p-6 rounded-sharp border border-gray-100 shadow-sm">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Teguran Audit Aktif</p>
            <h4 class="text-2xl font-black text-red-600">14 <span class="text-[10px] text-slate-300 italic">Kes</span></h4>
        </div>
        <div class="bg-white p-6 rounded-sharp border border-gray-100 shadow-sm">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Entiti Telah Diaudit</p>
            <h4 class="text-2xl font-black text-blue-600">45/60 <span class="text-[10px] text-slate-300 italic">Jabatan</span></h4>
        </div>
    </div>

    <div class="bg-white rounded-sharp border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Kod Jabatan / Fail</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Jabatan / Agensi</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Skor Pematuhan</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Status</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @php
                    $audits = [
                        ['id' => 'NZR/2026/P/01', 'dept' => 'Pejabat Setiausaha Kerajaan (SUK)', 'score' => 98, 'status' => 'Cemerlang', 'color' => 'bg-green-100 text-green-700'],
                        ['id' => 'NZR/2026/P/14', 'dept' => 'Jabatan Kerja Raya (JKR) Selangor', 'score' => 85, 'status' => 'Baik', 'color' => 'bg-blue-100 text-blue-700'],
                        ['id' => 'NZR/2026/P/22', 'dept' => 'Jabatan Agama Islam Selangor (JAIS)', 'score' => 62, 'status' => 'Teguran', 'color' => 'bg-red-100 text-red-700'],
                        ['id' => 'NZR/2026/P/09', 'dept' => 'Majlis Perbandaran Sepang', 'score' => 74, 'status' => 'Memuaskan', 'color' => 'bg-yellow-100 text-yellow-700'],
                    ];
                @endphp

                @foreach($audits as $audit)
                <tr class="hover:bg-gray-50/50 transition-all">
                    <td class="px-8 py-6">
                        <span class="text-[11px] font-black text-[#1E3A8A] block tracking-tighter">{{ $audit['id'] }}</span>
                        <span class="text-[8px] font-bold text-slate-300 uppercase">Tarikh: 24/04/2026</span>
                    </td>
                    <td class="px-8 py-6">
                        <span class="text-[11px] font-bold text-slate-700 uppercase">{{ $audit['dept'] }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex flex-col items-center gap-1">
                            <span class="text-sm font-black text-[#1E3A8A]">{{ $audit['score'] }}%</span>
                            <div class="w-16 h-1 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-blue-600" style="width: {{ $audit['score'] }}%"></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-6 text-center">
                        <span class="status-pill {{ $audit['color'] }} shadow-sm border border-black/5">
                            {{ $audit['status'] }}
                        </span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex justify-end gap-2">
                            <button class="p-2.5 bg-white border border-gray-100 rounded-lg text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </button>
                            <button class="p-2.5 bg-white border border-gray-100 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition-all shadow-sm">
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