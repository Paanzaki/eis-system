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
                Laporan Naziran
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-NZ &mdash; Jana & Arkib Laporan Naziran Perolehan & Aset
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('laporan.naziran', ['status' => 'jana']) }}" class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                Jana Laporan Baru
            </a>
            <a href="{{ route('laporan.naziran', ['status' => 'muat-turun']) }}" class="mini-export-btn mini-pdf px-5 py-3 rounded-[5px] text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg>
                PDF
            </a>
        </div>
    </div>

    {{-- ── Generator ── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm p-8 flex flex-col gap-5">
            <div>
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Jana Laporan Naziran</h4>
                <p class="text-[10px] text-slate-400 font-bold mt-1">Tetapkan skop dan tempoh laporan</p>
            </div>
            <div class="space-y-4">
                <div>
                    <label class="label-heavy">Jenis Naziran</label>
                    <select class="input-heavy rounded-[5px]">
                        <option>Naziran Perolehan</option>
                        <option>Naziran Aset</option>
                        <option>Gabungan (Perolehan & Aset)</option>
                    </select>
                </div>
                <div>
                    <label class="label-heavy">Tahun</label>
                    <select class="input-heavy rounded-[5px]">
                        <option>2026</option><option>2025</option><option>2024</option>
                    </select>
                </div>
                <div>
                    <label class="label-heavy">Jabatan / Entiti</label>
                    <select class="input-heavy rounded-[5px]">
                        <option>Semua Jabatan</option>
                        <option>Pejabat SUK Selangor</option>
                        <option>Jabatan Audit Selangor</option>
                        <option>Jabatan Kerja Raya</option>
                    </select>
                </div>
                <div>
                    <label class="label-heavy">Format</label>
                    <div class="flex gap-4 mt-2">
                        <label class="flex items-center gap-2 cursor-pointer"><input type="radio" name="fmt2" checked class="accent-[#1E3A8A]"><span class="text-[11px] font-black text-slate-600 uppercase">PDF</span></label>
                        <label class="flex items-center gap-2 cursor-pointer"><input type="radio" name="fmt2" class="accent-[#1E3A8A]"><span class="text-[11px] font-black text-slate-600 uppercase">Excel</span></label>
                    </div>
                </div>
            </div>
            <a href="{{ route('laporan.naziran', ['status' => 'jana']) }}" class="block w-full text-center bg-[#1E3A8A] hover:bg-red-700 text-white py-3.5 rounded-[5px] text-[10px] font-black uppercase tracking-widest transition-all mt-auto">
                Jana & Muat Turun
            </a>
        </div>

        <div class="lg:col-span-2 bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-10 py-6 border-b border-gray-50">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Arkib Laporan Naziran</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Laporan yang telah dijana oleh sistem</p>
            </div>
            <div class="overflow-x-auto">
                <table class="eis-table">
                    <thead>
                        <tr>
                            <th class="pl-10">Nama Laporan</th>
                            <th>Jenis</th>
                            <th>Skop Jabatan</th>
                            <th>Dijana Oleh</th>
                            <th>Tarikh Jana</th>
                            <th class="pr-10">Muat Turun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $laporan = [
                            ['nama'=>'Laporan Naziran Perolehan Q1 2026','jenis'=>'Perolehan','jabatan'=>'Semua Jabatan','jana'=>'Ahmad Fadzil','tarikh'=>'02/04/2026','fmt'=>'PDF'],
                            ['nama'=>'Laporan Naziran Aset Q1 2026','jenis'=>'Aset','jabatan'=>'Semua Jabatan','jana'=>'Ahmad Fadzil','tarikh'=>'02/04/2026','fmt'=>'PDF'],
                            ['nama'=>'Naziran Khas – Jabatan Audit Selangor','jenis'=>'Perolehan','jabatan'=>'JAS Selangor','jana'=>'Zulkifli Omar','tarikh'=>'15/03/2026','fmt'=>'PDF'],
                            ['nama'=>'Laporan Teguran & Tindakan Susulan','jenis'=>'Gabungan','jabatan'=>'Semua Jabatan','jana'=>'Ahmad Fadzil','tarikh'=>'01/04/2026','fmt'=>'Excel'],
                            ['nama'=>'Laporan Naziran Perolehan Q4 2025','jenis'=>'Perolehan','jabatan'=>'Semua Jabatan','jana'=>'Rosnah Kadir','tarikh'=>'03/01/2026','fmt'=>'PDF'],
                        ];
                        @endphp
                        @foreach($laporan as $l)
                        <tr>
                            <td class="pl-10 text-[11px] font-black text-[#1E293B]">{{ $l['nama'] }}</td>
                            <td><span class="badge {{ $l['jenis']==='Perolehan'?'badge-blue':($l['jenis']==='Aset'?'badge-amber':'badge-purple') }}">{{ $l['jenis'] }}</span></td>
                            <td class="text-[11px] text-slate-600">{{ $l['jabatan'] }}</td>
                            <td class="text-[11px] text-slate-600">{{ $l['jana'] }}</td>
                            <td class="text-[11px] text-slate-400 font-bold">{{ $l['tarikh'] }}</td>
                            <td class="pr-10">
                                <a href="{{ route('laporan.naziran', ['status' => 'muat-turun']) }}" class="mini-export-btn {{ $l['fmt']==='PDF'?'mini-pdf':'mini-excel' }}">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke-width="2"/></svg>
                                    {{ $l['fmt'] }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
