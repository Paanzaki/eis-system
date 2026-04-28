@extends('layouts.dashboard')

@section('content')
<div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-1">
        <h3 class="text-3xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">Official <span class="text-blue-500">Appointment.</span></h3>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">Pelantikan Pegawai Pemeriksa & Jawatankuasa Siasatan Aset</p>
    </div>
    <div class="flex gap-2">
        <button class="px-6 py-3 bg-white border border-gray-100 rounded-xl text-[9px] font-black text-gray-400 uppercase tracking-widest shadow-sm">Senarai Pegawai Aktif</button>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 bg-white rounded-[3.5rem] border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center">
            <h4 class="text-[11px] font-black text-gray-400 uppercase tracking-widest italic">Surat Pelantikan Aktif</h4>
            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[8px] font-black rounded-lg uppercase italic">Official</span>
        </div>
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50/50 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                    <th class="px-10 py-6">Nama Pegawai</th>
                    <th class="px-10 py-6">Jenis Pelantikan</th>
                    <th class="px-10 py-6">Tempoh Sah</th>
                    <th class="px-10 py-6 text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-[11px] font-bold uppercase">
                @foreach([
                    ['Mohamad Zaki Bin Razak', 'Pemeriksa Aset', '2026 - 2027', 'Active'],
                    ['Noraini Binti Ahmad', 'JK Siasatan (Loss)', 'Sekali Guna', 'Active'],
                    ['Shahrul Izzwan', 'Pegawai Verifikasi', '2026 - 2027', 'Expired']
                ] as $p)
                <tr class="hover:bg-gray-50/50 transition-all">
                    <td class="px-10 py-8 text-[#1E3A8A] font-black">{{ $p[0] }}</td>
                    <td class="px-10 py-8 text-gray-400">{{ $p[1] }}</td>
                    <td class="px-10 py-8 text-gray-300 italic">{{ $p[2] }}</td>
                    <td class="px-10 py-8 text-right">
                        <span class="px-3 py-1 rounded-lg text-[8px] font-black {{ $p[3] == 'Active' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">
                            {{ $p[3] }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white p-10 rounded-[3.5rem] border border-gray-100 shadow-sm flex flex-col">
        <h4 class="text-[11px] font-black text-[#1E3A8A] uppercase tracking-[0.2em] mb-10">Jana Pelantikan Baru</h4>
        <div class="space-y-6 flex-1">
            <div class="space-y-2">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Cari Pegawai (SSO)</label>
                <input type="text" placeholder="Masukkan Nama / IC..." class="w-full bg-gray-50 border-none rounded-xl p-4 text-xs font-bold outline-none">
            </div>
            <div class="space-y-2">
                <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Kategori Tugas</label>
                <select class="w-full bg-gray-50 border-none rounded-xl p-4 text-xs font-bold outline-none">
                    <option>Lembaga Pemeriksa (Pelupusan)</option>
                    <option>JK Siasatan (Kehilangan)</option>
                </select>
            </div>
        </div>
        <button class="mt-10 w-full py-5 bg-[#1E3A8A] text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] shadow-xl shadow-blue-100">Hantar Surat (Digital)</button>
        <p class="text-[8px] font-bold text-gray-300 uppercase text-center mt-6 italic italic">Sistem akan menghantar notifikasi MyDigitalID kepada pegawai.</p>
    </div>
</div>
@endsection