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
                Migrasi & Sokongan <span class="text-red-600">Data.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-MD-PD &mdash; ETL Pipeline, Migrasi & Pembersihan Data Sistem
            </p>
        </div>
        <button class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" stroke-width="2"/></svg>
            Mula Proses ETL
        </button>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label'=>'Integriti Data',    'val'=>'99.8%',  'sub'=>'Rekod dalam keadaan baik'],
            ['label'=>'Rekod Dimigrasi',   'val'=>'45,201', 'sub'=>'Baris dari sistem lama'],
            ['label'=>'Duplikasi Dikesan', 'val'=>'12',     'sub'=>'Diselesaikan auto'],
            ['label'=>'Log ETL 24 Jam',    'val'=>'5',      'sub'=>'Transaksi terkini'],
        ] as $s)
        <div class="card-stat-pns bg-white p-6 rounded-2xl border border-gray-100">
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $s['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">{{ $s['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm p-8">
            <div class="flex items-center justify-between mb-6">
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Status ETL Pipeline</h4>
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 bg-emerald-500 rounded-full animate-ping"></div>
                    <span class="text-[9px] font-black text-emerald-600 uppercase">Live</span>
                </div>
            </div>
            <div class="space-y-6">
                @foreach([
                    ['step'=>'Extraction','desc'=>'PNS Legacy DB ke EIS Staging','pct'=>100,'color'=>'#10B981'],
                    ['step'=>'Transformation','desc'=>'Data Mapping & Normalisasi','pct'=>85,'color'=>'#1E3A8A'],
                    ['step'=>'Loading','desc'=>'Ke Production Server','pct'=>40,'color'=>'#F59E0B'],
                ] as $etl)
                <div>
                    <div class="flex justify-between mb-2">
                        <div>
                            <p class="text-[11px] font-black text-[#1E293B]">{{ $etl['step'] }}</p>
                            <p class="text-[9px] text-slate-400 font-bold">{{ $etl['desc'] }}</p>
                        </div>
                        <span class="text-[11px] font-black text-[#1E3A8A]">{{ $etl['pct'] }}%</span>
                    </div>
                    <div class="prog-wrap">
                        <div class="prog-fill" style="width:{{ $etl['pct'] }}%;background:{{ $etl['color'] }}"></div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-6 pt-5 border-t border-gray-50 grid grid-cols-2 gap-4">
                <div>
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Terakhir Sinkron</p>
                    <p class="text-[11px] font-black text-[#1E3A8A] mt-1">06/05/2026 &bull; 08:30</p>
                </div>
                <div class="text-right">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Status Enjin</p>
                    <p class="text-[11px] font-black text-emerald-600 mt-1">Optimal</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm p-8">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest mb-6">Log ETL Terkini</h4>
            <div class="space-y-3">
                @foreach([
                    ['msg'=>'Memformat RM pada 420 rekod kontrak perolehan','status'=>'Berjaya','masa'=>'2 min lepas'],
                    ['msg'=>'Menghapus 12 rekod duplikasi vendor dari Excel_Legacy','status'=>'Diselesai','masa'=>'15 min lepas'],
                    ['msg'=>'Pemetaan 2,000 baris data perolehan 2025 ke skema baru','status'=>'Memproses','masa'=>'Sekarang'],
                    ['msg'=>'Membetulkan format tarikh (1,202 rekod ISO 8601)','status'=>'Berjaya','masa'=>'1 jam lepas'],
                    ['msg'=>'Migrasi data aset ICT dari sistem lama (Phase 2)','status'=>'Berjaya','masa'=>'3 jam lepas'],
                ] as $log)
                <div class="flex items-start gap-4 p-4 bg-gray-50/50 rounded-xl hover:bg-white border border-transparent hover:border-gray-100 transition-all">
                    <div class="w-2 h-2 rounded-full mt-1.5 flex-shrink-0
                        {{ $log['status']==='Memproses'?'bg-blue-400 animate-pulse':($log['status']==='Berjaya'?'bg-emerald-400':'bg-amber-400') }}">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-[11px] font-bold text-slate-700">{{ $log['msg'] }}</p>
                        <p class="text-[9px] font-black text-slate-400 mt-0.5">{{ $log['masa'] }}</p>
                    </div>
                    <span class="badge {{ $log['status']==='Berjaya'?'badge-green':($log['status']==='Memproses'?'badge-blue':'badge-amber') }} flex-shrink-0">
                        {{ $log['status'] }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
