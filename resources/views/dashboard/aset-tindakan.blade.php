@extends('layouts.dashboard')

@section('content')
@php
    $titleMap = [
        'lihat' => ['title' => 'Lihat Rekod Aset', 'subtitle' => 'Semakan penuh maklumat pendaftaran dan penempatan aset'],
        'edit' => ['title' => 'Kemaskini Rekod Aset', 'subtitle' => 'Kemaskini maklumat aset sebelum disimpan semula'],
        'cetak' => ['title' => 'Cetak Dokumen KEW.PA', 'subtitle' => 'Jana dokumen KEW.PA-3, KEW.PA-4 dan KEW.PA-7'],
        'hapus' => ['title' => 'Hapus Rekod Aset', 'subtitle' => 'Sahkan tindakan hapus rekod inventori aset'],
    ];
    $page = $titleMap[$mode] ?? $titleMap['lihat'];
@endphp

<div class="content-fluid space-y-8 pb-12">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">{{ $page['title'] }}</h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">{{ $page['subtitle'] }}</p>
        </div>
        <a href="{{ route('aset.index') }}" class="px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest text-slate-500 border border-gray-200 hover:bg-gray-50 transition-all">
            Kembali Ke Senarai
        </a>
    </div>

    @if($mode === 'lihat')
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 lg:col-span-8 bg-white rounded-[5px] border border-gray-100 shadow-sm p-8">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest mb-6">Maklumat Aset</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach([
                        'No. Siri Aset' => $asset['siri'],
                        'Perihal Aset' => $asset['nama'],
                        'Jenis Aset' => $asset['jenis'],
                        'Kategori / Sub Kategori' => $asset['kategori'].' / '.$asset['sub'],
                        'Jabatan / PTJ' => $asset['jabatan'],
                        'Lokasi Penempatan' => $asset['lokasi'],
                        'Tarikh Daftar' => $asset['tarikh'],
                        'Status Aset' => $asset['status'],
                    ] as $label => $value)
                    <div class="border-b border-gray-100 pb-4">
                        <p class="text-[9px] font-black uppercase tracking-widest text-slate-400">{{ $label }}</p>
                        <p class="text-[12px] font-bold text-slate-700 mt-2">{{ $value }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-12 lg:col-span-4 bg-white rounded-[5px] border border-gray-100 shadow-sm p-8">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest mb-6">Nilai Aset</h4>
                <div class="space-y-5">
                    <div>
                        <p class="text-[9px] font-black uppercase tracking-widest text-slate-400">Nilai Perolehan</p>
                        <p class="text-2xl font-black text-[#1E3A8A] mt-1">RM {{ number_format($asset['harga']) }}</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-black uppercase tracking-widest text-slate-400">Nilai Semasa</p>
                        <p class="text-2xl font-black text-red-600 mt-1">{{ $asset['semasa'] > 0 ? 'RM ' . number_format($asset['semasa']) : '-' }}</p>
                    </div>
                    <a href="{{ route('aset.edit', $asset['id']) }}" class="block text-center bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest transition-all">Kemaskini Rekod</a>
                </div>
            </div>
        </div>
    @elseif($mode === 'edit')
        <form action="{{ route('aset.index') }}" method="GET" class="bg-white rounded-[5px] border border-gray-100 shadow-sm p-8 space-y-8">
            <input type="hidden" name="status" value="kemaskini">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-4 space-y-2">
                    <label class="label-heavy">No. Siri Aset</label>
                    <input type="text" value="{{ $asset['siri'] }}" class="input-heavy">
                </div>
                <div class="col-span-12 lg:col-span-8 space-y-2">
                    <label class="label-heavy">Perihal Aset</label>
                    <input type="text" value="{{ $asset['nama'] }}" class="input-heavy">
                </div>
                <div class="col-span-12 lg:col-span-4 space-y-2">
                    <label class="label-heavy">Kategori</label>
                    <input type="text" value="{{ $asset['kategori'] }}" class="input-heavy">
                </div>
                <div class="col-span-12 lg:col-span-4 space-y-2">
                    <label class="label-heavy">Sub Kategori</label>
                    <input type="text" value="{{ $asset['sub'] }}" class="input-heavy">
                </div>
                <div class="col-span-12 lg:col-span-4 space-y-2">
                    <label class="label-heavy">Status Aset</label>
                    <div class="select-wrap">
                        <select class="input-heavy select-heavy cursor-pointer">
                            <option>-- Sila Pilih --</option>
                            @foreach(['Dalam Penggunaan','Disimpan','Penyenggaraan','Hilang'] as $status)
                                <option {{ $asset['status'] === $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-6 space-y-2">
                    <label class="label-heavy">Jabatan / PTJ</label>
                    <input type="text" value="{{ $asset['jabatan'] }}" class="input-heavy">
                </div>
                <div class="col-span-12 lg:col-span-6 space-y-2">
                    <label class="label-heavy">Lokasi Penempatan</label>
                    <input type="text" value="{{ $asset['lokasi'] }}" class="input-heavy">
                </div>
                <div class="col-span-12 lg:col-span-6 space-y-2">
                    <label class="label-heavy">Nilai Perolehan (RM)</label>
                    <input type="number" value="{{ $asset['harga'] }}" class="input-heavy">
                </div>
                <div class="col-span-12 lg:col-span-6 space-y-2">
                    <label class="label-heavy">Nilai Semasa (Auto)</label>
                    <input type="text" value="RM {{ number_format($asset['semasa']) }}" class="input-heavy input-fixed" readonly>
                </div>
            </div>
            <div class="flex justify-end gap-4 border-t border-gray-100 pt-8">
                <a href="{{ route('aset.index') }}" class="px-8 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest text-slate-400 hover:bg-gray-50 border border-gray-200 transition-all">Batal</a>
                <button type="submit" class="bg-[#1E3A8A] hover:bg-red-700 text-white px-8 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">Simpan Kemaskini</button>
            </div>
        </form>
    @elseif($mode === 'cetak')
        <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm p-8 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach(['KEW.PA-3' => 'Pendaftaran Harta Modal', 'KEW.PA-4' => 'Pendaftaran Aset Alih Bernilai Rendah', 'KEW.PA-7' => 'Senarai Daftar Aset'] as $doc => $desc)
                <div class="border border-gray-100 rounded-[5px] p-5 bg-gray-50/50">
                    <p class="text-[18px] font-black text-[#1E3A8A]">{{ $doc }}</p>
                    <p class="text-[11px] font-bold text-slate-500 mt-1">{{ $desc }}</p>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mt-5">{{ $asset['siri'] }}</p>
                </div>
                @endforeach
            </div>
            <div class="border border-dashed border-gray-200 rounded-[5px] p-8">
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Preview Ringkas</p>
                <h4 class="text-2xl font-black text-[#1E3A8A] mt-2">{{ $asset['nama'] }}</h4>
                <p class="text-[12px] font-bold text-slate-500 mt-2">{{ $asset['jabatan'] }} - {{ $asset['lokasi'] }}</p>
            </div>
            <div class="flex justify-end gap-4 border-t border-gray-100 pt-8">
                <a href="{{ route('aset.index') }}" class="px-8 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest text-slate-400 hover:bg-gray-50 border border-gray-200 transition-all">Batal</a>
                <a href="{{ route('aset.index', ['status' => 'cetak']) }}" class="bg-[#1E3A8A] hover:bg-red-700 text-white px-8 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">Jana & Cetak</a>
            </div>
        </div>
    @else
        <div class="bg-white rounded-[5px] border border-red-100 shadow-sm p-8">
            <div class="max-w-3xl">
                <p class="text-[10px] font-black uppercase tracking-widest text-red-500">Pengesahan Diperlukan</p>
                <h4 class="text-2xl font-black text-[#1E3A8A] mt-2">{{ $asset['nama'] }}</h4>
                <p class="text-[12px] font-bold text-slate-500 mt-2">Tindakan hapus akan menanda rekod {{ $asset['siri'] }} untuk semakan pegawai aset sebelum dikeluarkan daripada senarai aktif.</p>
            </div>
            <div class="flex justify-end gap-4 border-t border-gray-100 pt-8 mt-8">
                <a href="{{ route('aset.index') }}" class="px-8 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest text-slate-400 hover:bg-gray-50 border border-gray-200 transition-all">Batal</a>
                <a href="{{ route('aset.index', ['status' => 'hapus']) }}" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">Sahkan Hapus</a>
            </div>
        </div>
    @endif
</div>
@endsection
