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
                Pelaksanaan Perolehan
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-MP-PR &mdash; Pemantauan Proses Perolehan Bersepadu
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Rekod Perolehan Baharu
            </button>
            <button class="mini-export-btn mini-excel px-5 py-3 rounded-[5px] text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                Excel
            </button>
        </div>
    </div>

    {{-- ── Pipeline Status Cards ── --}}
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        @foreach([
            ['label'=>'Diterima',         'val'=>'9',  'color'=>'blue'],
            ['label'=>'Penilaian',         'val'=>'4',  'color'=>'amber'],
            ['label'=>'Kelulusan JK',      'val'=>'3',  'color'=>'purple'],
            ['label'=>'Tawaran Dikeluarkan','val'=>'6', 'color'=>'green'],
            ['label'=>'Ditolak / Batal',   'val'=>'2',  'color'=>'red'],
        ] as $s)
        <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm p-5 text-center">
            <p class="text-3xl font-black text-[#1E3A8A]">{{ $s['val'] }}</p>
            <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mt-1">{{ $s['label'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Perolehan Table ── --}}
    <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-10 py-6 border-b border-gray-50 flex items-center justify-between">
            <div>
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Senarai Pelaksanaan Perolehan 2026</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">24 rekod aktif dalam sistem</p>
            </div>
            <div class="flex gap-3">
                <select class="bg-gray-50 border border-gray-200 py-2.5 px-4 rounded-[5px] text-[10px] font-black uppercase outline-none cursor-pointer">
                    <option>Semua Kaedah</option>
                    <option>Tender Terbuka</option>
                    <option>Sebut Harga</option>
                    <option>Rundingan Terus</option>
                </select>
                <select class="bg-gray-50 border border-gray-200 py-2.5 px-4 rounded-[5px] text-[10px] font-black uppercase outline-none cursor-pointer">
                    <option>Semua Status</option>
                    <option>Diterima</option>
                    <option>Dalam Penilaian</option>
                    <option>Kelulusan JK</option>
                    <option>Tawaran Dikeluarkan</option>
                    <option>Ditolak</option>
                </select>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">No. Perolehan</th>
                        <th>Tajuk Perolehan</th>
                        <th>Jabatan Memohon</th>
                        <th>Kaedah</th>
                        <th>Nilai (RM)</th>
                        <th>Tarikh Mohon</th>
                        <th>Pegawai</th>
                        <th class="pr-10">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $rekods = [
                        ['no'=>'PER/2026/0031','tajuk'=>'Bekalan Toner & Cartridge Q2','jabatan'=>'Unit Pengurusan PNS','kaedah'=>'Sebut Harga','nilai'=>18500,'tarikh'=>'02/01/2026','pegawai'=>'Faridah Ismail','status'=>'Tawaran Dikeluarkan'],
                        ['no'=>'PER/2026/0032','tajuk'=>'Perkhidmatan Pembersihan Pejabat','jabatan'=>'Pejabat SUK Selangor','kaedah'=>'Rundingan Terus','nilai'=>96000,'tarikh'=>'05/01/2026','pegawai'=>'Hafiz Ramli','status'=>'Tawaran Dikeluarkan'],
                        ['no'=>'PER/2026/0033','tajuk'=>'Sistem Pengurusan Dokumen Elektronik','jabatan'=>'Unit ICT PNS','kaedah'=>'Tender Terbuka','nilai'=>1250000,'tarikh'=>'10/01/2026','pegawai'=>'Faridah Ismail','status'=>'Kelulusan JK'],
                        ['no'=>'PER/2026/0034','tajuk'=>'Bekalan Kertas A4 & Alat Tulis','jabatan'=>'Perbendaharaan Negeri Selangor','kaedah'=>'Sebut Harga','nilai'=>12800,'tarikh'=>'12/01/2026','pegawai'=>'Iskandar Yusof','status'=>'Tawaran Dikeluarkan'],
                        ['no'=>'PER/2026/0035','tajuk'=>'Naik Taraf Sistem CCTV','jabatan'=>'Jabatan Audit Selangor','kaedah'=>'Sebut Harga','nilai'=>85000,'tarikh'=>'15/01/2026','pegawai'=>'Hafiz Ramli','status'=>'Dalam Penilaian'],
                        ['no'=>'PER/2026/0036','tajuk'=>'Perkhidmatan Penyenggaraan Lif','jabatan'=>'Jabatan Kerja Raya','kaedah'=>'Rundingan Terus','nilai'=>48000,'tarikh'=>'18/01/2026','pegawai'=>'Faridah Ismail','status'=>'Diterima'],
                        ['no'=>'PER/2026/0037','tajuk'=>'Perolehan Peralatan Makmal','jabatan'=>'Jabatan Sains Selangor','kaedah'=>'Tender Terbuka','nilai'=>780000,'tarikh'=>'20/01/2026','pegawai'=>'Iskandar Yusof','status'=>'Diterima'],
                        ['no'=>'PER/2026/0038','tajuk'=>'Khidmat Audit Sistem ICT','jabatan'=>'Unit ICT PNS','kaedah'=>'Rundingan Terus','nilai'=>95000,'tarikh'=>'22/01/2026','pegawai'=>'Hafiz Ramli','status'=>'Dalam Penilaian'],
                        ['no'=>'PER/2026/0039','tajuk'=>'Bekalan Uniform Petugas','jabatan'=>'Unit HRD PNS','kaedah'=>'Sebut Harga','nilai'=>32500,'tarikh'=>'25/01/2026','pegawai'=>'Faridah Ismail','status'=>'Ditolak'],
                        ['no'=>'PER/2026/0040','tajuk'=>'Percetakan Dokumen Rasmi 2026','jabatan'=>'Perbendaharaan Negeri Selangor','kaedah'=>'Sebut Harga','nilai'=>15000,'tarikh'=>'28/01/2026','pegawai'=>'Iskandar Yusof','status'=>'Tawaran Dikeluarkan'],
                    ];
                    $statusMap = ['Tawaran Dikeluarkan'=>'badge-green','Kelulusan JK'=>'badge-purple','Dalam Penilaian'=>'badge-amber','Diterima'=>'badge-blue','Ditolak'=>'badge-red','Batal'=>'badge-red'];
                    @endphp
                    @foreach($rekods as $r)
                    <tr>
                        <td class="pl-10 font-black text-[11px] text-[#1E3A8A]">{{ $r['no'] }}</td>
                        <td class="text-[11px] font-black text-[#1E293B]">{{ $r['tajuk'] }}</td>
                        <td class="text-[11px] text-slate-600">{{ $r['jabatan'] }}</td>
                        <td><span class="badge badge-gray">{{ $r['kaedah'] }}</span></td>
                        <td class="text-[11px] font-black text-slate-700">RM {{ number_format($r['nilai']) }}</td>
                        <td class="text-[11px] text-slate-400 font-bold">{{ $r['tarikh'] }}</td>
                        <td class="text-[11px] text-slate-600">{{ $r['pegawai'] }}</td>
                        <td class="pr-10">
                            <span class="badge {{ $statusMap[$r['status']] ?? 'badge-gray' }}">{{ $r['status'] }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
