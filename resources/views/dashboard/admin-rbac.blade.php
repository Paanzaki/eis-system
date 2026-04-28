@extends('layouts.dashboard')

@section('content')
<div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-1">
        <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic italic">Access <span class="text-blue-500">Control.</span></h3>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Pengurusan Peranan (RBAC) & Kebenaran Capaian PNS</p>
    </div>
    <button class="bg-[#1E3A8A] text-white px-8 py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-blue-100 hover:scale-105 transition-all">+ Cipta Peranan</button>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 italic italic">Kumpulan Pentadbir</p>
        <h4 class="text-3xl font-black text-[#1E3A8A]">04 <span class="text-xs font-normal text-gray-400">STAFF</span></h4>
        <div class="mt-4 flex -space-x-2">
            @for($i=1; $i<=4; $i++)
            <div class="w-8 h-8 rounded-full border-2 border-white bg-blue-100 flex items-center justify-center text-[8px] font-black text-blue-600">ID</div>
            @endfor
        </div>
    </div>
    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 italic">Eksekutif Pelaksana</p>
        <h4 class="text-3xl font-black text-[#1E3A8A]">42 <span class="text-xs font-normal text-gray-400">STAFF</span></h4>
        <p class="text-[9px] font-bold text-green-500 mt-4 uppercase">Verified by MyDigitalID</p>
    </div>
    <div class="bg-[#1E3A8A] p-8 rounded-[2.5rem] text-white flex flex-col justify-center">
        <p class="text-[9px] font-bold opacity-60 uppercase tracking-widest mb-1">Status Keizinan (Permissions)</p>
        <h4 class="text-3xl font-black italic">Active & Secure</h4>
        <div class="mt-4 h-1.5 bg-white/10 rounded-full overflow-hidden"><div class="h-full bg-blue-400 w-full"></div></div>
    </div>
</div>

<div class="bg-white rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden">
    <div class="p-8 border-b border-gray-50 bg-gray-50/30">
        <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-widest italic">Matrix Matriks Peranan & Capaian</h4>
    </div>
    <table class="w-full text-left">
        <thead>
            <tr class="text-[10px] font-black text-gray-300 uppercase tracking-widest">
                <th class="px-10 py-6">Kumpulan (Role)</th>
                <th class="px-10 py-6">Modul Perolehan</th>
                <th class="px-10 py-6">Modul Aset</th>
                <th class="px-10 py-6 text-right">Tindakan</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach([
                ['Super Admin', 'Full CRUD', 'Full CRUD', 'text-green-500'],
                ['Executive PNS', 'Read/Report', 'Read/Report', 'text-blue-500'],
                ['Asset Manager', 'No Access', 'Full CRUD', 'text-orange-500'],
                ['Auditor External', 'View Only', 'View Only', 'text-gray-400']
            ] as $row)
            <tr class="hover:bg-gray-50/50 transition-all">
                <td class="px-10 py-8">
                    <p class="text-xs font-black text-[#1E3A8A] uppercase">{{ $row[0] }}</p>
                    <p class="text-[8px] font-bold text-gray-300 uppercase">System Default</p>
                </td>
                <td class="px-10 py-8 text-[10px] font-black uppercase {{ $row[3] }}">{{ $row[1] }}</td>
                <td class="px-10 py-8 text-[10px] font-black uppercase {{ $row[3] }}">{{ $row[2] }}</td>
                <td class="px-10 py-8 text-right">
                    <button class="text-[10px] font-black text-gray-300 hover:text-[#1E3A8A] uppercase italic">Configure</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection