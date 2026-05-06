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
                Kehilangan & Hapus <span class="text-red-600">Kira.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-AS-HK &mdash; Siasatan Kehilangan & Tindakan Hapus Kira Aset
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-width="2"/></svg>
                Lapor Kehilangan
            </button>
            <button class="mini-export-btn mini-pdf px-5 py-3 rounded-xl text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg>
                PDF
            </button>
        </div>
    </div>

    {{-- ── Alert Banner ── --}}
    <div class="bg-red-50 border border-red-200 rounded-2xl px-8 py-5 flex items-center gap-4">
        <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-width="2"/>
            </svg>
        </div>
        <div>
            <p class="text-[11px] font-black text-red-700 uppercase tracking-widest">Peringatan Kritikal</p>
            <p class="text-[11px] text-red-600 font-bold mt-0.5">
                Terdapat <strong>5 kes kehilangan</strong> yang masih dalam siasatan melebihi 90 hari. Sila ambil tindakan segera bersama Pegawai Penyiasat yang berkenaan.
            </p>
        </div>
    </div>

    {{-- ── KPI Stats ── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Kes Dilaporkan 2026',   'val'=>'23',       'sub'=>'Sejak 01 Januari 2026',         'color'=>'red'],
            ['label'=>'Dalam Siasatan',         'val'=>'9',        'sub'=>'5 melebihi 90 hari',            'color'=>'amber'],
            ['label'=>'Dihapus Kira',           'val'=>'11',       'sub'=>'Diluluskan oleh pihak berkuasa','color'=>'blue'],
            ['label'=>'Nilai Kehilangan',       'val'=>'RM 187K',  'sub'=>'Kumulatif nilai buku aset',     'color'=>'red'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-2xl border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Main Table ── --}}
    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-10 py-6 border-b border-gray-50 flex items-center justify-between">
            <div>
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Rekod Kehilangan & Hapus Kira Aset</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">23 kes dilaporkan sepanjang tahun 2026</p>
            </div>
            <select class="bg-gray-50 border border-gray-200 py-2.5 px-4 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
                <option>Semua Status</option>
                <option>Dalam Siasatan</option>
                <option>Siasatan Selesai</option>
                <option>Dihapus Kira</option>
            </select>
        </div>

        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">No. Kes</th>
                        <th>No. Siri Aset</th>
                        <th>Keterangan Aset</th>
                        <th>Jabatan</th>
                        <th>Nilai Buku (RM)</th>
                        <th>Tarikh Laporan</th>
                        <th>Pegawai Penyiasat</th>
                        <th>Tempoh Siasatan</th>
                        <th class="pr-10">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $kes = [
                        ['no'=>'KHL/2026/001','siri'=>'PNS/ICT/048','aset'=>'Laptop Lenovo ThinkPad E490','jabatan'=>'Unit Perolehan','nilai'=>4800,'tarikh'=>'03/01/2026','penyiasat'=>'Ahmad Fadzil bin Kamaruddin','hari'=>124,'status'=>'Dihapus Kira'],
                        ['no'=>'KHL/2026/002','siri'=>'PNS/LAB/003','aset'=>'Kamera Digital Canon EOS M50','jabatan'=>'Jabatan Sains','nilai'=>3200,'tarikh'=>'10/01/2026','penyiasat'=>'Zulkifli bin Omar','hari'=>117,'status'=>'Dihapus Kira'],
                        ['no'=>'KHL/2026/003','siri'=>'PNS/ICT/072','aset'=>'Tablet Samsung Galaxy Tab A8','jabatan'=>'Jabatan Audit','nilai'=>1850,'tarikh'=>'15/01/2026','penyiasat'=>'Ahmad Fadzil bin Kamaruddin','hari'=>112,'status'=>'Siasatan Selesai'],
                        ['no'=>'KHL/2026/004','siri'=>'PNS/PRN/019','aset'=>'Mesin Fax Panasonic KX-FT987','jabatan'=>'Unit Kewangan','nilai'=>680,'tarikh'=>'20/01/2026','penyiasat'=>'Zulkifli bin Omar','hari'=>107,'status'=>'Dihapus Kira'],
                        ['no'=>'KHL/2026/005','siri'=>'PNS/ICT/088','aset'=>'Monitor 27" BenQ GW2780','jabatan'=>'Unit HRD','nilai'=>1100,'tarikh'=>'28/01/2026','penyiasat'=>'Nurul Ain binti Abdul Wahab','hari'=>99,'status'=>'Dalam Siasatan'],
                        ['no'=>'KHL/2026/006','siri'=>'PNS/KDR/038','aset'=>'Kalkulator Casio FC-200V','jabatan'=>'Unit Kewangan','nilai'=>285,'tarikh'=>'05/02/2026','penyiasat'=>'Zulkifli bin Omar','hari'=>91,'status'=>'Dalam Siasatan'],
                        ['no'=>'KHL/2026/007','siri'=>'PNS/ICT/101','aset'=>'Telefon IP Cisco CP-8811','jabatan'=>'Jabatan Audit','nilai'=>620,'tarikh'=>'12/02/2026','penyiasat'=>'Ahmad Fadzil bin Kamaruddin','hari'=>84,'status'=>'Dalam Siasatan'],
                        ['no'=>'KHL/2026/008','siri'=>'PNS/LAB/011','aset'=>'Skrin Projektor 120"','jabatan'=>'Unit HRD','nilai'=>1400,'tarikh'=>'20/02/2026','penyiasat'=>'Nurul Ain binti Abdul Wahab','hari'=>76,'status'=>'Dihapus Kira'],
                        ['no'=>'KHL/2026/009','siri'=>'PNS/ICT/115','aset'=>'Pemacu Keras Luaran 2TB','jabatan'=>'Unit ICT PNS','nilai'=>380,'tarikh'=>'01/03/2026','penyiasat'=>'Zulkifli bin Omar','hari'=>67,'status'=>'Dalam Siasatan'],
                        ['no'=>'KHL/2026/010','siri'=>'PNS/PRN/025','aset'=>'Pencetak HP Color LaserJet Pro','jabatan'=>'Jabatan Kewangan','nilai'=>2800,'tarikh'=>'10/03/2026','penyiasat'=>'Ahmad Fadzil bin Kamaruddin','hari'=>58,'status'=>'Dalam Siasatan'],
                    ];
                    @endphp
                    @foreach($kes as $k)
                    <tr>
                        <td class="pl-10 font-black text-[11px] text-red-600">{{ $k['no'] }}</td>
                        <td class="text-[11px] font-bold text-slate-500">{{ $k['siri'] }}</td>
                        <td class="text-[11px] font-black text-[#1E293B]">{{ $k['aset'] }}</td>
                        <td class="text-[11px] text-slate-600">{{ $k['jabatan'] }}</td>
                        <td class="text-[11px] font-black text-red-600">RM {{ number_format($k['nilai']) }}</td>
                        <td class="text-[11px] text-slate-400 font-bold">{{ $k['tarikh'] }}</td>
                        <td class="text-[11px] text-slate-600">{{ $k['penyiasat'] }}</td>
                        <td>
                            <span class="badge {{ $k['hari'] > 90 ? 'badge-red' : ($k['hari'] > 60 ? 'badge-amber' : 'badge-gray') }}">
                                {{ $k['hari'] }} Hari
                            </span>
                        </td>
                        <td class="pr-10">
                            <span class="badge {{ $k['status']==='Dihapus Kira' ? 'badge-blue' : ($k['status']==='Siasatan Selesai' ? 'badge-green' : 'badge-red') }}">
                                {{ $k['status'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- ── Siasatan Timeline ── --}}
    <div class="section-divider">Garis Masa Siasatan Aktif</div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $aktif = [
            ['no'=>'KHL/2026/005','aset'=>'Monitor 27" BenQ GW2780','penyiasat'=>'Nurul Ain binti Abdul Wahab','hari'=>99,'langkah'=>[
                ['label'=>'Laporan Diterima','selesai'=>true,'tarikh'=>'28/01/2026'],
                ['label'=>'Siasatan Dimulakan','selesai'=>true,'tarikh'=>'30/01/2026'],
                ['label'=>'Temu Bual Saksi','selesai'=>true,'tarikh'=>'10/02/2026'],
                ['label'=>'Laporan Awal','selesai'=>false,'tarikh'=>'—'],
                ['label'=>'Keputusan & Hapus Kira','selesai'=>false,'tarikh'=>'—'],
            ]],
            ['no'=>'KHL/2026/006','aset'=>'Kalkulator Casio FC-200V','penyiasat'=>'Zulkifli bin Omar','hari'=>91,'langkah'=>[
                ['label'=>'Laporan Diterima','selesai'=>true,'tarikh'=>'05/02/2026'],
                ['label'=>'Siasatan Dimulakan','selesai'=>true,'tarikh'=>'07/02/2026'],
                ['label'=>'Temu Bual Saksi','selesai'=>false,'tarikh'=>'—'],
                ['label'=>'Laporan Awal','selesai'=>false,'tarikh'=>'—'],
                ['label'=>'Keputusan & Hapus Kira','selesai'=>false,'tarikh'=>'—'],
            ]],
            ['no'=>'KHL/2026/007','aset'=>'Telefon IP Cisco CP-8811','penyiasat'=>'Ahmad Fadzil bin Kamaruddin','hari'=>84,'langkah'=>[
                ['label'=>'Laporan Diterima','selesai'=>true,'tarikh'=>'12/02/2026'],
                ['label'=>'Siasatan Dimulakan','selesai'=>true,'tarikh'=>'14/02/2026'],
                ['label'=>'Temu Bual Saksi','selesai'=>true,'tarikh'=>'25/02/2026'],
                ['label'=>'Laporan Awal','selesai'=>false,'tarikh'=>'—'],
                ['label'=>'Keputusan & Hapus Kira','selesai'=>false,'tarikh'=>'—'],
            ]],
        ];
        @endphp
        @foreach($aktif as $a)
        <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm p-8">
            <div class="flex items-start justify-between mb-5">
                <div>
                    <p class="text-[11px] font-black text-red-600 uppercase">{{ $a['no'] }}</p>
                    <p class="text-[12px] font-black text-[#1E3A8A] mt-1 leading-tight">{{ $a['aset'] }}</p>
                    <p class="text-[10px] text-slate-400 font-bold mt-1">Penyiasat: {{ $a['penyiasat'] }}</p>
                </div>
                <span class="badge badge-red flex-shrink-0">{{ $a['hari'] }} Hari</span>
            </div>
            <div class="space-y-3">
                @foreach($a['langkah'] as $l)
                <div class="flex items-center gap-3">
                    <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0
                        {{ $l['selesai'] ? 'bg-emerald-500' : 'bg-gray-100 border-2 border-gray-200' }}">
                        @if($l['selesai'])
                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="3"/></svg>
                        @endif
                    </div>
                    <div class="flex-1">
                        <p class="text-[11px] font-black {{ $l['selesai'] ? 'text-[#1E293B]' : 'text-slate-300' }}">{{ $l['label'] }}</p>
                        <p class="text-[9px] font-bold {{ $l['selesai'] ? 'text-slate-400' : 'text-slate-200' }}">{{ $l['tarikh'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
