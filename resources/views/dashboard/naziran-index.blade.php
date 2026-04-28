@extends('layouts.dashboard')

@section('content')
<div class="mb-10 space-y-1">
    <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">Naziran <span class="text-blue-500">Compliance.</span></h3>
    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Pemantauan & Penilaian Pematuhan Prosedur PNS</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex items-center justify-between">
        <div>
            <p class="text-[9px] font-black text-gray-400 uppercase mb-1">Aktiviti Naziran</p>
            <h4 class="text-2xl font-black text-[#1E3A8A]">24 <span class="text-[10px] text-gray-300 italic">Selesai</span></h4>
        </div>
        <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm lg:col-span-2 flex items-center gap-8">
        <div class="flex-1 space-y-3">
            <p class="text-[10px] font-black text-gray-400 uppercase italic">Kadar Pematuhan Keseluruhan</p>
            <div class="h-3 bg-gray-50 rounded-full overflow-hidden"><div class="h-full bg-green-500 w-[92%]"></div></div>
            <p class="text-[9px] font-bold text-green-600 uppercase">92% Patuh Prosedur Perbendaharaan</p>
        </div>
        <button class="px-6 py-4 bg-[#1E3A8A] text-white rounded-2xl text-[9px] font-black uppercase tracking-widest shadow-xl shadow-blue-100">Buka Laporan</button>
    </div>
</div>

<div class="mt-8 bg-white rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50/50">
            <tr>
                <th class="px-10 py-6 text-[10px] font-black text-gray-400 uppercase">Zon/Cawangan</th>
                <th class="px-10 py-6 text-[10px] font-black text-gray-400 uppercase">Status Naziran</th>
                <th class="px-10 py-6 text-[10px] font-black text-gray-400 uppercase text-right">Tindakan</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach([['Zon Utara (Sabak Bernam)', 'Teguran Minimal', 'Review'], ['Zon Tengah (Shah Alam)', 'Tiada Teguran', 'Close'], ['Zon Selatan (Sepang)', 'Perlu Penambahbaikan', 'Follow-up']] as $n)
            <tr class="hover:bg-gray-50 transition-all">
                <td class="px-10 py-8 text-xs font-black text-[#1E3A8A] uppercase">{{ $n[0] }}</td>
                <td class="px-10 py-8 text-xs font-bold text-gray-500">{{ $n[1] }}</td>
                <td class="px-10 py-8 text-right"><span class="text-[9px] font-black text-blue-500 uppercase cursor-pointer">{{ $n[2] }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection