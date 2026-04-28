@extends('layouts.dashboard')

@section('content')
<div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-1">
        <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">Security <span class="text-blue-500">Audit.</span></h3>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Jejak Audit & Log Keselamatan Transaksi PNS</p>
    </div>
    <div class="flex gap-2">
        <button onclick="alert('Downloading Security Log PDF...')" class="bg-white border border-gray-100 px-6 py-3 rounded-xl text-[9px] font-black uppercase tracking-widest shadow-sm hover:bg-gray-50 transition-all">Download Audit Trail</button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex items-center gap-6">
        <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 shadow-inner">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2"/></svg>
        </div>
        <div>
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Aktiviti (24j)</p>
            <h4 class="text-2xl font-black text-[#1E3A8A]">1,242 <span class="text-[9px] text-blue-400 italic">LOGS</span></h4>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex items-center gap-6">
        <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-500 shadow-inner">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2"/></svg>
        </div>
        <div>
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Pindaan Data</p>
            <h4 class="text-2xl font-black text-[#1E3A8A]">42 <span class="text-[9px] text-orange-400 italic">UPDATES</span></h4>
        </div>
    </div>

    <div class="bg-red-50 p-8 rounded-[2.5rem] border border-red-100 flex items-center gap-6 group hover:bg-red-100 transition-all">
        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-red-500 shadow-sm group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-width="2.5"/></svg>
        </div>
        <div>
            <p class="text-[10px] font-black text-red-400 uppercase tracking-widest">Failed Logins</p>
            <h4 class="text-2xl font-black text-red-600">3 <span class="text-[9px] text-red-400 italic italic tracking-tight italic">ATTEMPTS</span></h4>
        </div>
    </div>
</div>

<div class="bg-white rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden">
    <div class="p-8 border-b border-gray-50 flex justify-between items-center">
        <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-widest italic">Recent System Transactions</h4>
        <div class="flex gap-2">
            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[8px] font-black rounded-lg uppercase">Live Updates</span>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50/50">
                    <th class="px-10 py-6 text-[10px] font-black text-gray-400 uppercase">Timestamp</th>
                    <th class="px-10 py-6 text-[10px] font-black text-gray-400 uppercase">Pengguna (MyDigitalID)</th>
                    <th class="px-10 py-6 text-[10px] font-black text-gray-400 uppercase">Tindakan / Event</th>
                    <th class="px-10 py-6 text-[10px] font-black text-gray-400 uppercase text-right">IP Address</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-[11px] font-bold">
                @foreach([
                    ['28 Apr, 09:15 AM', 'Farhan Zaki', 'Pendaftaran Aset Baru: PNS/ICT/992', '10.22.1.45', 'text-blue-500'],
                    ['28 Apr, 08:42 AM', 'Siti Aminah', 'Pindaan Peruntukan Kontrak: PNS/TND/02', '10.22.1.102', 'text-orange-500'],
                    ['28 Apr, 07:10 AM', 'System AI', 'Auto-Cleansing Data Migration: Excel_Legacy', '127.0.0.1', 'text-green-500'],
                    ['27 Apr, 11:55 PM', 'Unknown', 'Failed Login Attempt: root_admin', '192.168.0.12', 'text-red-500'],
                    ['27 Apr, 04:30 PM', 'Pegawai Aset 01', 'Cetak Laporan Suku Tahun JKPAK (PDF)', '10.22.2.14', 'text-gray-400']
                ] as $log)
                <tr class="hover:bg-gray-50/50 transition-all">
                    <td class="px-10 py-8 text-gray-400 italic">{{ $log[0] }}</td>
                    <td class="px-10 py-8">
                        <div class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 rounded-full {{ str_replace('text', 'bg', $log[4]) }}"></div>
                            <span class="text-[#1E3A8A] uppercase">{{ $log[1] }}</span>
                        </div>
                    </td>
                    <td class="px-10 py-8 text-gray-600">"{{ $log[2] }}"</td>
                    <td class="px-10 py-8 text-right text-gray-300 font-mono text-[9px]">{{ $log[3] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection