@extends('layouts.dashboard')

@section('content')
<div class="content-fluid space-y-8 pb-12">

    {{-- ── Page Header ── --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Senarai Inventori <span class="text-red-600">Aset.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-AS-DA &mdash; Daftar Harta Modal & Aset Rendah Nilai
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Daftar Aset Baharu
            </button>
            <button class="mini-export-btn mini-excel px-5 py-3 rounded-xl text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                Excel
            </button>
        </div>
    </div>

    {{-- ── Stats ── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Jumlah Aset',      'val'=>'12,402', 'sub'=>'Harta modal & aset rendah',   'color'=>'blue'],
            ['label'=>'Harta Modal',       'val'=>'8,433',  'sub'=>'Nilai buku: RM 142.8M',       'color'=>'green'],
            ['label'=>'Aset Rendah Nilai', 'val'=>'3,969',  'sub'=>'Nilai buku: RM 18.4M',        'color'=>'amber'],
            ['label'=>'Perlu Tindakan',    'val'=>'231',    'sub'=>'Hilang / Rosak / Dalam semak', 'color'=>'red'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-2xl border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Filters ── --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <svg class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2.5"/>
                </svg>
                <input type="text" placeholder="Cari no. siri, keterangan atau jabatan..."
                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-[11px] font-bold outline-none focus:border-[#1E3A8A] focus:bg-white transition-all">
            </div>
            <select class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
                <option>Semua Kategori</option>
                <option>Harta Modal</option>
                <option>Aset Rendah Nilai</option>
            </select>
            <select class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
                <option>Semua Status</option>
                <option>Aktif</option>
                <option>Penyenggaraan</option>
                <option>Hilang</option>
                <option>Dilupuskan</option>
            </select>
            <select class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
                <option>Semua Jabatan</option>
                <option>Unit ICT PNS</option>
                <option>Jabatan Audit</option>
                <option>Unit Kewangan</option>
                <option>Pejabat SUK</option>
            </select>
        </div>
    </div>

    {{-- ── Assets Table ── --}}
    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-10 py-6 border-b border-gray-50">
            <div>
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Rekod Inventori Aset 2026</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Menunjukkan 10 daripada 12,402 rekod</p>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">No. Siri Pendaftaran</th>
                        <th>Keterangan Aset</th>
                        <th>Kategori</th>
                        <th>Jabatan / Lokasi</th>
                        <th>Tarikh Daftar</th>
                        <th>Nilai Perolehan (RM)</th>
                        <th>Nilai Buku (RM)</th>
                        <th>Status</th>
                        <th class="pr-10">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $assets = [
                        ['siri'=>'PNS/ICT/2026/001','nama'=>'Laptop Dell Latitude 5520','kat'=>'Harta Modal','jabatan'=>'Unit ICT PNS','tarikh'=>'03/01/2026','harga'=>6800,'buku'=>6460,'status'=>'Aktif'],
                        ['siri'=>'PNS/KND/2026/001','nama'=>'Kenderaan Proton X70 (BQC 1234)','kat'=>'Harta Modal','jabatan'=>'Pejabat SUK Selangor','tarikh'=>'05/01/2026','harga'=>145000,'buku'=>132000,'status'=>'Aktif'],
                        ['siri'=>'PNS/ICT/2026/002','nama'=>'Monitor 27" LG UltraWide','kat'=>'Harta Modal','jabatan'=>'Unit Kewangan','tarikh'=>'08/01/2026','harga'=>2800,'buku'=>2660,'status'=>'Aktif'],
                        ['siri'=>'PNS/PJBT/2026/001','nama'=>'Kerusi Ergonomik Steelcase Series 1','kat'=>'Aset Rendah Nilai','jabatan'=>'Unit Pengurusan','tarikh'=>'10/01/2026','harga'=>1450,'buku'=>1378,'status'=>'Aktif'],
                        ['siri'=>'PNS/ICT/2026/003','nama'=>'Telefon IP Cisco CP-8851','kat'=>'Aset Rendah Nilai','jabatan'=>'Unit Perolehan','tarikh'=>'12/01/2026','harga'=>980,'buku'=>931,'status'=>'Aktif'],
                        ['siri'=>'PNS/ICT/2026/004','nama'=>'Pencetak HP LaserJet Pro M404dn','kat'=>'Harta Modal','jabatan'=>'Jabatan Audit Selangor','tarikh'=>'15/01/2026','harga'=>3200,'buku'=>3040,'status'=>'Penyenggaraan'],
                        ['siri'=>'PNS/ICT/2026/005','nama'=>'Tablet Samsung Galaxy Tab S8','kat'=>'Aset Rendah Nilai','jabatan'=>'Unit Naziran','tarikh'=>'18/01/2026','harga'=>3400,'buku'=>3230,'status'=>'Aktif'],
                        ['siri'=>'PNS/PJBT/2026/002','nama'=>'Almari Besi 4 Laci Bisley','kat'=>'Harta Modal','jabatan'=>'Unit HRD PNS','tarikh'=>'20/01/2026','harga'=>1800,'buku'=>1710,'status'=>'Aktif'],
                        ['siri'=>'PNS/ICT/2026/006','nama'=>'UPS APC 1500VA','kat'=>'Harta Modal','jabatan'=>'Unit ICT PNS','tarikh'=>'22/01/2026','harga'=>1250,'buku'=>1188,'status'=>'Aktif'],
                        ['siri'=>'PNS/LAB/2026/001','nama'=>'Kamera Digital Canon EOS M50','kat'=>'Harta Modal','jabatan'=>'Jabatan Sains','tarikh'=>'25/01/2026','harga'=>4200,'buku'=>0,'status'=>'Hilang'],
                    ];
                    $statusMap = ['Aktif'=>'badge-green','Penyenggaraan'=>'badge-amber','Hilang'=>'badge-red','Dilupuskan'=>'badge-gray'];
                    @endphp
                    @foreach($assets as $a)
                    <tr>
                        <td class="pl-10 font-black text-[11px] text-[#1E3A8A]">{{ $a['siri'] }}</td>
                        <td class="text-[11px] font-black text-[#1E293B]">{{ $a['nama'] }}</td>
                        <td><span class="badge badge-blue">{{ $a['kat'] }}</span></td>
                        <td class="text-[11px] text-slate-600">{{ $a['jabatan'] }}</td>
                        <td class="text-[11px] text-slate-400 font-bold">{{ $a['tarikh'] }}</td>
                        <td class="text-[11px] font-bold text-slate-600">RM {{ number_format($a['harga']) }}</td>
                        <td class="text-[11px] font-black {{ $a['buku'] === 0 ? 'text-red-500' : 'text-[#1E3A8A]' }}">
                            {{ $a['buku'] > 0 ? 'RM ' . number_format($a['buku']) : '—' }}
                        </td>
                        <td><span class="badge {{ $statusMap[$a['status']] ?? 'badge-gray' }}">{{ $a['status'] }}</span></td>
                        <td class="pr-10">
                            <div class="flex items-center gap-2">
                                <button class="p-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600 transition-all" title="Lihat">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2"/></svg>
                                </button>
                                <button class="p-1.5 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-600 transition-all" title="Edit">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2"/></svg>
                                </button>
                                <button class="p-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-red-500 transition-all" title="Hapus">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between px-10 py-5 border-t border-gray-50 bg-gray-50/30">
            <p class="text-[9px] font-bold text-slate-400 uppercase">Menunjukkan 10 daripada 12,402 rekod inventori</p>
            <div class="flex gap-2">
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-[9px] font-black uppercase text-slate-400 hover:border-[#1E3A8A] transition-all">Sebelumnya</button>
                <button class="px-4 py-2 bg-[#1E3A8A] text-white rounded-xl text-[9px] font-black uppercase shadow-sm">1</button>
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-[9px] font-black uppercase text-slate-400 hover:border-[#1E3A8A] transition-all">2</button>
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-[9px] font-black uppercase text-slate-400 hover:border-[#1E3A8A] transition-all">Seterusnya</button>
            </div>
        </div>
    </div>

</div>
@endsection
