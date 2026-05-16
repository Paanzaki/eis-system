@extends('layouts.dashboard')

@section('content')

<div class="content-fluid space-y-8 pb-12">

    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Kawalan Akses (RBAC)
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">FB-EIS-MA-RB &mdash; Security Matrix & Role Management</p>
        </div>
        <div class="flex items-center gap-4">
            <div class="relative group">
                <input type="text" placeholder="CARI PENGGUNA..." 
                    class="bg-white border border-gray-200 py-3.5 px-6 rounded-[5px] text-[10px] font-black uppercase tracking-widest focus:ring-4 focus:ring-yellow-400/20 focus:border-yellow-400 outline-none shadow-sm w-64 lg:w-72 transition-all">
                <svg class="w-4 h-4 absolute right-5 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="3"/></svg>
            </div>
            <button class="bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3.5 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                + Peranan Baru
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
        @php
            $roles = [
                ['name' => 'Super Admin', 'users' => 2, 'color' => 'red-600', 'glow' => 'glow-red', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                ['name' => 'Pentadbir Sistem', 'users' => 14, 'color' => 'blue-600', 'glow' => 'glow-blue', 'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
                ['name' => 'Pegawai Operasi', 'users' => 8, 'color' => 'yellow-500', 'glow' => 'glow-yellow', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
            ];
        @endphp

        @foreach($roles as $r)
        <div class="role-card relative bg-white p-8 rounded-[5px] border border-gray-50 shadow-sm {{ $r['glow'] }} group overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-slate-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
            
            <div class="relative z-10 flex justify-between items-start">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 italic">{{ $r['name'] }}</p>
                    <div class="flex items-baseline gap-2">
                        <h4 class="text-4xl font-black text-[#1E3A8A] tracking-tighter">{{ $r['users'] }}</h4>
                        <span class="text-[9px] font-bold text-slate-300 uppercase">Akaun Aktif</span>
                    </div>
                </div>
                <div class="w-12 h-12 rounded-[5px] flex items-center justify-center bg-white shadow-inner border border-gray-50 group-hover:rotate-12 transition-transform">
                    <svg class="w-6 h-6 text-{{ $r['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="{{ $r['icon'] }}"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-6 h-1 w-12 rounded-full bg-{{ $r['color'] }} group-hover:w-full transition-all duration-500"></div>
        </div>
        @endforeach
    </div>

    <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
            <h4 class="text-[11px] font-black text-[#1E3A8A] uppercase tracking-widest italic">Senarai Kawalan Capaian Pengguna</h4>
            <span class="text-[8px] font-bold text-slate-400 uppercase">Dikemaskini: Hari Ini, 09:15 AM</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Profil Pengguna</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Tahap Capaian</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Modul Dibenarkan</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Konfigurasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 text-[11px]">
                    @foreach([
                        ['name' => 'Ahmad Farhan', 'role' => 'Super Admin', 'color' => 'red-600', 'bg' => 'bg-red-50', 'mods' => ['SEMUA MODUL', 'SISTEM']],
                        ['name' => 'Siti Nurhaliza', 'role' => 'Pentadbir Sistem', 'color' => 'blue-600', 'bg' => 'bg-blue-50', 'mods' => ['PEROLEHAN', 'ASET']],
                        ['name' => 'Zul Ariffin', 'role' => 'Pegawai Operasi', 'color' => 'yellow-500', 'bg' => 'bg-yellow-50', 'mods' => ['NAZIRAN', 'PENYELENGGARAAN']]
                    ] as $u)
                    <tr class="hover:bg-slate-50/80 transition-colors group">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-[5px] bg-[#1E3A8A] text-white flex items-center justify-center font-black shadow-lg">
                                    {{ substr($u['name'], 0, 2) }}
                                </div>
                                <div>
                                    <p class="font-black text-slate-700 uppercase tracking-tighter">{{ $u['name'] }}</p>
                                    <p class="text-[8px] font-bold text-green-500 uppercase italic">MyDigitalID Verified</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <span class="inline-block px-4 py-1.5 {{ $u['bg'] }} text-{{ $u['color'] }} rounded-[5px] font-black uppercase tracking-tighter border border-current opacity-80">
                                {{ $u['role'] }}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex flex-wrap justify-center gap-2">
                                @foreach($u['mods'] as $m)
                                <span class="px-3 py-1 bg-slate-100 text-slate-500 rounded-[5px] font-black text-[8px] border border-slate-200">{{ $m }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex justify-end gap-2">
                                <button class="p-2.5 bg-white border border-gray-100 rounded-[5px] text-slate-400 hover:text-blue-600 hover:shadow-md transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                                </button>
                                <button class="p-2.5 bg-white border border-gray-100 rounded-[5px] text-slate-400 hover:text-red-600 hover:shadow-md transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
