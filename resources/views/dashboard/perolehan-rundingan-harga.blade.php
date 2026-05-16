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
                Rundingan Terus / Harga
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-MP-RT &mdash; Pengurusan Perolehan Rundingan Terus PNS Selangor
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Daftar Rundingan Baharu
            </button>
            <button class="mini-export-btn mini-excel px-5 py-3 rounded-[5px] text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                Excel
            </button>
        </div>
    </div>

    {{-- ── Stats ── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Kes Rundingan Terus 2026','val'=>'38',       'sub'=>'Lulus kriteria had nilai'],
            ['label'=>'Nilai Kumulatif',          'val'=>'RM 4.12M', 'sub'=>'Tidak melebihi had RM 500K/kes'],
            ['label'=>'Sedang Dalam Proses',      'val'=>'9',        'sub'=>'Menunggu kelulusan JK'],
            ['label'=>'Selesai Dilaksana',        'val'=>'27',       'sub'=>'Pembekal telah dilantik'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-[5px] border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Table ── --}}
    <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-10 py-6 border-b border-gray-50">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Rekod Rundingan Terus 2026</h4>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Perolehan ≤ RM 500,000 mengikut SPP 2023</p>
        </div>
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">No. Rundingan</th>
                        <th>Tajuk Perolehan</th>
                        <th>Jabatan Memohon</th>
                        <th>Pembekal / Kontraktor</th>
                        <th>Nilai (RM)</th>
                        <th>Tarikh Mohon</th>
                        <th>Alasan Rundingan</th>
                        <th class="pr-10">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $rekods = [
                        ['no'=>'RT/2026/001','tajuk'=>'Perkhidmatan Penyelenggaraan Lif','jabatan'=>'Unit Pengurusan','pembekal'=>'Syarikat Lif Maju Sdn Bhd','nilai'=>48000,'tarikh'=>'05/01/2026','alasan'=>'Kepakaran khusus','status'=>'Selesai'],
                        ['no'=>'RT/2026/002','tajuk'=>'Perisian Pengurusan Fail Pejabat','jabatan'=>'Unit ICT PNS','pembekal'=>'DocuSoft Technologies Sdn Bhd','nilai'=>85000,'tarikh'=>'10/01/2026','alasan'=>'Proprietari tunggal','status'=>'Selesai'],
                        ['no'=>'RT/2026/003','tajuk'=>'Bekalan Ubatan Klinik Pejabat','jabatan'=>'Klinik Kesihatan','pembekal'=>'Medifarma Sdn Bhd','nilai'=>28500,'tarikh'=>'15/01/2026','alasan'=>'Had nilai rendah','status'=>'Selesai'],
                        ['no'=>'RT/2026/004','tajuk'=>'Perkhidmatan Keselamatan Bangunan','jabatan'=>'Pejabat SUK','pembekal'=>'Guardian Security Services Sdn Bhd','nilai'=>360000,'tarikh'=>'20/01/2026','alasan'=>'Pembaharuan kontrak sedia ada','status'=>'Selesai'],
                        ['no'=>'RT/2026/005','tajuk'=>'Penyenggaraan AC Bangunan Utama','jabatan'=>'Unit Pengurusan','pembekal'=>'CoolAir Maintenance Sdn Bhd','nilai'=>42000,'tarikh'=>'25/01/2026','alasan'=>'Had nilai rendah','status'=>'Dalam Proses'],
                        ['no'=>'RT/2026/006','tajuk'=>'Percetakan Dokumen Majlis Rasmi','jabatan'=>'Jabatan Protokol','pembekal'=>'Percetakan Wawasan Sdn Bhd','nilai'=>18500,'tarikh'=>'01/02/2026','alasan'=>'Had nilai rendah','status'=>'Dalam Proses'],
                        ['no'=>'RT/2026/007','tajuk'=>'Sistem Kawalan Akses Biometrik','jabatan'=>'Unit ICT PNS','pembekal'=>'SecureGate Technologies Sdn Bhd','nilai'=>495000,'tarikh'=>'08/02/2026','alasan'=>'Kepakaran khusus','status'=>'Kelulusan JK'],
                        ['no'=>'RT/2026/008','tajuk'=>'Khidmat Nasihat Kesihatan Pejabat','jabatan'=>'Unit HRD PNS','pembekal'=>'Wellness Corporate Sdn Bhd','nilai'=>24000,'tarikh'=>'15/02/2026','alasan'=>'Had nilai rendah','status'=>'Dalam Proses'],
                    ];
                    $statusMap = ['Selesai'=>'badge-green','Dalam Proses'=>'badge-amber','Kelulusan JK'=>'badge-blue','Ditolak'=>'badge-red'];
                    @endphp
                    @foreach($rekods as $r)
                    <tr>
                        <td class="pl-10 font-black text-[11px] text-[#1E3A8A]">{{ $r['no'] }}</td>
                        <td class="text-[11px] font-black text-[#1E293B]">{{ $r['tajuk'] }}</td>
                        <td class="text-[11px] text-slate-600">{{ $r['jabatan'] }}</td>
                        <td class="text-[11px] text-slate-600">{{ $r['pembekal'] }}</td>
                        <td class="text-[11px] font-black {{ $r['nilai'] > 400000 ? 'text-amber-600' : 'text-[#1E3A8A]' }}">RM {{ number_format($r['nilai']) }}</td>
                        <td class="text-[11px] text-slate-400 font-bold">{{ $r['tarikh'] }}</td>
                        <td><span class="badge badge-purple">{{ $r['alasan'] }}</span></td>
                        <td class="pr-10"><span class="badge {{ $statusMap[$r['status']] ?? 'badge-gray' }}">{{ $r['status'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
