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
                Bantuan & <span class="text-red-600">Sokongan.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                Panduan Pengguna, FAQ & Hubungi Sokongan Teknikal
            </p>
        </div>
    </div>

    {{-- ── FAQ ── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-4">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Soalan Lazim (FAQ)</h4>
            @php
            $faqs = [
                ['q'=>'Bagaimana cara menetapkan semula kata laluan pengguna?','a'=>'Pergi ke Pengurusan Pengguna → pilih pengguna berkenaan → klik Edit → masukkan kata laluan baharu → simpan. Pengguna perlu menukar semula semasa log masuk pertama.'],
                ['q'=>'Apakah kaedah perolehan yang boleh digunakan untuk pembelian bernilai RM 150,000?','a'=>'Bagi nilai RM 10,001 hingga RM 200,000, kaedah Sebut Harga digunakan. Pastikan mendapat minimum 5 sebut harga dari pembekal berlainan mengikut SPP 2023.'],
                ['q'=>'Bagaimana mendaftar aset baharu dalam sistem?','a'=>'Pergi ke Senarai Inventori Aset → klik Daftar Aset Baharu → isi borang KEW.PA digital → muat naik dokumen sokongan → hantar untuk pengesahan Pegawai Aset.'],
                ['q'=>'Bagaimana menjana laporan suku tahun JKPAK?','a'=>'Pergi ke Laporan Suku Tahun → pilih tahun & suku (Q1-Q4) → pilih skop modul → pilih format PDF/Excel → klik Jana & Muat Turun.'],
                ['q'=>'Apakah yang perlu dilakukan jika aset tidak dapat dijumpai semasa verifikasi?','a'=>'Buat laporan dalam modul Kehilangan & Hapus Kira → pilih no. siri aset → isi borang laporan → hantar untuk memulakan proses siasatan rasmi.'],
            ];
            @endphp
            <div class="space-y-3" x-data="{ open: null }">
                @foreach($faqs as $i => $faq)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <button @click="open = open === {{ $i }} ? null : {{ $i }}"
                        class="w-full flex items-center justify-between px-8 py-5 text-left">
                        <span class="text-[11px] font-black text-[#1E3A8A]">{{ $faq['q'] }}</span>
                        <svg class="w-4 h-4 text-slate-400 flex-shrink-0 ml-4 transition-transform"
                            :class="open === {{ $i }} ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                        </svg>
                    </button>
                    <div x-show="open === {{ $i }}" x-collapse class="px-8 pb-6">
                        <p class="text-[11px] text-slate-600 font-bold leading-relaxed">{{ $faq['a'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- ── Contact Support ── --}}
        <div class="space-y-6">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Hubungi Sokongan</h4>
            <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm p-8 space-y-6">
                @foreach([
                    ['label'=>'Sokongan Teknikal ICT','val'=>'+603-5544 1234','icon'=>'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z'],
                    ['label'=>'Emel Sokongan','val'=>'ict.support@pns.gov.my','icon'=>'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ['label'=>'Waktu Operasi','val'=>'Isnin–Jumaat, 8:00am–5:00pm','icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                ] as $c)
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-[#1E3A8A]/5 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-[#1E3A8A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="{{ $c['icon'] }}" stroke-width="2"/></svg>
                    </div>
                    <div>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">{{ $c['label'] }}</p>
                        <p class="text-[11px] font-black text-[#1E3A8A] mt-0.5">{{ $c['val'] }}</p>
                    </div>
                </div>
                @endforeach

                <div class="pt-4 border-t border-gray-50">
                    <button class="w-full bg-[#1E3A8A] hover:bg-red-700 text-white py-3.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                        Hantar Tiket Sokongan
                    </button>
                </div>
            </div>

            <div class="bg-[#1E3A8A] rounded-[2rem] p-8 text-white">
                <h5 class="text-[12px] font-black uppercase tracking-widest mb-2">Manual Pengguna</h5>
                <p class="text-[10px] text-blue-200 font-bold mb-5">Muat turun panduan penggunaan penuh sistem EIS PNS Selangor.</p>
                <button class="w-full bg-white/10 hover:bg-white/20 text-white py-3 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke-width="2"/></svg>
                    Muat Turun PDF (v2.3)
                </button>
            </div>
        </div>
    </div>

</div>
@endsection
