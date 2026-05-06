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
                Naziran <span class="text-red-600">Aset Alih.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-NZ-AS &mdash; Audit Pengurusan Harta Modal & Aset Rendah Nilai
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Buka Fail Naziran
            </button>
            <button class="mini-export-btn mini-pdf px-5 py-3 rounded-xl text-[10px]">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-width="2"/></svg>
                PDF
            </button>
        </div>
    </div>

    {{-- ── KPI Stats ── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Kadar Verifikasi',    'val'=>'88.5%', 'sub'=>'Fizikal vs daftar sistem'],
            ['label'=>'Aset Tidak Dijumpai', 'val'=>'231',   'sub'=>'Perlu siasatan lanjut'],
            ['label'=>'Pelupusan Selesai',   'val'=>'142',   'sub'=>'Kumulatif 2026'],
            ['label'=>'Jabatan Belum Audit', 'val'=>'12',    'sub'=>'Daripada 60 jabatan sasaran'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-2xl border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Audit Table ── --}}
    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-10 py-6 border-b border-gray-50">
            <div>
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Rekod Naziran Aset 2026</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">48 entiti telah dinazir, 12 dalam jadual</p>
            </div>
            <select class="bg-gray-50 border border-gray-200 py-2.5 px-4 rounded-xl text-[10px] font-black uppercase outline-none cursor-pointer">
                <option>Semua Status</option>
                <option>Selesai</option>
                <option>Dalam Proses</option>
                <option>Teguran</option>
            </select>
        </div>
        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">Kod Fail Naziran</th>
                        <th>Entiti / Jabatan</th>
                        <th>Pegawai Pemeriksa</th>
                        <th>Tarikh Naziran</th>
                        <th>Rekod KEW.PA</th>
                        <th>Integriti Fizikal</th>
                        <th>Teguran</th>
                        <th class="pr-10">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $audits = [
                        ['id'=>'NZR/2026/A/01','jabatan'=>'Pejabat SUK Cawangan Klang','pegawai'=>'Siti Hajar binti Mohd Noor','tarikh'=>'08/01/2026','kewpa'=>'Lengkap','integriti'=>95,'teguran'=>0,'status'=>'Selesai'],
                        ['id'=>'NZR/2026/A/02','jabatan'=>'Pejabat Daerah Sabak Bernam','pegawai'=>'Ridhwan bin Azmi','tarikh'=>'15/01/2026','kewpa'=>'Perlu Kemaskini','integriti'=>82,'teguran'=>1,'status'=>'Selesai'],
                        ['id'=>'NZR/2026/A/03','jabatan'=>'Hospital Shah Alam (Aset PNS)','pegawai'=>'Siti Hajar binti Mohd Noor','tarikh'=>'22/01/2026','kewpa'=>'Tidak Lengkap','integriti'=>45,'teguran'=>4,'status'=>'Teguran'],
                        ['id'=>'NZR/2026/A/04','jabatan'=>'Jabatan Perhutanan Selangor','pegawai'=>'Nurul Ain binti Abdul Wahab','tarikh'=>'29/01/2026','kewpa'=>'Lengkap','integriti'=>78,'teguran'=>2,'status'=>'Dalam Proses'],
                        ['id'=>'NZR/2026/A/05','jabatan'=>'Universiti Teknologi MARA Shah Alam','pegawai'=>'Ridhwan bin Azmi','tarikh'=>'05/02/2026','kewpa'=>'Lengkap','integriti'=>91,'teguran'=>0,'status'=>'Selesai'],
                        ['id'=>'NZR/2026/A/06','jabatan'=>'Jabatan Perkhidmatan Awam Selangor','pegawai'=>'Nurul Ain binti Abdul Wahab','tarikh'=>'12/02/2026','kewpa'=>'Lengkap','integriti'=>96,'teguran'=>0,'status'=>'Selesai'],
                        ['id'=>'NZR/2026/A/07','jabatan'=>'Majlis Perbandaran Ampang Jaya','pegawai'=>'Siti Hajar binti Mohd Noor','tarikh'=>'19/02/2026','kewpa'=>'Perlu Kemaskini','integriti'=>68,'teguran'=>2,'status'=>'Dalam Proses'],
                        ['id'=>'NZR/2026/A/08','jabatan'=>'Jabatan Pendidikan Selangor','pegawai'=>'Ridhwan bin Azmi','tarikh'=>'26/02/2026','kewpa'=>'Lengkap','integriti'=>88,'teguran'=>1,'status'=>'Selesai'],
                    ];
                    @endphp
                    @foreach($audits as $a)
                    <tr>
                        <td class="pl-10 font-black text-[11px] text-[#1E3A8A]">{{ $a['id'] }}</td>
                        <td class="text-[11px] font-black text-[#1E293B]">{{ $a['jabatan'] }}</td>
                        <td class="text-[11px] text-slate-600">{{ $a['pegawai'] }}</td>
                        <td class="text-[11px] text-slate-400 font-bold">{{ $a['tarikh'] }}</td>
                        <td>
                            <span class="badge {{ $a['kewpa'] === 'Lengkap' ? 'badge-green' : ($a['kewpa'] === 'Tidak Lengkap' ? 'badge-red' : 'badge-amber') }}">
                                {{ $a['kewpa'] }}
                            </span>
                        </td>
                        <td class="w-36">
                            <div class="flex items-center gap-2">
                                <div class="prog-wrap flex-1">
                                    <div class="prog-fill" style="width:{{ $a['integriti'] }}%;background:{{ $a['integriti']>=80?'#10B981':($a['integriti']>=60?'#F59E0B':'#E11D48') }}"></div>
                                </div>
                                <span class="text-[10px] font-black text-slate-600 w-8">{{ $a['integriti'] }}%</span>
                            </div>
                        </td>
                        <td class="text-center">
                            @if($a['teguran'] > 0)
                            <span class="badge badge-red">{{ $a['teguran'] }}</span>
                            @else
                            <span class="text-slate-300 font-bold text-[11px]">—</span>
                            @endif
                        </td>
                        <td class="pr-10">
                            <span class="badge {{ $a['status']==='Selesai'?'badge-green':($a['status']==='Teguran'?'badge-red':'badge-amber') }}">
                                {{ $a['status'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
