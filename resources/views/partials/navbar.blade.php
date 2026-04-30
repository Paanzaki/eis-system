<nav class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between z-30 sticky top-0">
    <!-- LEFT: SIDEBAR TOGGLE -->
    <div class="flex items-center">
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 text-slate-400 hover:text-[#1E3A8A] rounded-xl transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M4 6h16M4 12h16m-7 6h7"/></svg>
        </button>
    </div>

    <!-- CENTER: GLOBAL SEARCH (High Visibility) -->
    <div class="flex-1 max-w-xl px-8 hidden md:block">
        <div class="relative group">
            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-[#1E3A8A]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="3"/></svg>
            </span>
            <input type="text" placeholder="Carian Global Eksekutif..." 
                class="block w-full pl-12 pr-4 py-2.5 border-2 border-gray-200 rounded-2xl bg-gray-50/80 text-[10px] font-bold uppercase tracking-widest focus:ring-4 focus:ring-blue-50 focus:border-[#1E3A8A] focus:bg-white transition-all placeholder:text-slate-400"
                style="font-family: Arial !important;">
        </div>
    </div>

    <!-- RIGHT: UTILITIES & PROFILE -->
    <div class="flex items-center gap-3">
        
        <!-- DARK MODE TOGGLE (Now on the left of Notification) -->
        <button @click="darkMode = !darkMode" class="p-2.5 text-slate-400 hover:bg-gray-50 rounded-xl transition-all">
            <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
            <svg x-show="darkMode" class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M12 3v1m0 16v1m9-9h-1M4 12H3m12 8a8 8 0 110-16 8 8 0 010 16z"/></svg>
        </button>

        <!-- NOTIFICATION BUTTON -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="p-2.5 text-slate-400 hover:bg-gray-50 rounded-xl transition-all relative">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <!-- Badge Notifikasi (3 Pesan) -->
                <span class="absolute top-2 right-2 w-4 h-4 bg-red-600 border-2 border-white rounded-full text-[8px] text-white flex items-center justify-center font-bold">3</span>
            </button>

            <!-- Dropdown Content -->
            <div x-show="open" @click.away="open = false" x-cloak 
                class="absolute right-0 mt-3 w-80 bg-white border border-gray-100 rounded-2xl shadow-2xl z-50 overflow-hidden">
                
                <div class="p-4 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                    <h3 class="text-[10px] font-bold text-[#1E3A8A] uppercase tracking-widest" style="font-family: Arial !important;">Notifikasi Terkini</h3>
                    <span class="text-[8px] font-bold text-blue-600 uppercase cursor-pointer hover:underline">Tandai Semua Dibaca</span>
                </div>

                <div class="max-h-80 overflow-y-auto">
                    <!-- Demo 1: Perolehan -->
                    <div class="p-4 border-b border-gray-50 hover:bg-blue-50/30 transition-colors cursor-pointer">
                        <div class="flex gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2.5"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-800 uppercase" style="font-family: Arial !important;">Kelulusan PPT 2026</p>
                                <p class="text-[9px] text-slate-500 mt-1 leading-relaxed">Perancangan Perolehan Tahunan (PPT) bagi Sektor IT telah diluluskan oleh Pegawai Kewangan Negeri.</p>
                                <p class="text-[8px] text-slate-300 mt-2 font-bold uppercase">2 Jam Yang Lalu</p>
                            </div>
                        </div>
                    </div>

                    <!-- Demo 2: Aset -->
                    <div class="p-4 border-b border-gray-50 hover:bg-yellow-50/30 transition-colors cursor-pointer">
                        <div class="flex gap-3">
                            <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-width="2.5"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-800 uppercase" style="font-family: Arial !important;">Pemeriksaan Aset Alih</p>
                                <p class="text-[9px] text-slate-500 mt-1 leading-relaxed">Peringatan: 15 unit aset di Jabatan Audit Selangor belum dikemaskini status verifikasi fizikalnya.</p>
                                <p class="text-[8px] text-slate-300 mt-2 font-bold uppercase">5 Jam Yang Lalu</p>
                            </div>
                        </div>
                    </div>

                    <!-- Demo 3: Sistem/Audit -->
                    <div class="p-4 hover:bg-red-50/30 transition-colors cursor-pointer">
                        <div class="flex gap-3">
                            <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke-width="2.5"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-slate-800 uppercase" style="font-family: Arial !important;">Amaran Keselamatan</p>
                                <p class="text-[9px] text-slate-500 mt-1 leading-relaxed">Percubaan akses tidak sah dikesan pada Modul Naziran Perolehan. Sila semak Audit Log segera.</p>
                                <p class="text-[8px] text-slate-300 mt-2 font-bold uppercase">Semalam, 11:45 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-3 border-t border-gray-50 bg-gray-50/50 text-center">
                    <a href="#" class="text-[9px] font-bold text-[#1E3A8A] uppercase tracking-widest hover:text-red-600 transition-colors">Lihat Semua Notifikasi</a>
                </div>
            </div>
        </div>

        <!-- PROFILE & DATE GROUP -->
        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 pl-4 border-l border-gray-100 group">
            <div class="text-right hidden sm:block">
                <p class="text-[11px] font-bold text-[#1E3A8A] uppercase italic leading-none" style="font-family: Arial !important;">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-[9px] font-bold text-slate-300 uppercase mt-1" style="font-family: Arial !important;">
                    {{ \Carbon\Carbon::now()->format('d F Y') }}
                </p>
            </div>
            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#1E3A8A] to-blue-600 flex items-center justify-center text-white text-xs font-bold border-2 border-white shadow-sm group-hover:scale-105 transition-all">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
        </a>

    </div>
</nav>