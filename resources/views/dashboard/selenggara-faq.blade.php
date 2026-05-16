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
                Penyelenggaraan FAQ
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                Urus Soalan Lazim (Sokongan & Bantuan)
            </p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('sokongan.bantuan') }}" class="px-5 py-3 bg-white border border-gray-200 rounded-[5px] text-[10px] font-black uppercase text-slate-500 hover:border-[#1E3A8A] transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2.5"/></svg>
                Kembali
            </a>
            <a href="{{ route('selenggara.faq', ['status' => 'tambah']) }}" class="bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Tambah FAQ Baru
            </a>
        </div>
    </div>

    <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-10 py-6 border-b border-gray-50">
            <div>
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Senarai Soalan Lazim</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Rekod FAQ Aktif</p>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10 w-[50px]">No.</th>
                        <th class="w-1/3">Soalan (Tanya)</th>
                        <th>Jawapan (Jawab)</th>
                        <th class="w-[100px]">Status</th>
                        <th class="pr-10 w-[120px]">Tindakan</th>
                    </tr>
                    <tr class="bg-gray-50/50">
                        <td class="pl-10 py-2 border-b border-gray-100"></td>
                        <td class="py-2 border-b border-gray-100"><input type="text" placeholder="Cari soalan..." class="w-full text-[10px] px-2 py-1 rounded-[5px] border border-gray-200 outline-none"></td>
                        <td class="py-2 border-b border-gray-100"><input type="text" placeholder="Cari jawapan..." class="w-full text-[10px] px-2 py-1 rounded-[5px] border border-gray-200 outline-none"></td>
                        <td class="py-2 border-b border-gray-100">
                            <select class="w-full text-[10px] px-2 py-1 rounded-[5px] border border-gray-200 outline-none">
                                <option value="">Semua</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </td>
                        <td class="pr-10 py-2 border-b border-gray-100"></td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $faqs = [
                        ['q'=>'Bagaimana cara menetapkan semula kata laluan pengguna?','a'=>'Pergi ke Pengurusan Pengguna → pilih pengguna berkenaan → klik Edit → masukkan kata laluan baharu → simpan. Pengguna perlu menukar semula semasa log masuk pertama.','status'=>'Aktif'],
                        ['q'=>'Apakah kaedah perolehan yang boleh digunakan untuk pembelian bernilai RM 150,000?','a'=>'Bagi nilai RM 10,001 hingga RM 200,000, kaedah Sebut Harga digunakan. Pastikan mendapat minimum 5 sebut harga dari pembekal berlainan mengikut SPP 2023.','status'=>'Aktif'],
                        ['q'=>'Bagaimana mendaftar aset baharu dalam sistem?','a'=>'Pergi ke Senarai Inventori Aset → klik Daftar Aset Baharu → isi borang KEW.PA digital → muat naik dokumen sokongan → hantar untuk pengesahan Pegawai Aset.','status'=>'Aktif'],
                        ['q'=>'Bagaimana menjana laporan suku tahun JKPAK?','a'=>'Pergi ke Laporan Suku Tahun → pilih tahun & suku (Q1-Q4) → pilih skop modul → pilih format PDF/Excel → klik Jana & Muat Turun.','status'=>'Aktif'],
                        ['q'=>'Apakah yang perlu dilakukan jika aset tidak dapat dijumpai semasa verifikasi?','a'=>'Buat laporan dalam modul Kehilangan & Hapus Kira → pilih no. siri aset → isi borang laporan → hantar untuk memulakan proses siasatan rasmi.','status'=>'Aktif'],
                    ];
                    @endphp
                    @foreach($faqs as $i => $faq)
                    <tr>
                        <td class="pl-10 text-[11px] font-black text-slate-500">{{ $i + 1 }}</td>
                        <td class="text-[11px] font-black text-[#1E3A8A]">{{ $faq['q'] }}</td>
                        <td class="text-[11px] text-slate-600 font-bold leading-relaxed pr-6">{{ $faq['a'] }}</td>
                        <td><span class="badge badge-green">{{ $faq['status'] }}</span></td>
                        <td class="pr-10">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('selenggara.faq', ['status' => 'kemaskini']) }}" class="p-1.5 rounded-[5px] bg-amber-50 hover:bg-amber-100 text-amber-600 transition-all" title="Edit">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2"/></svg>
                                </a>
                                <a href="{{ route('selenggara.faq', ['status' => 'hapus']) }}" class="p-1.5 rounded-[5px] bg-red-50 hover:bg-red-100 text-red-500 transition-all" title="Hapus">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
