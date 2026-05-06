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
                Pindahan & Pelupusan <span class="text-red-600">Aset.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-AS-PL &mdash; Kelulusan & Tindakan Pindahan / Pelupusan Aset Alih
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Permohonan Baharu
            </button>
            <button class="mini-export-btn mini-pdf px-5 py-3 rounded-xl text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg>
                PDF
            </button>
        </div>
    </div>

    {{-- ── Stats ── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Permohonan Diterima',  'val'=>'48',        'sub'=>'Tahun semasa 2026',             'color'=>'blue'],
            ['label'=>'Dalam Proses Kelulusan','val'=>'12',       'sub'=>'Menunggu keputusan JK',         'color'=>'amber'],
            ['label'=>'Dilulus & Dilaksana',   'val'=>'31',       'sub'=>'Pelupusan / pindahan selesai',  'color'=>'green'],
            ['label'=>'Nilai Aset Dilupus',    'val'=>'RM 2.84M', 'sub'=>'Kumulatif nilai buku semasa',   'color'=>'red'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-2xl border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Tabs ── --}}
    <div x-data="{ tab: 'pelupusan' }" class="space-y-6">
        <div class="flex gap-2 bg-gray-50 rounded-2xl p-1.5 w-fit">
            <button @click="tab = 'pelupusan'"
                :class="tab === 'pelupusan' ? 'bg-white shadow-sm text-[#1E3A8A]' : 'text-slate-400 hover:text-slate-600'"
                class="px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                Pelupusan Aset
            </button>
            <button @click="tab = 'pindahan'"
                :class="tab === 'pindahan' ? 'bg-white shadow-sm text-[#1E3A8A]' : 'text-slate-400 hover:text-slate-600'"
                class="px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                Pindahan Aset
            </button>
        </div>

        {{-- Pelupusan Tab ── --}}
        <div x-show="tab === 'pelupusan'" class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-10 py-6 border-b border-gray-50">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Senarai Permohonan Pelupusan 2026</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Merangkumi semua kaedah: Lelong, Musnah, Jual & Derma</p>
            </div>
            <div class="overflow-x-auto">
                <table class="eis-table">
                    <thead>
                        <tr>
                            <th class="pl-10">No. Permohonan</th>
                            <th>No. Siri Aset</th>
                            <th>Keterangan Aset</th>
                            <th>Jabatan</th>
                            <th>Nilai Buku (RM)</th>
                            <th>Kaedah Pelupusan</th>
                            <th>Kuasa Melulus</th>
                            <th>Tarikh Mohon</th>
                            <th class="pr-10">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $pelupusan = [
                            ['no'=>'PLP/2026/001','siri'=>'PNS/ICT/089','aset'=>'Komputer Peribadi Dell OptiPlex 3070','jabatan'=>'Unit ICT PNS','nilai'=>4200,'kaedah'=>'Lelong Awam','kuasa'=>'Jawatankuasa Aset & Kewangan','tarikh'=>'02/01/2026','status'=>'Dilaksana'],
                            ['no'=>'PLP/2026/002','siri'=>'PNS/ICT/091','aset'=>'Komputer Peribadi Dell OptiPlex 3070','jabatan'=>'Unit ICT PNS','nilai'=>4200,'kaedah'=>'Lelong Awam','kuasa'=>'Jawatankuasa Aset & Kewangan','tarikh'=>'02/01/2026','status'=>'Dilaksana'],
                            ['no'=>'PLP/2026/003','siri'=>'PNS/PRN/012','aset'=>'Mesin Fotostat Ricoh MP 2014','jabatan'=>'Unit Pengurusan','nilai'=>8500,'kaedah'=>'Musnah','kuasa'=>'Jawatankuasa Aset & Kewangan','tarikh'=>'10/01/2026','status'=>'Dilaksana'],
                            ['no'=>'PLP/2026/004','siri'=>'PNS/KDR/041','aset'=>'Meja Kerja Kayu Jati (Set)','jabatan'=>'Jabatan Audit','nilai'=>1800,'kaedah'=>'Derma','kuasa'=>'Pegawai Aset Negeri','tarikh'=>'15/01/2026','status'=>'Dalam Proses Kelulusan'],
                            ['no'=>'PLP/2026/005','siri'=>'PNS/KDR/055','aset'=>'Kerusi Pejabat Ergonomik (12 unit)','jabatan'=>'Jabatan Audit','nilai'=>6600,'kaedah'=>'Lelong Awam','kuasa'=>'Jawatankuasa Aset & Kewangan','tarikh'=>'20/01/2026','status'=>'Dalam Proses Kelulusan'],
                            ['no'=>'PLP/2026/006','siri'=>'PNS/KDR/022','aset'=>'Kenderaan Operasi Proton Perdana','jabatan'=>'Pejabat SUK','nilai'=>38500,'kaedah'=>'Lelong Awam','kuasa'=>'Menteri Besar Selangor','tarikh'=>'25/01/2026','status'=>'Menunggu Kelulusan'],
                            ['no'=>'PLP/2026/007','siri'=>'PNS/ICT/102','aset'=>'Pencetak HP LaserJet Pro','jabatan'=>'Unit Kewangan','nilai'=>950,'kaedah'=>'Musnah','kuasa'=>'Pegawai Aset Negeri','tarikh'=>'03/02/2026','status'=>'Dilaksana'],
                            ['no'=>'PLP/2026/008','siri'=>'PNS/LAB/007','aset'=>'Peralatan Makmal Ujian (Set)','jabatan'=>'Jabatan Sains','nilai'=>12400,'kaedah'=>'Jual','kuasa'=>'Jawatankuasa Aset & Kewangan','tarikh'=>'10/02/2026','status'=>'Menunggu Kelulusan'],
                        ];
                        $statusMap = ['Dilaksana'=>'badge-green','Dalam Proses Kelulusan'=>'badge-amber','Menunggu Kelulusan'=>'badge-blue','Ditolak'=>'badge-red'];
                        @endphp
                        @foreach($pelupusan as $p)
                        <tr>
                            <td class="pl-10 font-black text-[11px] text-[#1E3A8A]">{{ $p['no'] }}</td>
                            <td class="text-[11px] font-bold text-slate-500">{{ $p['siri'] }}</td>
                            <td class="text-[11px] font-black text-[#1E293B]">{{ $p['aset'] }}</td>
                            <td class="text-[11px] text-slate-600">{{ $p['jabatan'] }}</td>
                            <td class="text-[11px] font-black text-slate-700">RM {{ number_format($p['nilai']) }}</td>
                            <td><span class="badge badge-purple">{{ $p['kaedah'] }}</span></td>
                            <td class="text-[11px] text-slate-500 font-bold max-w-[180px]">{{ $p['kuasa'] }}</td>
                            <td class="text-[11px] text-slate-400 font-bold">{{ $p['tarikh'] }}</td>
                            <td class="pr-10"><span class="badge {{ $statusMap[$p['status']] ?? 'badge-gray' }}">{{ $p['status'] }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pindahan Tab ── --}}
        <div x-show="tab === 'pindahan'" class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
            <div class="px-10 py-6 border-b border-gray-50">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Senarai Pindahan Aset 2026</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Rekod pindahan antara jabatan / lokasi</p>
            </div>
            <div class="overflow-x-auto">
                <table class="eis-table">
                    <thead>
                        <tr>
                            <th class="pl-10">No. Pindahan</th>
                            <th>No. Siri Aset</th>
                            <th>Keterangan Aset</th>
                            <th>Dari Jabatan</th>
                            <th>Ke Jabatan</th>
                            <th>Nilai Buku (RM)</th>
                            <th>Tarikh Pindahan</th>
                            <th class="pr-10">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $pindahan = [
                            ['no'=>'PDH/2026/001','siri'=>'PNS/ICT/095','aset'=>'Laptop Dell Latitude 5410','dari'=>'Unit ICT PNS','ke'=>'Unit Kewangan','nilai'=>5800,'tarikh'=>'05/01/2026','status'=>'Selesai'],
                            ['no'=>'PDH/2026/002','siri'=>'PNS/KDR/031','aset'=>'Almari Besi 4 Laci','dari'=>'Jabatan Audit','ke'=>'Pejabat SUK','nilai'=>1200,'tarikh'=>'08/01/2026','status'=>'Selesai'],
                            ['no'=>'PDH/2026/003','siri'=>'PNS/PRN/008','aset'=>'Projektor Epson EB-S41','dari'=>'Unit HRD','ke'=>'Bilik Mesyuarat Utama','nilai'=>3400,'tarikh'=>'12/01/2026','status'=>'Selesai'],
                            ['no'=>'PDH/2026/004','siri'=>'PNS/ICT/110','aset'=>'Monitor 24" LG','dari'=>'Unit Perolehan','ke'=>'Unit Aset','nilai'=>850,'tarikh'=>'20/01/2026','status'=>'Dalam Proses'],
                            ['no'=>'PDH/2026/005','siri'=>'PNS/KDR/062','aset'=>'Meja Persidangan (8 tempat duduk)','dari'=>'Bilik Mesyuarat Lama','ke'=>'Bilik Latihan Baharu','nilai'=>4500,'tarikh'=>'25/01/2026','status'=>'Dalam Proses'],
                        ];
                        @endphp
                        @foreach($pindahan as $p)
                        <tr>
                            <td class="pl-10 font-black text-[11px] text-[#1E3A8A]">{{ $p['no'] }}</td>
                            <td class="text-[11px] font-bold text-slate-500">{{ $p['siri'] }}</td>
                            <td class="text-[11px] font-black text-[#1E293B]">{{ $p['aset'] }}</td>
                            <td class="text-[11px] text-slate-600">{{ $p['dari'] }}</td>
                            <td class="text-[11px] text-slate-600">{{ $p['ke'] }}</td>
                            <td class="text-[11px] font-black text-slate-700">RM {{ number_format($p['nilai']) }}</td>
                            <td class="text-[11px] text-slate-400 font-bold">{{ $p['tarikh'] }}</td>
                            <td class="pr-10"><span class="badge {{ $p['status']==='Selesai' ? 'badge-green' : 'badge-amber' }}">{{ $p['status'] }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
