@extends('layouts.dashboard')

@section('content')
<div class="content-fluid space-y-8 pb-12" x-data="pptModule()">

    {{-- ── Page Header ── --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Perancangan Perolehan Tahunan
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-MP-PT &mdash; Unjuran & Pemantauan Perbelanjaan Tahunan
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Daftar PPT Baharu
            </button>
            <button class="mini-export-btn mini-excel px-5 py-3 rounded-[5px] text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                Excel
            </button>
        </div>
    </div>

    {{-- ── KPI Stats ── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Jumlah PPT 2026',       'val'=>'RM 48.6M', 'sub'=>'24 projek dirancang',        'color'=>'blue'],
            ['label'=>'Telah Dilaksanakan',     'val'=>'RM 28.4M', 'sub'=>'58.5% daripada perancangan', 'color'=>'green'],
            ['label'=>'Dalam Proses',           'val'=>'RM 12.1M', 'sub'=>'7 projek aktif',             'color'=>'amber'],
            ['label'=>'Baki Tidak Dilaksana',   'val'=>'RM 8.1M',  'sub'=>'Sehingga 31 Dis 2026',       'color'=>'red'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-[5px] border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Filters ── --}}
    <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm p-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <svg class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2.5"/>
                </svg>
                <input type="text" x-model="search" placeholder="Cari tajuk projek, jabatan atau kategori..."
                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-[5px] text-[11px] font-bold outline-none focus:border-[#1E3A8A] focus:bg-white transition-all">
            </div>
            <select x-model="filterStatus" class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-[5px] text-[10px] font-black uppercase outline-none focus:border-[#1E3A8A] cursor-pointer">
                <option value="">Semua Status</option>
                <option>Selesai</option>
                <option>Dalam Proses</option>
                <option>Belum Dilaksana</option>
                <option>Ditangguh</option>
            </select>
            <select x-model="filterKategori" class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-[5px] text-[10px] font-black uppercase outline-none focus:border-[#1E3A8A] cursor-pointer">
                <option value="">Semua Kategori</option>
                <option>ICT</option>
                <option>Perkhidmatan</option>
                <option>Bekalan</option>
                <option>Kerja</option>
            </select>
        </div>
    </div>

    {{-- ── PPT Table ── --}}
    <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-10 py-6 border-b border-gray-50">
            <div>
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Rekod PPT 2026</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">
                    Menunjukkan <span x-text="filtered.length"></span> daripada 24 rekod
                </p>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">Kod PPT</th>
                        <th>Tajuk Projek / Perolehan</th>
                        <th>Jabatan Memohon</th>
                        <th>Kategori</th>
                        <th>Kaedah</th>
                        <th>Nilai Unjuran (RM)</th>
                        <th>Nilai Sebenar (RM)</th>
                        <th>Kemajuan</th>
                        <th class="pr-10">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(p, i) in filtered" :key="p.kod">
                        <tr>
                            <td class="pl-10 font-black text-[11px] text-[#1E3A8A]" x-text="p.kod"></td>
                            <td>
                                <p class="text-[11px] font-black text-[#1E293B]" x-text="p.tajuk"></p>
                                <p class="text-[9px] text-slate-400 font-bold mt-0.5" x-text="p.skop"></p>
                            </td>
                            <td class="text-[11px] text-slate-600" x-text="p.jabatan"></td>
                            <td><span class="badge badge-blue" x-text="p.kategori"></span></td>
                            <td><span class="badge badge-gray" x-text="p.kaedah"></span></td>
                            <td class="text-[11px] font-black text-slate-700" x-text="'RM ' + p.unjuran.toLocaleString()"></td>
                            <td class="text-[11px] font-black" :class="p.sebenar > 0 ? 'text-[#1E3A8A]' : 'text-slate-300'" x-text="p.sebenar > 0 ? 'RM ' + p.sebenar.toLocaleString() : '—'"></td>
                            <td class="w-36">
                                <div class="prog-wrap">
                                    <div class="prog-fill"
                                        :style="'width:' + Math.min(100, Math.round((p.sebenar/p.unjuran)*100)) + '%;background:' + (p.status==='Selesai' ? '#10B981' : p.status==='Dalam Proses' ? '#1E3A8A' : '#E2E8F0')">
                                    </div>
                                </div>
                                <p class="text-[9px] text-slate-400 font-bold mt-1" x-text="p.sebenar > 0 ? Math.min(100, Math.round((p.sebenar/p.unjuran)*100)) + '%' : '0%'"></p>
                            </td>
                            <td class="pr-10">
                                <span class="badge"
                                    :class="{
                                        'badge-green': p.status === 'Selesai',
                                        'badge-blue':  p.status === 'Dalam Proses',
                                        'badge-gray':  p.status === 'Belum Dilaksana',
                                        'badge-red':   p.status === 'Ditangguh',
                                    }" x-text="p.status"></span>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
function pptModule() {
    return {
        search: '', filterStatus: '', filterKategori: '',
        data: [
            { kod:'PPT/2026/001', tajuk:'Perolehan Sistem Maklumat Eksekutif (EIS)', skop:'Pembangunan & Pelaksanaan',  jabatan:'Perbendaharaan Negeri Selangor', kategori:'ICT',          kaedah:'Tender Terbuka',  unjuran:2800000, sebenar:2650000, status:'Selesai' },
            { kod:'PPT/2026/002', tajuk:'Bekalan Peralatan ICT Jabatan Audit',       skop:'Komputer & Perkakasan',      jabatan:'Jabatan Audit Selangor',         kategori:'ICT',          kaedah:'Sebut Harga',     unjuran:320000,  sebenar:298500,  status:'Selesai' },
            { kod:'PPT/2026/003', tajuk:'Perkhidmatan Penyelenggaraan Sistem ERP',   skop:'Sokongan & Penyenggaraan',   jabatan:'Unit Kewangan',                  kategori:'Perkhidmatan', kaedah:'Rundingan Terus', unjuran:480000,  sebenar:480000,  status:'Selesai' },
            { kod:'PPT/2026/004', tajuk:'Naik Taraf Infrastruktur Rangkaian LAN',    skop:'Pendawaian & Peralatan',     jabatan:'Unit ICT PNS',                   kategori:'ICT',          kaedah:'Tender Terbuka',  unjuran:650000,  sebenar:612000,  status:'Dalam Proses' },
            { kod:'PPT/2026/005', tajuk:'Bekalan Alat Tulis & Peralatan Pejabat',    skop:'Pembekalan Tahunan',         jabatan:'Perbendaharaan Negeri Selangor', kategori:'Bekalan',      kaedah:'Sebut Harga',     unjuran:85000,   sebenar:78200,   status:'Selesai' },
            { kod:'PPT/2026/006', tajuk:'Kerja Naik Taraf Bangunan Pejabat',         skop:'Ubahsuai & Renovasi',        jabatan:'Jabatan Kerja Raya Selangor',    kategori:'Kerja',        kaedah:'Tender Terbuka',  unjuran:1200000, sebenar:890000,  status:'Dalam Proses' },
            { kod:'PPT/2026/007', tajuk:'Perkhidmatan Keselamatan Bangunan',         skop:'Pengawal Keselamatan 24J',   jabatan:'Pejabat SUK Selangor',           kategori:'Perkhidmatan', kaedah:'Rundingan Terus', unjuran:360000,  sebenar:0,       status:'Belum Dilaksana' },
            { kod:'PPT/2026/008', tajuk:'Perolehan Kenderaan Operasi',               skop:'4 Unit Kenderaan 4WD',       jabatan:'Jabatan Audit Selangor',         kategori:'Bekalan',      kaedah:'Tender Terbuka',  unjuran:520000,  sebenar:0,       status:'Belum Dilaksana' },
            { kod:'PPT/2026/009', tajuk:'Sistem Pengurusan Aset (Modul Tambahan)',   skop:'Integrasi & Pembangunan',    jabatan:'Unit Aset PNS',                  kategori:'ICT',          kaedah:'Sebut Harga',     unjuran:180000,  sebenar:145000,  status:'Dalam Proses' },
            { kod:'PPT/2026/010', tajuk:'Bekalan Ubatan & Peralatan Klinik',         skop:'Bekalan Tahunan Q1–Q4',      jabatan:'Klinik Kesihatan Pejabat',       kategori:'Bekalan',      kaedah:'Rundingan Terus', unjuran:42000,   sebenar:38500,   status:'Selesai' },
            { kod:'PPT/2026/011', tajuk:'Seminar Tadbir Urus Perolehan 2026',        skop:'Latihan & Pembangunan SDM',  jabatan:'Unit HRD PNS',                   kategori:'Perkhidmatan', kaedah:'Rundingan Terus', unjuran:75000,   sebenar:0,       status:'Ditangguh' },
            { kod:'PPT/2026/012', tajuk:'Perolehan Server & Storage Data Centre',    skop:'Peralatan Pelayan Utama',    jabatan:'Unit ICT PNS',                   kategori:'ICT',          kaedah:'Tender Terbuka',  unjuran:3200000, sebenar:0,       status:'Belum Dilaksana' },
        ],
        get filtered() {
            return this.data.filter(p => {
                const s = this.search.toLowerCase();
                const m = !s || p.tajuk.toLowerCase().includes(s) || p.jabatan.toLowerCase().includes(s) || p.kategori.toLowerCase().includes(s);
                const r = !this.filterStatus   || p.status === this.filterStatus;
                const k = !this.filterKategori || p.kategori === this.filterKategori;
                return m && r && k;
            });
        }
    }
}
</script>
@endsection
