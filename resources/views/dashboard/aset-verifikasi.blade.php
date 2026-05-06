@extends('layouts.dashboard')

@section('content')
<div class="content-fluid space-y-8 pb-12" x-data="verifikasiModule()">

    {{-- ── Page Header ── --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Pemeriksaan & Verifikasi <span class="text-red-600">Fizikal.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-AS-PA &mdash; Rekod Tugasan & Hasil Pemeriksaan Aset Di Lapangan
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button @click="showModal = true"
                class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Daftar Tugasan Baharu
            </button>
            <button class="mini-export-btn mini-excel px-5 py-3 rounded-xl text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2"/></svg>
                Excel
            </button>
        </div>
    </div>

    {{-- ── KPI Stats ── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Jumlah Aset Untuk Semak', 'val'=>'12,402', 'sub'=>'Rekod inventori aktif 2026',    'icon'=>'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
            ['label'=>'Telah Disahkan',           'val'=>'10,981', 'sub'=>'88.5% kadar verifikasi',        'icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['label'=>'Belum Disemak',            'val'=>'1,421',  'sub'=>'Perlu tindakan pegawai',        'icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['label'=>'Tidak Dapat Disahkan',     'val'=>'231',    'sub'=>'Dilaporkan hilang / rosak',     'icon'=>'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-2xl border border-gray-100">
            <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center mb-4">
                <svg class="w-4 h-4 text-[#1E3A8A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="{{ $s['icon'] }}" stroke-width="2"/></svg>
            </div>
            <p class="text-2xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-1">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Daerah Verifikasi Progress ── --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm p-8">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest mb-6">Kemajuan Verifikasi Mengikut Daerah</h4>
            <div class="space-y-5">
                @php
                $daerah = [
                    ['nama'=>'Petaling',        'siap'=>4821,'jumlah'=>5100,'warna'=>'#10B981'],
                    ['nama'=>'Gombak',          'siap'=>1950,'jumlah'=>2200,'warna'=>'#1E3A8A'],
                    ['nama'=>'Klang',           'siap'=>1820,'jumlah'=>2100,'warna'=>'#1E3A8A'],
                    ['nama'=>'Hulu Langat',     'siap'=>980, 'jumlah'=>1350,'warna'=>'#F59E0B'],
                    ['nama'=>'Sepang',          'siap'=>760, 'jumlah'=>820, 'warna'=>'#10B981'],
                    ['nama'=>'Kuala Selangor',  'siap'=>520, 'jumlah'=>680, 'warna'=>'#F59E0B'],
                    ['nama'=>'Sabak Bernam',    'siap'=>130, 'jumlah'=>152, 'warna'=>'#10B981'],
                ];
                @endphp
                @foreach($daerah as $d)
                @php $pct = round(($d['siap']/$d['jumlah'])*100); @endphp
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <p class="text-[11px] font-black text-slate-700">{{ $d['nama'] }}</p>
                        <div class="flex items-center gap-3">
                            <p class="text-[10px] text-slate-400 font-bold">{{ number_format($d['siap']) }} / {{ number_format($d['jumlah']) }}</p>
                            <span class="text-[10px] font-black {{ $pct >= 90 ? 'text-emerald-600' : ($pct >= 75 ? 'text-[#1E3A8A]' : 'text-amber-600') }}">{{ $pct }}%</span>
                        </div>
                    </div>
                    <div class="prog-wrap">
                        <div class="prog-fill" style="width:{{ $pct }}%;background:{{ $d['warna'] }}"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Upcoming Inspections ── --}}
        <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm p-8">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest mb-6">Jadual Pemeriksaan Akan Datang</h4>
            <div class="space-y-4">
                @php
                $jadual = [
                    ['tarikh'=>'08/05/2026','daerah'=>'Gombak','lokasi'=>'Pejabat Daerah Gombak','pegawai'=>'Nurul Ain binti Abdul Wahab','bil'=>142,'status'=>'Disahkan'],
                    ['tarikh'=>'09/05/2026','daerah'=>'Klang','lokasi'=>'Jabatan Kerajaan Tempatan Klang','pegawai'=>'Ridhwan bin Azmi','bil'=>98,'status'=>'Disahkan'],
                    ['tarikh'=>'12/05/2026','daerah'=>'Hulu Langat','lokasi'=>'Pejabat Tanah Hulu Langat','pegawai'=>'Siti Hajar binti Mohd Noor','bil'=>187,'status'=>'Menunggu'],
                    ['tarikh'=>'14/05/2026','daerah'=>'Sepang','lokasi'=>'Majlis Bandaraya Sepang','pegawai'=>'Ridhwan bin Azmi','bil'=>74,'status'=>'Menunggu'],
                    ['tarikh'=>'19/05/2026','daerah'=>'Kuala Selangor','lokasi'=>'Pejabat Daerah KL','pegawai'=>'Siti Hajar binti Mohd Noor','bil'=>160,'status'=>'Menunggu'],
                ];
                @endphp
                @foreach($jadual as $j)
                <div class="flex items-start gap-4 p-4 rounded-2xl border border-gray-50 hover:border-blue-100 hover:bg-blue-50/20 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-[#1E3A8A]/5 flex flex-col items-center justify-center flex-shrink-0">
                        <p class="text-[14px] font-black text-[#1E3A8A] leading-none">{{ substr($j['tarikh'],0,2) }}</p>
                        <p class="text-[8px] font-black text-slate-400 uppercase">{{ ['Jan','Feb','Mac','Apr','Mei','Jun','Jul','Ogos','Sep','Okt','Nov','Dis'][intval(substr($j['tarikh'],3,2))-1] }}</p>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-[11px] font-black text-[#1E3A8A]">Daerah {{ $j['daerah'] }}</p>
                        <p class="text-[10px] text-slate-500 font-bold truncate">{{ $j['lokasi'] }}</p>
                        <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $j['pegawai'] }} &bull; {{ $j['bil'] }} unit aset</p>
                    </div>
                    <span class="badge {{ $j['status'] === 'Disahkan' ? 'badge-green' : 'badge-amber' }} flex-shrink-0">{{ $j['status'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── Verifikasi Records Table ── --}}
    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-10 py-6 border-b border-gray-50 flex items-center justify-between">
            <div>
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Log Verifikasi Fizikal 2026</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Rekod pemeriksaan yang telah dilaksanakan</p>
            </div>
            <div class="flex gap-3">
                <select class="bg-gray-50 border border-gray-200 py-2.5 px-4 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
                    <option>Semua Daerah</option>
                    @foreach(['Petaling','Gombak','Klang','Hulu Langat','Sepang','Kuala Selangor'] as $d)
                    <option>{{ $d }}</option>
                    @endforeach
                </select>
                <select class="bg-gray-50 border border-gray-200 py-2.5 px-4 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
                    <option>Semua Status</option>
                    <option>Selesai</option>
                    <option>Dalam Proses</option>
                    <option>Belum Bermula</option>
                </select>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">No. Tugasan</th>
                        <th>Lokasi / Jabatan</th>
                        <th>Daerah</th>
                        <th>Pegawai Pemeriksa</th>
                        <th>Tarikh Semak</th>
                        <th>Bil. Aset</th>
                        <th>Disahkan</th>
                        <th>Tidak Dijumpai</th>
                        <th class="pr-10">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $logs = [
                        ['no'=>'VER/2026/001','lokasi'=>'Pejabat Daerah Petaling','daerah'=>'Petaling','pegawai'=>'Nurul Ain binti Abdul Wahab','tarikh'=>'02/01/2026','bil'=>245,'sahkan'=>240,'hilang'=>5,'status'=>'Selesai'],
                        ['no'=>'VER/2026/002','lokasi'=>'Majlis Bandaraya Shah Alam','daerah'=>'Petaling','pegawai'=>'Ridhwan bin Azmi','tarikh'=>'08/01/2026','bil'=>389,'sahkan'=>381,'hilang'=>8,'status'=>'Selesai'],
                        ['no'=>'VER/2026/003','lokasi'=>'Jabatan Audit Selangor','daerah'=>'Gombak','pegawai'=>'Siti Hajar binti Mohd Noor','tarikh'=>'15/01/2026','bil'=>176,'sahkan'=>162,'hilang'=>14,'status'=>'Selesai'],
                        ['no'=>'VER/2026/004','lokasi'=>'Pejabat Daerah Klang','daerah'=>'Klang','pegawai'=>'Ridhwan bin Azmi','tarikh'=>'22/01/2026','bil'=>310,'sahkan'=>298,'hilang'=>12,'status'=>'Selesai'],
                        ['no'=>'VER/2026/005','lokasi'=>'Universiti Teknologi MARA Selangor','daerah'=>'Hulu Langat','pegawai'=>'Nurul Ain binti Abdul Wahab','tarikh'=>'29/01/2026','bil'=>520,'sahkan'=>498,'hilang'=>22,'status'=>'Selesai'],
                        ['no'=>'VER/2026/006','lokasi'=>'Majlis Perbandaran Sepang','daerah'=>'Sepang','pegawai'=>'Siti Hajar binti Mohd Noor','tarikh'=>'12/02/2026','bil'=>142,'sahkan'=>137,'hilang'=>5,'status'=>'Selesai'],
                        ['no'=>'VER/2026/007','lokasi'=>'Hospital Shah Alam','daerah'=>'Petaling','pegawai'=>'Ridhwan bin Azmi','tarikh'=>'19/02/2026','bil'=>428,'sahkan'=>415,'hilang'=>13,'status'=>'Selesai'],
                        ['no'=>'VER/2026/008','lokasi'=>'Pejabat Tanah Hulu Langat','daerah'=>'Hulu Langat','pegawai'=>'Nurul Ain binti Abdul Wahab','tarikh'=>'05/05/2026','bil'=>187,'sahkan'=>0,'hilang'=>0,'status'=>'Dalam Proses'],
                    ];
                    @endphp
                    @foreach($logs as $log)
                    <tr>
                        <td class="pl-10 font-black text-[11px] text-[#1E3A8A]">{{ $log['no'] }}</td>
                        <td class="text-[11px] font-black text-[#1E293B]">{{ $log['lokasi'] }}</td>
                        <td><span class="badge badge-blue">{{ $log['daerah'] }}</span></td>
                        <td class="text-[11px] text-slate-600">{{ $log['pegawai'] }}</td>
                        <td class="text-[11px] text-slate-400 font-bold">{{ $log['tarikh'] }}</td>
                        <td class="text-[11px] font-black text-slate-700 text-center">{{ number_format($log['bil']) }}</td>
                        <td class="text-[11px] font-black text-emerald-600 text-center">{{ $log['sahkan'] > 0 ? number_format($log['sahkan']) : '—' }}</td>
                        <td class="text-[11px] font-black {{ $log['hilang'] > 0 ? 'text-red-500' : 'text-slate-300' }} text-center">
                            {{ $log['hilang'] > 0 ? $log['hilang'] : '—' }}
                        </td>
                        <td class="pr-10">
                            <span class="badge {{ $log['status']==='Selesai' ? 'badge-green' : ($log['status']==='Dalam Proses' ? 'badge-amber' : 'badge-gray') }}">
                                {{ $log['status'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
function verifikasiModule() {
    return { showModal: false }
}
</script>
@endsection
