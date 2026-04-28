@extends('layouts.dashboard')

@section('content')
<style>
    body { background-color: #F8FAFC; }
    /* Buang max-width limit untuk penuhi ruang skrin */
    .profile-container { width: 100%; padding: 0 1rem; }
    .rounded-header { border-radius: 2rem; }
    
    /* Besarkan input supaya nampak lebih "commanding" */
    .input-heavy { 
        background: #F9FAFB; 
        border: 2px solid #F1F5F9; 
        border-radius: 1rem; 
        padding: 1.25rem 1.5rem; 
        font-size: 13px; 
        font-weight: 800; 
        width: 100%; 
        outline: none; 
        transition: all 0.3s ease; 
    }
    .input-heavy:focus { 
        background: white; 
        border-color: #1E3A8A; 
        box-shadow: 0 10px 20px -5px rgba(30, 58, 138, 0.1); 
    }
    
    .label-heavy {
        font-size: 11px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: #64748B;
        margin-left: 0.5rem;
        margin-bottom: 0.75rem;
        display: block;
    }
</style>

<div class="profile-container space-y-12">
    
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b-2 border-gray-100 pb-10">
        <div class="space-y-2">
            <div class="flex items-center gap-2 mb-4">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-5xl font-black text-[#1E3A8A] tracking-tighter uppercase italic leading-none">
                Profil <span class="text-blue-600">Eksekutif<span class="text-yellow-400">.</span></span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-4 italic">Pengurusan Akaun & Sekuriti Digital MyDigitalID</p>
        </div>
        
        <div class="flex items-center gap-4 bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
            <div class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
            </div>
            <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest">Sesi Aktif: Terjamin</span>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-10">
        
        <div class="col-span-12 lg:col-span-4 space-y-8">
            <div class="bg-white p-12 rounded-[3rem] shadow-xl shadow-slate-200/50 border border-gray-50 flex flex-col items-center text-center relative overflow-hidden group">
                <div class="absolute -top-20 -left-20 w-48 h-48 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="relative z-10">
                    <div class="relative inline-block mb-8">
                        <div class="w-40 h-40 rounded-[2.5rem] bg-[#1E3A8A] flex items-center justify-center text-5xl font-black text-white shadow-2xl border-8 border-white group-hover:rotate-3 transition-transform">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                        <button class="absolute -bottom-2 -right-2 bg-yellow-400 p-4 rounded-2xl shadow-xl border-4 border-white hover:bg-red-600 hover:text-white transition-all transform hover:scale-110">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </button>
                    </div>
                    
                    <h4 class="text-2xl font-black text-slate-800 uppercase tracking-tighter leading-tight">{{ Auth::user()->name }}</h4>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mt-3 italic">Software Intern @ PNS Selangor</p>
                    
                    <div class="mt-10 w-full space-y-4">
                        <div class="flex items-center justify-between p-5 bg-green-50 rounded-2xl border border-green-100">
                            <span class="text-[10px] font-black text-green-700 uppercase italic">MyDigitalID Status</span>
                            <span class="px-4 py-1.5 bg-white rounded-lg text-[9px] font-black text-green-600 shadow-sm uppercase">Verified</span>
                        </div>
                        <div class="flex items-center justify-between p-5 bg-blue-50 rounded-2xl border border-blue-100">
                            <span class="text-[10px] font-black text-blue-700 uppercase italic">System Privilege</span>
                            <span class="px-4 py-1.5 bg-white rounded-lg text-[9px] font-black text-blue-600 shadow-sm uppercase">Super Admin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-8 space-y-10">
            
            <div class="bg-white p-12 rounded-[3rem] shadow-sm border border-gray-100">
                <div class="flex items-center gap-4 mb-12 border-l-4 border-yellow-400 pl-6">
                    <h4 class="text-[14px] font-black text-[#1E3A8A] uppercase tracking-widest italic">Konfigurasi Maklumat Peribadi</h4>
                </div>
                
                <form class="grid grid-cols-2 gap-10">
                    <div class="col-span-2 lg:col-span-1 space-y-2">
                        <label class="label-heavy">Nama Penuh Pegawai</label>
                        <input type="text" value="{{ Auth::user()->name }}" class="input-heavy">
                    </div>
                    <div class="col-span-2 lg:col-span-1 space-y-2">
                        <label class="label-heavy">Alamat Emel Rasmi</label>
                        <input type="email" value="{{ Auth::user()->email }}" class="input-heavy">
                    </div>
                    <div class="col-span-2 lg:col-span-1 space-y-2">
                        <label class="label-heavy">No. Kad Pengenalan</label>
                        <input type="text" value="XXXXXX-XX-XXXX" class="input-heavy" readonly>
                        <p class="text-[8px] font-bold text-slate-300 italic uppercase mt-2">* Dikunci oleh MyDigitalID Integration</p>
                    </div>
                    <div class="col-span-2 lg:col-span-1 space-y-2">
                        <label class="label-heavy">Jabatan / Agensi</label>
                        <input type="text" value="Perbendaharaan Negeri Selangor" class="input-heavy" readonly>
                    </div>
                    
                    <div class="col-span-2 flex justify-end pt-6">
                        <button type="submit" class="bg-[#1E3A8A] hover:bg-red-700 text-white px-12 py-5 rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] shadow-2xl shadow-blue-900/20 transition-all transform hover:scale-105 active:scale-95 italic">
                            Simpan Kemaskini Profil
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white p-12 rounded-[3rem] shadow-sm border border-gray-100">
                <div class="flex items-center gap-4 mb-10 border-l-4 border-red-600 pl-6">
                    <h4 class="text-[14px] font-black text-[#1E3A8A] uppercase tracking-widest italic">Kawalan Keselamatan & Privasi</h4>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-center justify-between p-8 bg-slate-50 rounded-[2rem] border border-slate-100 group hover:bg-white hover:border-blue-200 transition-all">
                        <div class="space-y-1">
                            <p class="text-[11px] font-black text-slate-700 uppercase tracking-tighter italic">Kata Laluan Sistem</p>
                            <p class="text-[9px] font-bold text-slate-400 uppercase">Kekuatan: Sangat Kuat</p>
                        </div>
                        <button class="px-6 py-3 bg-white border-2 border-gray-100 rounded-xl text-[10px] font-black uppercase text-[#1E3A8A] hover:bg-blue-600 hover:text-white transition-all shadow-sm">Tukar</button>
                    </div>

                    <div class="flex items-center justify-between p-8 bg-red-50 rounded-[2rem] border border-red-100 group">
                        <div class="space-y-1">
                            <p class="text-[11px] font-black text-red-600 uppercase tracking-tighter italic">Nyahaktif Akaun</p>
                            <p class="text-[9px] font-bold text-red-400 uppercase">Akses akan dipadam serta-merta</p>
                        </div>
                        <button class="px-6 py-3 bg-white border-2 border-red-200 rounded-xl text-[10px] font-black uppercase text-red-600 hover:bg-red-600 hover:text-white transition-all shadow-sm">Padam</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection