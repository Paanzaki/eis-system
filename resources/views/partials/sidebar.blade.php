<aside
    x-cloak
    :class="[
        sidebarOpen ? 'w-80 translate-x-0' : 'w-24 translate-x-0 -translate-x-full lg:translate-x-0',
        darkMode ? 'bg-[#0F172A] border-white/5' : 'bg-white border-gray-100'
    ]"
    class="fixed inset-y-0 left-0 z-[40] lg:static lg:flex flex-col border-r transition-all duration-500 ease-in-out shadow-2xl lg:shadow-none"
    x-data="{ openMenu: '{{ request()->segment(1) }}' }">

    <!-- Logo Section -->
    <div :class="darkMode ? 'border-white/5' : 'border-gray-50'"
        class="h-28 flex flex-col justify-center px-6 overflow-hidden border-b flex-shrink-0 transition-colors duration-500">
        <div class="flex items-center gap-3">
            <div class="flex items-center justify-center flex-shrink-0">
                <img src="{{ asset('images/jata-selangor.png') }}" alt="Jata" class="h-12">
            </div>
            <div x-show="sidebarOpen" x-transition.opacity class="flex items-center gap-3">
                <h1 :class="darkMode ? 'text-blue-400' : 'text-[#1E3A8A]'"
                    class="text-xl font-bold tracking-tighter uppercase italic whitespace-nowrap" style="font-family: Arial !important;">
                    EIS<span class="text-yellow-400 text-2xl">.</span>PNS
                </h1>
            </div>
        </div>
        <div x-show="sidebarOpen" class="flex mt-3 gap-1">
            <div class="h-0.5 w-10 bg-red-600"></div>
            <div class="h-0.5 w-6 bg-yellow-400"></div>
        </div>
    </div>

    <!-- MAIN NAVIGATION -->
    <nav class="flex-1 px-3 space-y-1.5 py-6 overflow-y-auto custom-scrollbar">

        {{-- ── Dashboard ── --}}
        <a href="{{ route('dashboard') }}"
            :class="[
                '{{ request()->routeIs('dashboard') }}'
                    ? (darkMode ? 'bg-blue-500/10 text-blue-400 border-l-4 border-yellow-400' : 'bg-blue-50 text-[#1E3A8A] border-l-4 border-yellow-400')
                    : (darkMode ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200' : 'text-gray-400 hover:bg-gray-50 hover:text-[#1E3A8A]')
            ]"
            class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
            </svg>
            <span x-show="sidebarOpen" class="text-[12px] font-bold uppercase tracking-widest whitespace-nowrap">Dashboard</span>
        </a>

        {{-- ── Perolehan ── --}}
        <div class="space-y-1">
            <button @click="openMenu === 'perolehan' ? openMenu = null : openMenu = 'perolehan'"
                :class="darkMode ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200' : 'text-gray-400 hover:bg-gray-50 hover:text-[#1E3A8A]'"
                class="w-full flex items-center justify-between px-4 py-3.5 rounded-xl transition-all">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <span x-show="sidebarOpen" class="text-[12px] font-bold uppercase tracking-widest">Pengurusan Perolehan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'perolehan' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                </svg>
            </button>
            <div x-show="openMenu === 'perolehan' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Perancangan Tahunan (PPT)</a>
                <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Pelaksanaan Perolehan</a>
                <div x-data="{ openRundingan: false }" class="space-y-1">
                    <button @click="openRundingan = !openRundingan" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="w-full flex items-center justify-between py-2 text-[12px] font-bold uppercase transition-colors">
                        <span class="text-[12px] font-bold uppercase">Rundingan Terus</span>
                        <svg class="w-3 h-3 transition-transform" :class="openRundingan ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                        </svg>
                    </button>
                    <div x-show="openRundingan && sidebarOpen" x-collapse x-cloak class="pl-4 space-y-1">
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Muktamad Rundingan Harga</a>
                    </div>
                </div>
                <a href="{{ route('perolehan.data') }}" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Tender</a>
                <div x-data="{ openKontrak: false }" class="space-y-1">
                    <button @click="openKontrak = !openKontrak" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="w-full flex items-center justify-between py-2 text-[12px] font-bold uppercase transition-colors">
                        <span class="text-[12px] font-bold uppercase">Kontrak</span>
                        <svg class="w-3 h-3 transition-transform" :class="openKontrak ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                        </svg>
                    </button>
                    <div x-show="openKontrak && sidebarOpen" x-collapse x-cloak class="pl-4 space-y-1">
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Pengurusan Kontrak (Perunding)</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Pengurusan Kontrak (Kerja)</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Maklumat Aset ── --}}
        <div class="space-y-1">
            <button @click="openMenu === 'aset' ? openMenu = null : openMenu = 'aset'"
                :class="darkMode ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200' : 'text-gray-400 hover:bg-gray-50 hover:text-[#1E3A8A]'"
                class="w-full flex items-center justify-between px-4 py-3.5 rounded-xl transition-all">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    <span x-show="sidebarOpen" class="text-[12px] font-bold uppercase tracking-widest">Perngurusan Aset</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'aset' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                </svg>
            </button>
            <div x-show="openMenu === 'aset' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <a href="{{ route('aset') }}" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Daftar Aset</a>
                <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Verifikasi Fizikal</a>
                <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Pindahan & Pelupusan</a>
                <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Kehilangan & Hapus Kira</a>
            </div>
        </div>

        {{-- ── Modul Laporan ── --}}
        <div class="space-y-1">
            <button @click="openMenu === 'laporan' ? openMenu = null : openMenu = 'laporan'"
                :class="darkMode ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200' : 'text-gray-400 hover:bg-gray-50 hover:text-[#1E3A8A]'"
                class="w-full flex items-center justify-between px-4 py-3.5 rounded-xl transition-all">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span x-show="sidebarOpen" class="text-[12px] font-bold uppercase tracking-widest">Laporan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'laporan' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>     
                </svg> 
            </button>
            <div x-show="openMenu === 'laporan' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Laporan Suku Tahun JKPAK</a>
                <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Laporan Eksekutif Tahunan JKPAK</a>
                <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase    transition-colors">Laporan Naziran</a>
            </div>
        </div>

        {{-- ── Modul Naziran ── --}}
        <div class="space-y-1">
            <button @click="openMenu === 'naziran' ? openMenu = null : openMenu = 'naziran'"
                :class="darkMode ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200' : 'text-gray-400 hover:bg-gray-50 hover:text-[#1E3A8A]'"
                class="w-full flex items-center justify-between px-4 py-3.5 rounded-xl transition-all">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span x-show="sidebarOpen" class="text-[12px] font-bold uppercase tracking-widest"> Naziran</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'naziran' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                </svg>
            </button>
            <div x-show="openMenu === 'naziran' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <a href="{{ route('naziran.perolehan') }}" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Naziran Perolehan</a>
                <a href="{{ route('naziran.aset') }}" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Naziran Aset</a>
            </div>
        </div>

        {{-- ── Chatbot AI ── --}}
        <a href="{{ route('chatbot') }}"
            :class="[
                '{{ request()->routeIs('chatbot') }}'
                    ? (darkMode ? 'bg-blue-500/10 text-blue-400 border-l-4 border-yellow-400' : 'bg-blue-50 text-[#1E3A8A] border-l-4 border-yellow-400')
                    : (darkMode ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200' : 'text-gray-400 hover:bg-gray-50 hover:text-[#1E3A8A]')
            ]"
            class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
            </svg>
            <span x-show="sidebarOpen" class="text-[12px] font-bold uppercase tracking-widest">FAQ</span>
        </a>

        {{-- ── Migrasi Data ── --}}
        <a href="#"
            :class="darkMode ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200' : 'text-gray-400 hover:bg-gray-50 hover:text-[#1E3A8A]'"
            class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
            </svg>
            <span x-show="sidebarOpen" class="text-[12px] font-bold uppercase tracking-widest">Pengurusan Data</span>
        </a>

    </nav>

    <!-- SYSTEM CONTROL (BOTTOM) -->
    <div :class="darkMode ? 'border-white/5 bg-white/5' : 'border-gray-50 bg-gray-50/30'"
        class="px-3 pb-4 space-y-1.5 border-t pt-4 transition-colors duration-500">

        {{-- ── Tetapan ── --}}
        <div class="space-y-1">
            <button @click="openMenu === 'admin' ? openMenu = null : openMenu = 'admin'"
                :class="darkMode ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200 hover:shadow-none' : 'text-gray-400 hover:bg-white hover:text-[#1E3A8A] hover:shadow-sm'"
                class="w-full flex items-center justify-between px-4 py-3 rounded-xl transition-all">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                    </svg>
                    <span x-show="sidebarOpen" class="text-[12px] font-bold uppercase tracking-widest">Tetapan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'admin' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                </svg>
            </button>
            <div x-show="openMenu === 'admin' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Pengguna</a>
                <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Peranan</a>
                <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Jabatan</a>
            </div>
        </div>

        {{-- ── Penyelenggaraan ── --}}
        <div class="space-y-1">
            <button @click="openMenu === 'maint' ? openMenu = null : openMenu = 'maint'"
                :class="darkMode ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200 hover:shadow-none' : 'text-gray-400 hover:bg-white hover:text-[#1E3A8A] hover:shadow-sm'"
                class="w-full flex items-center justify-between px-4 py-3 rounded-xl transition-all">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"/>
                        <circle cx="12" cy="12" r="3" stroke-width="2"/>
                    </svg>
                    <span x-show="sidebarOpen" class="text-[12px] font-bold uppercase tracking-widest">Penyelenggaraan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'maint' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                </svg>
            </button>
            <div x-show="openMenu === 'maint' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <div x-data="{ openSPerolehan: false }" class="space-y-1">
                    <button @click="openSPerolehan = !openSPerolehan" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="w-full flex items-center justify-between py-2 text-[12px] font-bold uppercase transition-colors">
                        <span class="text-[12px] font-bold uppercase">Selenggara Perolehan</span>
                        <svg class="w-3 h-3 transition-transform" :class="openSPerolehan ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                        </svg>
                    </button>
                    <div x-show="openSPerolehan && sidebarOpen" x-collapse x-cloak class="pl-4 space-y-1">
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Kategori Perolehan</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Kaedah Perolehan</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Sumber Peruntukan</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Kategori Jabatan/Agensi</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Jabatan/Agensi Memohon</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Kategori Naziran</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Borang Naziran</a>
                    </div>
                </div>
                <div x-data="{ openSAset: false }" class="space-y-1">
                    <button @click="openSAset = !openSAset" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="w-full flex items-center justify-between py-2 text-[12px] font-bold uppercase transition-colors">
                        <span class="text-[12px] font-bold uppercase">Selenggara Aset</span>
                        <svg class="w-3 h-3 transition-transform" :class="openSAset ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                        </svg>
                    </button>
                    <div x-show="openSAset && sidebarOpen" x-collapse x-cloak class="pl-4 space-y-1">
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Kategori Aset</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Sub-Kategori Aset</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Status Aset</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Kuasa Melulus Pelupusan</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Kaedah Pelupusan</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Kategori Naziran</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Borang Naziran</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Had Nilai Aset</a>
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400' : 'text-gray-500 hover:text-[#1E3A8A]'" class="block py-2 text-[12px] font-bold uppercase transition-colors">Templat Dokumen Aset</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Help & Support ── --}}
        <a href="#"
            :class="darkMode ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200 hover:shadow-none' : 'text-gray-400 hover:bg-white hover:text-[#1E3A8A] hover:shadow-sm'"
            class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <span x-show="sidebarOpen" class="text-[12px] font-bold uppercase tracking-widest">Help & Support</span>
        </a>

        {{-- ── Logout ── --}}
        <form method="POST" action="{{ route('logout') }}" class="w-full pt-2">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-4 py-3 transition-all rounded-xl group"
                :class="[
                    sidebarOpen ? 'px-5 gap-5' : 'px-0',
                    darkMode ? 'text-red-400 hover:text-red-300 hover:bg-red-500/10' : 'text-red-500 hover:text-red-600 hover:bg-red-50'
                ]">
                <svg class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-6 0v-1m6-10V7a3 3 0 00-6 0v1"/>
                </svg>
                <span x-show="sidebarOpen" x-transition.opacity class="text-[12px] font-bold uppercase tracking-[0.2em] whitespace-nowrap">Log Keluar</span>
            </button>
        </form>
    </div>
</aside>