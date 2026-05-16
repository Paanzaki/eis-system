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
                Naziran Perolehan
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-NZ-PR &mdash; Audit & Pematuhan Tatacara Perolehan Kerajaan
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Jana Laporan Naziran
            </button>
            <button class="mini-export-btn mini-pdf px-5 py-3 rounded-[5px] text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg>
                PDF
            </button>
        </div>
    </div>

    {{-- ── KPI Stats ── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Purata Skor Pematuhan', 'val'=>'92.4%', 'sub'=>'Gred A (Cemerlang)',            'color'=>'green'],
            ['label'=>'Teguran Audit Aktif',   'val'=>'14',    'sub'=>'Memerlukan tindakan segera',    'color'=>'red'],
            ['label'=>'Entiti Diaudit 2026',   'val'=>'45',    'sub'=>'Daripada 60 jabatan sasaran',   'color'=>'blue'],
            ['label'=>'Pematuhan Dokumen',     'val'=>'96.8%', 'sub'=>'Rekod lengkap & teratur',       'color'=>'amber'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-[5px] border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Pematuhan by Jabatan ── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1 bg-white rounded-[5px] border border-gray-100 shadow-sm p-8">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest mb-6">Ringkasan Pematuhan</h4>
            <div class="space-y-4">
                @foreach([
                    ['label'=>'Cemerlang (≥ 90%)', 'val'=>28, 'total'=>45, 'color'=>'#10B981'],
                    ['label'=>'Baik (75–89%)',      'val'=>11, 'total'=>45, 'color'=>'#1E3A8A'],
                    ['label'=>'Memuaskan (60–74%)', 'val'=>4,  'total'=>45, 'color'=>'#F59E0B'],
                    ['label'=>'Teguran (< 60%)',    'val'=>2,  'total'=>45, 'color'=>'#E11D48'],
                ] as $g)
                @php $pct = round(($g['val']/$g['total'])*100); @endphp
                <div>
                    <div class="flex justify-between mb-1.5">
                        <p class="text-[11px] font-black text-slate-700">{{ $g['label'] }}</p>
                        <p class="text-[11px] font-black text-slate-500">{{ $g['val'] }} Jabatan</p>
                    </div>
                    <div class="prog-wrap">
                        <div class="prog-fill" style="width:{{ $pct }}%;background:{{ $g['color'] }}"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Teguran Aktif ── --}}
        <div class="lg:col-span-2 bg-white rounded-[5px] border border-gray-100 shadow-sm p-8">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest mb-6">Teguran Audit Aktif (14 Kes)</h4>
            <div class="space-y-3">
                @foreach([
                    ['jabatan'=>'Jabatan Agama Islam Selangor (JAIS)','isu'=>'Dokumen sokongan tender tidak lengkap pada 3 fail','tarikh'=>'12/03/2026','gred'=>'Kritikal'],
                    ['jabatan'=>'Majlis Perbandaran Klang (MPK)','isu'=>'Perolehan melebihi had tanpa kelulusan JK','tarikh'=>'18/03/2026','gred'=>'Kritikal'],
                    ['jabatan'=>'Jabatan Kebajikan Masyarakat','isu'=>'Sebut harga tidak diperoleh dari minimum 5 pembekal','tarikh'=>'25/03/2026','gred'=>'Sederhana'],
                    ['jabatan'=>'Majlis Bandaraya Shah Alam (MBSA)','isu'=>'Kontrak tamat tempoh, tiada pembaharuan didokumenkan','tarikh'=>'02/04/2026','gred'=>'Sederhana'],
                    ['jabatan'=>'Lembaga Tabung Haji Selangor','isu'=>'Ringkasan Kewangan tidak dikemukakan kepada JKPAK','tarikh'=>'10/04/2026','gred'=>'Rendah'],
                ] as $t)
                <div class="flex items-start gap-4 p-4 rounded-[5px] border {{ $t['gred'] === 'Kritikal' ? 'border-red-100 bg-red-50/50' : ($t['gred'] === 'Sederhana' ? 'border-amber-100 bg-amber-50/30' : 'border-gray-100 bg-gray-50/30') }}">
                    <span class="badge {{ $t['gred'] === 'Kritikal' ? 'badge-red' : ($t['gred'] === 'Sederhana' ? 'badge-amber' : 'badge-gray') }} flex-shrink-0 mt-0.5">{{ $t['gred'] }}</span>
                    <div class="flex-1 min-w-0">
                        <p class="text-[11px] font-black text-[#1E3A8A]">{{ $t['jabatan'] }}</p>
                        <p class="text-[10px] text-slate-600 font-bold mt-0.5">{{ $t['isu'] }}</p>
                        <p class="text-[9px] text-slate-400 font-bold mt-1">Dilaporkan: {{ $t['tarikh'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── Main Audit Table ── --}}
    <div class="bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-10 py-6 border-b border-gray-50">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Rekod Naziran Perolehan 2026</h4>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">45 daripada 60 jabatan sasaran telah diaudit</p>
        </div>
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">Kod Fail Naziran</th>
                        <th>Jabatan / Agensi</th>
                        <th>Pegawai Pemeriksa</th>
                        <th>Tarikh Naziran</th>
                        <th>Skor Pematuhan</th>
                        <th>Teguran</th>
                        <th class="pr-10">Tahap</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $audits = [
                        ['id'=>'NZR/2026/P/01','jabatan'=>'Pejabat Setiausaha Kerajaan (SUK)','pegawai'=>'Ahmad Fadzil bin Kamaruddin','tarikh'=>'15/01/2026','skor'=>98,'teguran'=>0,'gred'=>'Cemerlang'],
                        ['id'=>'NZR/2026/P/02','jabatan'=>'Jabatan Kerja Raya (JKR) Selangor','pegawai'=>'Zulkifli bin Omar','tarikh'=>'22/01/2026','skor'=>89,'teguran'=>1,'gred'=>'Baik'],
                        ['id'=>'NZR/2026/P/03','jabatan'=>'Majlis Bandaraya Shah Alam','pegawai'=>'Ahmad Fadzil bin Kamaruddin','tarikh'=>'29/01/2026','skor'=>94,'teguran'=>0,'gred'=>'Cemerlang'],
                        ['id'=>'NZR/2026/P/04','jabatan'=>'Jabatan Imigresen Selangor','pegawai'=>'Zulkifli bin Omar','tarikh'=>'05/02/2026','skor'=>81,'teguran'=>2,'gred'=>'Baik'],
                        ['id'=>'NZR/2026/P/05','jabatan'=>'Universiti Teknologi MARA','pegawai'=>'Ahmad Fadzil bin Kamaruddin','tarikh'=>'12/02/2026','skor'=>96,'teguran'=>0,'gred'=>'Cemerlang'],
                        ['id'=>'NZR/2026/P/09','jabatan'=>'Majlis Perbandaran Sepang','pegawai'=>'Zulkifli bin Omar','tarikh'=>'04/03/2026','skor'=>74,'teguran'=>3,'gred'=>'Memuaskan'],
                        ['id'=>'NZR/2026/P/14','jabatan'=>'Jabatan Kerja Raya (JKR) Selangor','pegawai'=>'Ahmad Fadzil bin Kamaruddin','tarikh'=>'18/03/2026','skor'=>85,'teguran'=>1,'gred'=>'Baik'],
                        ['id'=>'NZR/2026/P/22','jabatan'=>'Jabatan Agama Islam Selangor','pegawai'=>'Zulkifli bin Omar','tarikh'=>'26/03/2026','skor'=>62,'teguran'=>4,'gred'=>'Teguran'],
                    ];
                    $gradMap = ['Cemerlang'=>'badge-green','Baik'=>'badge-blue','Memuaskan'=>'badge-amber','Teguran'=>'badge-red'];
                    @endphp
                    @foreach($audits as $a)
                    <tr>
                        <td class="pl-10 font-black text-[11px] text-[#1E3A8A]">{{ $a['id'] }}</td>
                        <td class="text-[11px] font-black text-[#1E293B]">{{ $a['jabatan'] }}</td>
                        <td class="text-[11px] text-slate-600">{{ $a['pegawai'] }}</td>
                        <td class="text-[11px] text-slate-400 font-bold">{{ $a['tarikh'] }}</td>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="prog-wrap flex-1 min-w-[80px]">
                                    <div class="prog-fill" style="width:{{ $a['skor'] }}%;background:{{ $a['skor']>=90?'#10B981':($a['skor']>=75?'#1E3A8A':($a['skor']>=60?'#F59E0B':'#E11D48')) }}"></div>
                                </div>
                                <span class="text-[11px] font-black text-slate-700 w-10">{{ $a['skor'] }}%</span>
                            </div>
                        </td>
                        <td class="text-center">
                            @if($a['teguran'] > 0)
                            <span class="badge badge-red">{{ $a['teguran'] }} Teguran</span>
                            @else
                            <span class="text-slate-300 font-bold text-[11px]">—</span>
                            @endif
                        </td>
                        <td class="pr-10"><span class="badge {{ $gradMap[$a['gred']] ?? 'badge-gray' }}">{{ $a['gred'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
