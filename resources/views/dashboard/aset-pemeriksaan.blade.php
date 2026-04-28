@extends('layouts.dashboard')

@section('content')
<div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-1">
        <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic italic">Field <span class="text-blue-500">Inspection.</span></h3>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Pemeriksaan Fizikal & Verifikasi Aset di Lapangan (Q2 2026)</p>
    </div>
    <div class="flex bg-[#1E3A8A] p-1 rounded-xl shadow-lg">
        <button class="px-6 py-2 text-[9px] font-black uppercase tracking-widest text-white">Manual Verifikasi</button>
        <button class="px-6 py-2 bg-blue-500 rounded-lg text-[9px] font-black uppercase tracking-widest text-white animate-pulse">QR Scanner Active</button>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
    <div class="bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm lg:col-span-2">
        <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-8 italic">Status Semakan Mengikut Lokasi</h4>
        <div class="space-y-8">
            @foreach([
                ['Ibu Pejabat (SUK Selangor)', 92, 'bg-green-500'],
                ['Pejabat Tanah Daerah Klang', 45, 'bg-blue-500'],
                ['Cawangan Hulu Langat', 15, 'bg-orange-500']
            ] as $loc)
            <div class="space-y-3">
                <div class="flex justify-between text-[10px] font-black uppercase tracking-widest">
                    <span class="text-gray-800">{{ $loc[0] }}</span>
                    <span class="text-[#1E3A8A]">{{ $loc[1] }}%</span>
                </div>
                <div class="h-2.5 bg-gray-50 rounded-full overflow-hidden flex">
                    <div class="h-full {{ $loc[2] }} transition-all duration-1000" style="width: {{ $loc[1] }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="bg-[#1E3A8A] p-10 rounded-[3rem] shadow-xl shadow-blue-100 text-white flex flex-col justify-between relative overflow-hidden">
        <div class="relative z-10">
            <h4 class="text-[10px] font-bold opacity-60 uppercase tracking-[0.2em] mb-2 italic">Target Selesai</h4>
            <h2 class="text-5xl font-black italic tracking-tighter">30 JUN</h2>
            <p class="text-[9px] mt-4 font-black uppercase bg-white/10 inline-block px-3 py-1 rounded-lg">Baki: 62 Hari Lagi</p>
        </div>
        <div class="relative z-10 pt-10 border-t border-white/10">
            <p class="text-[10px] font-bold leading-relaxed uppercase tracking-tighter italic">"Pastikan setiap aset dilekatkan tag QR baru selepas verifikasi fizikal dijalankan."</p>
        </div>
        <svg class="absolute right-[-20px] bottom-[-20px] w-48 h-48 text-white/5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-8 9z"/></svg>
    </div>
</div>

<div class="bg-white rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden">
    <div class="p-8 border-b border-gray-50">
        <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-widest italic">Log Verifikasi Terkini (Mobile App Sync)</h4>
    </div>
    <div class="p-4">
        @foreach([
            ['FZ-001', 'Farhan Zaki', 'Verified: PNS/ICT/992', 'Shah Alam', 'Success'],
            ['SA-042', 'Siti Aminah', 'Verified: PNS/VEH/042', 'Klang', 'Success'],
            ['UK-099', 'System Bot', 'Flagged: PNS/OFF/003 (Missing)', 'Hulu Langat', 'Warning']
        ] as $log)
        <div class="flex items-center justify-between p-4 hover:bg-gray-50 rounded-2xl transition-all">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-[10px] font-black text-gray-400">{{ $log[0] }}</div>
                <div>
                    <p class="text-xs font-black text-gray-800 uppercase">{{ $log[2] }}</p>
                    <p class="text-[8px] font-bold text-blue-500 uppercase">{{ $log[1] }} • {{ $log[3] }}</p>
                </div>
            </div>
            <span class="px-3 py-1 rounded-lg text-[8px] font-black uppercase {{ $log[4] == 'Success' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">
                {{ $log[4] }}
            </span>
        </div>
        @endforeach
    </div>
</div>
@endsection