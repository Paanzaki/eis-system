@extends('layouts.dashboard')

@section('content')
<div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-1">
        <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic italic">Asset <span class="text-blue-500">Registry.</span></h3>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Daftar Harta Modal (KEW.PA-2) & Aset Bernilai Rendah (KEW.PA-3)</p>
    </div>
    <div class="flex gap-3">
        <button class="bg-[#1E3A8A] text-white px-8 py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-blue-100 hover:scale-105 transition-all">+ Daftar Aset</button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Harta Modal</p>
        <h4 class="text-2xl font-black text-[#1E3A8A]">1,420</h4>
    </div>
    <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Aset Rendah</p>
        <h4 class="text-2xl font-black text-[#1E3A8A]">10,982</h4>
    </div>
    <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
        <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Nilai Keseluruhan</p>
        <h4 class="text-2xl font-black text-blue-600">RM 4.2M</h4>
    </div>
    <div class="bg-green-50 p-6 rounded-[2rem] border border-green-100 flex items-center justify-center">
        <div class="text-center">
            <p class="text-[8px] font-black text-green-600 uppercase tracking-widest mb-1 italic">Barcode Ready</p>
            <svg class="w-12 h-6 text-green-600 mx-auto" fill="currentColor" viewBox="0 0 24 24"><path d="M2 4h2v16H2V4zm4 0h1v16H6V4zm3 0h3v16H9V4zm5 0h2v16h-2V4zm3 0h3v16h-3V4z"/></svg>
        </div>
    </div>
</div>

<div class="bg-white rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden">
    <div class="p-8 border-b border-gray-50 flex flex-col md:flex-row justify-between gap-4">
        <input type="text" placeholder="Cari No. Siri atau Nama Aset..." class="bg-gray-50 border-none rounded-xl px-6 py-3 text-xs font-bold outline-none w-full md:w-96 ring-1 ring-gray-100">
        <div class="flex gap-2">
            <span class="px-4 py-2 bg-gray-50 rounded-lg text-[9px] font-black text-gray-400 uppercase cursor-pointer">Filter: ICT</span>
            <span class="px-4 py-2 bg-gray-50 rounded-lg text-[9px] font-black text-gray-400 uppercase cursor-pointer">Filter: Kenderaan</span>
        </div>
    </div>
    <table class="w-full text-left">
        <thead class="bg-gray-50/50">
            <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest">
                <th class="px-10 py-6">No. Siri / Label</th>
                <th class="px-10 py-6">Kategori & Nama</th>
                <th class="px-10 py-6">Lokasi</th>
                <th class="px-10 py-6 text-right">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50 text-[11px] font-bold">
            @foreach([
                ['PNS/ICT/26/001', 'Harta Modal', 'Server Rack R750', 'BTM, Shah Alam', 'Baik'],
                ['PNS/VEH/26/042', 'Harta Modal', 'Toyota Vellfire', 'Pool Kenderaan', 'Servis'],
                ['PNS/OFF/26/882', 'Aset Rendah', 'Kerusi Ergonomik', 'Aras 4, Kewangan', 'Baik']
            ] as $a)
            <tr class="hover:bg-gray-50/50 transition-all">
                <td class="px-10 py-8 text-[#1E3A8A] font-black uppercase">{{ $a[0] }}</td>
                <td class="px-10 py-8">
                    <p class="text-gray-800 uppercase">{{ $a[2] }}</p>
                    <p class="text-[8px] font-bold text-gray-300 uppercase italic">{{ $a[1] }}</p>
                </td>
                <td class="px-10 py-8 text-gray-400 uppercase italic">{{ $a[3] }}</td>
                <td class="px-10 py-8 text-right">
                    <span class="px-3 py-1 rounded-lg text-[9px] font-black uppercase {{ $a[4] == 'Baik' ? 'bg-green-50 text-green-600' : 'bg-blue-50 text-blue-600' }}">
                        {{ $a[4] }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection