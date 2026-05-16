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
                Laporan Suku Tahun
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-AS-LA &mdash; Laporan Suku Tahun JKPAK Perbendaharaan Negeri Selangor
            </p>
        </div>
    </div>

    {{-- ── Report Generator Card ── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Generator Panel ── --}}
        <div class="lg:col-span-1 bg-white rounded-[5px] border border-gray-100 shadow-sm p-8 flex flex-col gap-6">
            <div>
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Jana Laporan</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Tetapkan Parameter Laporan</p>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="label-heavy">Tahun</label>
                    <select class="input-heavy rounded-[5px]">
                        <option>2026</option>
                        <option>2025</option>
                        <option>2024</option>
                        <option>2023</option>
                    </select>
                </div>
                <div>
                    <label class="label-heavy">Suku Tahun (Kuarter)</label>
                    <select class="input-heavy rounded-[5px]">
                        <option>Q1 (Jan – Mac)</option>
                        <option>Q2 (Apr – Jun)</option>
                        <option>Q3 (Jul – Sep)</option>
                        <option>Q4 (Okt – Dis)</option>
                    </select>
                </div>
                <div>
                    <label class="label-heavy">Skop Laporan</label>
                    <select class="input-heavy rounded-[5px]">
                        <option>Semua Modul (Perolehan & Aset)</option>
                        <option>Perolehan Sahaja</option>
                        <option>Aset Sahaja</option>
                        <option>Naziran Sahaja</option>
                    </select>
                </div>
                <div>
                    <label class="label-heavy">Format Muat Turun</label>
                    <div class="flex gap-3">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="fmt" checked class="accent-[#1E3A8A]">
                            <span class="text-[11px] font-black text-slate-600 uppercase tracking-wider">PDF</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="fmt" class="accent-[#1E3A8A]">
                            <span class="text-[11px] font-black text-slate-600 uppercase tracking-wider">Excel</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="fmt" class="accent-[#1E3A8A]">
                            <span class="text-[11px] font-black text-slate-600 uppercase tracking-wider">CSV</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="space-y-3 mt-auto">
                <a href="{{ route('laporan.suku-tahun', ['status' => 'jana']) }}" class="w-full bg-[#1E3A8A] hover:bg-red-700 text-white py-3.5 rounded-[5px] text-[10px] font-black uppercase tracking-widest transition-all flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                    Jana & Muat Turun
                </a>
                <a href="{{ route('laporan.suku-tahun', ['status' => 'muat-turun']) }}" class="w-full btn-export-outline border text-slate-500 hover:text-[#1E3A8A] py-3.5 rounded-[5px] text-[10px] font-black uppercase tracking-widest transition-all text-center">
                    Pratonton Laporan
                </a>
            </div>
        </div>

        {{-- Preview Summary ── --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Q1 2026 Preview ── --}}
            <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
                <div class="bg-[#1E3A8A] px-8 py-5 flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-black text-blue-200 uppercase tracking-widest">Pratonton Laporan</p>
                        <h4 class="text-[18px] font-black text-white leading-tight mt-0.5">
                            Laporan Suku Tahun Q1 2026
                        </h4>
                        <p class="text-[10px] text-blue-300 font-bold mt-0.5">Perbendaharaan Negeri Selangor &mdash; JKPAK</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-blue-300 font-bold uppercase">Dijana</p>
                        <p class="text-[13px] font-black text-white">06/05/2026</p>
                    </div>
                </div>

                <div class="p-8 space-y-6">
                    {{-- Perolehan Summary ── --}}
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-gray-100 pb-2 mb-4">A. Ringkasan Perolehan</p>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach([
                                ['label'=>'Perolehan Tahunan (PPT)','val'=>'24 Projek','sub'=>'Nilai RM 48.6M'],
                                ['label'=>'Telah Dilaksanakan Q1','val'=>'11 Projek','sub'=>'Nilai RM 12.8M'],
                                ['label'=>'Penjimatan Dicapai','val'=>'RM 182K','sub'=>'1.4% daripada anggaran'],
                            ] as $item)
                            <div class="bg-gray-50 rounded-[5px] p-4">
                                <p class="text-[18px] font-black text-[#1E3A8A]">{{ $item['val'] }}</p>
                                <p class="text-[9px] font-black text-slate-500 uppercase tracking-wider mt-1">{{ $item['label'] }}</p>
                                <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $item['sub'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Aset Summary ── --}}
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-gray-100 pb-2 mb-4">B. Ringkasan Aset</p>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach([
                                ['label'=>'Jumlah Aset Berdaftar','val'=>'12,402','sub'=>'Harta modal & aset rendah'],
                                ['label'=>'Verifikasi Selesai Q1','val'=>'4,821','sub'=>'38.9% daripada inventori'],
                                ['label'=>'Aset Dilupus Q1','val'=>'7 Unit','sub'=>'Nilai RM 41,835'],
                            ] as $item)
                            <div class="bg-gray-50 rounded-[5px] p-4">
                                <p class="text-[18px] font-black text-[#1E3A8A]">{{ $item['val'] }}</p>
                                <p class="text-[9px] font-black text-slate-500 uppercase tracking-wider mt-1">{{ $item['label'] }}</p>
                                <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $item['sub'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Naziran Summary ── --}}
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-gray-100 pb-2 mb-4">C. Ringkasan Naziran</p>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach([
                                ['label'=>'Naziran Perolehan','val'=>'8 Kes','sub'=>'6 lulus, 2 teguran aktif'],
                                ['label'=>'Naziran Aset','val'=>'5 Kes','sub'=>'5 lulus, 0 teguran'],
                                ['label'=>'Pematuhan Keseluruhan','val'=>'91.2%','sub'=>'Melebihi sasaran 85%'],
                            ] as $item)
                            <div class="bg-gray-50 rounded-[5px] p-4">
                                <p class="text-[18px] font-black text-[#1E3A8A]">{{ $item['val'] }}</p>
                                <p class="text-[9px] font-black text-slate-500 uppercase tracking-wider mt-1">{{ $item['label'] }}</p>
                                <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $item['sub'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Archived Reports ── --}}
    <div class="section-divider">Arkib Laporan Terdahulu</div>

    <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">Nama Laporan</th>
                        <th>Suku Tahun</th>
                        <th>Skop</th>
                        <th>Dijana Oleh</th>
                        <th>Tarikh Jana</th>
                        <th>Saiz Fail</th>
                        <th class="pr-10">Muat Turun</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $arkib = [
                        ['nama'=>'Laporan JKPAK Suku Tahun Q1 2026','suku'=>'Q1 2026','skop'=>'Semua Modul','jana'=>'Ahmad Fadzil','tarikh'=>'01/04/2026','saiz'=>'4.2 MB','format'=>'PDF'],
                        ['nama'=>'Laporan JKPAK Suku Tahun Q4 2025','suku'=>'Q4 2025','skop'=>'Semua Modul','jana'=>'Rosnah Kadir','tarikh'=>'05/01/2026','saiz'=>'3.8 MB','format'=>'PDF'],
                        ['nama'=>'Laporan JKPAK Suku Tahun Q3 2025','suku'=>'Q3 2025','skop'=>'Semua Modul','jana'=>'Ahmad Fadzil','tarikh'=>'02/10/2025','saiz'=>'4.1 MB','format'=>'PDF'],
                        ['nama'=>'Data Perolehan Q1 2026 (Spreadsheet)','suku'=>'Q1 2026','skop'=>'Perolehan','jana'=>'Faridah Ismail','tarikh'=>'01/04/2026','saiz'=>'1.1 MB','format'=>'Excel'],
                        ['nama'=>'Data Aset Q4 2025 (Spreadsheet)','suku'=>'Q4 2025','skop'=>'Aset','jana'=>'Siti Hajar','tarikh'=>'05/01/2026','saiz'=>'2.3 MB','format'=>'Excel'],
                    ];
                    @endphp
                    @foreach($arkib as $a)
                    <tr>
                        <td class="pl-10 text-[11px] font-black text-[#1E293B]">{{ $a['nama'] }}</td>
                        <td><span class="badge badge-blue">{{ $a['suku'] }}</span></td>
                        <td class="text-[11px] text-slate-600">{{ $a['skop'] }}</td>
                        <td class="text-[11px] text-slate-600">{{ $a['jana'] }}</td>
                        <td class="text-[11px] text-slate-400 font-bold">{{ $a['tarikh'] }}</td>
                        <td class="text-[11px] text-slate-500 font-bold">{{ $a['saiz'] }}</td>
                        <td class="pr-10">
                            <a href="{{ route('laporan.suku-tahun', ['status' => 'muat-turun']) }}" class="mini-export-btn {{ $a['format']==='PDF' ? 'mini-pdf' : 'mini-excel' }}">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke-width="2"/></svg>
                                {{ $a['format'] }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
