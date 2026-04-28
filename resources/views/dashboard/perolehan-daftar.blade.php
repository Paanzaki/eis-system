@extends('layouts.dashboard')

@section('content')
<div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-1">
        <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">User <span class="text-blue-500">Registration.</span></h3>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Pendaftaran Pengguna & Integrasi MyDigitalID (SSO)</p>
    </div>
    <div class="flex gap-2 text-[9px] font-black uppercase">
        <div class="px-4 py-2 bg-blue-50 text-blue-600 rounded-xl border border-blue-100 flex items-center gap-2">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-width="2"/></svg>
            SSO Gateway Active
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex items-center gap-6 group hover:border-blue-200 transition-all">
        <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 shadow-inner group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-width="2"/></svg>
        </div>
        <div>
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Kuota Pengguna</p>
            <h4 class="text-2xl font-black text-[#1E3A8A]">84 / 150</h4>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm flex items-center gap-6">
        <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 shadow-inner">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"/></svg>
        </div>
        <div>
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">MyDigitalID Sync</p>
            <h4 class="text-2xl font-black text-[#1E3A8A]">100% <span class="text-[9px] text-green-500 italic uppercase">Secure</span></h4>
        </div>
    </div>

    <div class="bg-blue-600 p-8 rounded-[2.5rem] shadow-xl shadow-blue-100 text-white flex flex-col justify-center">
        <p class="text-[9px] font-bold opacity-60 uppercase tracking-[0.2em] mb-1 italic">Last Registered</p>
        <p class="text-xs font-black uppercase">Farhan Zaki — IT Dept</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 bg-white p-12 rounded-[3.5rem] border border-gray-100 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 p-8 opacity-5">
            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
        </div>
        
        <form class="space-y-8" @submit.prevent="alert('Demo: Request sent to Admin for approval.')">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-2 tracking-widest">Nama Penuh (Ikut MyKad)</label>
                    <input type="text" placeholder="Cth: MUHAMMAD FARHAN..." class="w-full bg-gray-50 border-none rounded-2xl p-5 text-xs font-bold outline-none focus:ring-2 focus:ring-blue-100 transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-2 tracking-widest">ID MyDigitalID</label>
                    <div class="relative">
                        <input type="text" placeholder="MY-99210-XXXX" class="w-full bg-gray-50 border-none rounded-2xl p-5 text-xs font-bold outline-none pr-12">
                        <svg class="w-4 h-4 text-green-500 absolute right-5 top-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"/></svg>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-2 tracking-widest">Jabatan / Bahagian</label>
                    <select class="w-full bg-gray-50 border-none rounded-2xl p-5 text-xs font-bold appearance-none outline-none">
                        <option>Bahagian Teknologi Maklumat (BTM)</option>
                        <option>Unit Kewangan & Strategi</option>
                        <option>Pejabat Perbendaharaan Negeri</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-2 tracking-widest">Peranan Sistem (RBAC)</label>
                    <select class="w-full bg-gray-50 border-none rounded-2xl p-5 text-xs font-bold appearance-none outline-none">
                        <option>Eksekutif (View & Report)</option>
                        <option>Pentadbir (CRUD Access)</option>
                        <option>Pegawai Naziran</option>
                    </select>
                </div>
            </div>

            <div class="p-6 bg-blue-50/50 rounded-[2rem] border border-blue-50 space-y-3">
                <div class="flex items-center gap-3">
                    <input type="checkbox" class="rounded text-[#1E3A8A] focus:ring-[#1E3A8A]">
                    <p class="text-[9px] font-bold text-gray-500 uppercase leading-relaxed">Saya mengaku maklumat di atas adalah benar dan mematuhi polisi kerahsiaan data PNS Selangor.</p>
                </div>
            </div>

            <button class="w-full py-6 bg-[#1E3A8A] text-white rounded-2xl text-[11px] font-black uppercase tracking-[0.3em] shadow-xl shadow-blue-100 hover:scale-[1.01] transition-transform">Daftar Pengguna Baru</button>
        </form>
    </div>

    <div class="space-y-6">
        <div class="bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm">
            <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-widest mb-8 italic">Senarai Menunggu</h4>
            <div class="space-y-6">
                @foreach([
                    ['Ahmad Albab', 'BTM', '2m ago'],
                    ['Siti Nurhaliza', 'Kewangan', '1h ago'],
                    ['Zaquan Adha', 'Naziran', '3h ago']
                ] as $user)
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-[10px] font-black text-gray-400">{{ substr($user[0], 0, 1) }}</div>
                    <div class="flex-1">
                        <p class="text-[10px] font-black text-gray-800 uppercase leading-tight">{{ $user[0] }}</p>
                        <p class="text-[8px] font-bold text-blue-500 uppercase">{{ $user[1] }}</p>
                    </div>
                    <span class="text-[8px] font-black text-gray-300 uppercase italic">{{ $user[2] }}</span>
                </div>
                @endforeach
            </div>
            <button class="w-full mt-10 py-4 bg-gray-50 text-gray-400 text-[9px] font-black uppercase tracking-widest rounded-xl hover:bg-gray-100 transition-all">Lihat Semua Permohonan</button>
        </div>

        <div class="bg-[#1E3A8A] p-8 rounded-[2.5rem] text-white">
            <h4 class="text-[10px] font-bold opacity-60 uppercase tracking-widest mb-4 italic">Security Note</h4>
            <p class="text-[10px] font-bold leading-relaxed uppercase tracking-tighter italic">Pendaftaran ini memerlukan pengesahan Biometrik melalui aplikasi MyDigitalID pada peranti mudah alih pegawai.</p>
        </div>
    </div>
</div>
@endsection