<aside 
    x-cloak
    :class="sidebarOpen ? 'w-80 translate-x-0' : 'w-24 translate-x-0 -translate-x-full lg:translate-x-0'" 
    class="fixed inset-y-0 left-0 z-[40] lg:static lg:flex flex-col bg-white border-r border-gray-100 transition-all duration-500 ease-in-out shadow-2xl lg:shadow-none"
    x-data="{ openMenu: '{{ request()->segment(1) }}' }">
    
    <!-- Logo Section -->
    <div class="h-28 flex flex-col justify-center px-6 overflow-hidden border-b border-gray-50 flex-shrink-0">
        <div class="flex items-center gap-3">
            <div class="flex items-center justify-center flex-shrink-0">
                <img src="{{ asset('images/jata-selangor.png') }}" alt="Jata" class="h-12">
            </div>
            <div x-show="sidebarOpen" x-transition.opacity class="flex items-center gap-3">
                <h1 class="text-xl font-bold text-[#1E3A8A] tracking-tighter uppercase italic whitespace-nowrap" style="font-family: Arial !important;">
                    EIS<span class="text-yellow-400 text-2xl">.</span>PNS
                </h1>
            </div>
        </div>
        <div x-show="sidebarOpen" class="flex mt-3 gap-1">
            <div class="h-0.5 w-10 bg-red-600"></div>
            <div class="h-0.5 w-6 bg-yellow-400"></div>
        </div>
    </div>

    <!-- MAIN NAVIGATION (TOP) -->
    <nav class="flex-1 px-3 space-y-1.5 py-6 overflow-y-auto custom-scrollbar">
        
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" 
            class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-[#1E3A8A] border-l-4 border-yellow-400' : 'text-gray-400 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            <span x-show="sidebarOpen" class="text-[10px] font-bold uppercase tracking-widest whitespace-nowrap" style="font-family: Arial !important;">Dashboard</span>
        </a>

        <!-- Modul Asas & Pentadbiran -->
        <div class="space-y-1">
            <button @click="openMenu === 'asas' ? openMenu = null : openMenu = 'asas'" class="w-full flex items-center justify-between px-4 py-3.5 rounded-xl text-gray-400 hover:bg-gray-50">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span x-show="sidebarOpen" class="text-[10px] font-bold uppercase tracking-widest">Asas & Pentadbiran</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'asas' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2.5"/></svg>
            </button>
            <div x-show="openMenu === 'asas' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Profil & Akses</a>
            </div>
        </div>

        <!-- Perolehan (FULL SUBMENU) -->
        <div class="space-y-1">
            <button @click="openMenu === 'perolehan' ? openMenu = null : openMenu = 'perolehan'" class="w-full flex items-center justify-between px-4 py-3.5 rounded-xl text-gray-400 hover:bg-gray-50">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span x-show="sidebarOpen" class="text-[10px] font-bold uppercase tracking-widest">Perolehan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'perolehan' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2.5"/></svg>
            </button>
            <div x-show="openMenu === 'perolehan' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Perancangan Tahunan (PPT)</a>
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Pelaksanaan Perolehan</a>
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Tender & Kontrak</a>
                <a href="{{ route('perolehan.data') }}" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Analitik & ETL</a>
            </div>
        </div>

        <!-- Maklumat Aset (FULL SUBMENU) -->
        <div class="space-y-1">
            <button @click="openMenu === 'aset' ? openMenu = null : openMenu = 'aset'" class="w-full flex items-center justify-between px-4 py-3.5 rounded-xl text-gray-400 hover:bg-gray-50">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    <span x-show="sidebarOpen" class="text-[10px] font-bold uppercase tracking-widest">Maklumat Aset</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'aset' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2.5"/></svg>
            </button>
            <div x-show="openMenu === 'aset' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <a href="{{ route('aset') }}" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Daftar Modal & Rendah</a>
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Verifikasi Fizikal</a>
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Pindahan & Pelupusan</a>
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Kehilangan & Hapus Kira</a>
            </div>
        </div>

        <!-- Modul Naziran -->
        <div class="space-y-1">
            <button @click="openMenu === 'naziran' ? openMenu = null : openMenu = 'naziran'" class="w-full flex items-center justify-between px-4 py-3.5 rounded-xl text-gray-400 hover:bg-gray-50">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span x-show="sidebarOpen" class="text-[10px] font-bold uppercase tracking-widest">Modul Naziran</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'naziran' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2.5"/></svg>
            </button>
            <div x-show="openMenu === 'naziran' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <a href="{{ route('naziran.perolehan') }}" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Naziran Perolehan</a>
                <a href="{{ route('naziran.aset') }}" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Naziran Aset</a>
            </div>
        </div>

        <!-- Chatbot AI -->
        <a href="{{ route('chatbot') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all {{ request()->routeIs('chatbot') ? 'bg-blue-50 text-[#1E3A8A]' : 'text-gray-400 hover:bg-gray-50' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            <span x-show="sidebarOpen" class="text-[10px] font-bold uppercase tracking-widest">Chatbot AI</span>
        </a>

        <!-- Migrasi Data -->
        <a href="#" class="flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all text-gray-400 hover:bg-gray-50">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
            <span x-show="sidebarOpen" class="text-[10px] font-bold uppercase tracking-widest">Migrasi Data</span>
        </a>

    </nav>

    <!-- SYSTEM CONTROL (BOTTOM SECTION) -->
    <div class="px-3 pb-4 space-y-1.5 border-t border-gray-50 pt-4 bg-gray-50/30">
        
        <!-- Penyelenggaraan -->
        <div class="space-y-1">
            <button @click="openMenu === 'maint' ? openMenu = null : openMenu = 'maint'" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-400 hover:bg-white hover:shadow-sm transition-all">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"/><circle cx="12" cy="12" r="3" stroke-width="2"/></svg>
                    <span x-show="sidebarOpen" class="text-[10px] font-bold uppercase tracking-widest">Penyelenggaraan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'maint' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2.5"/></svg>
            </button>
            <div x-show="openMenu === 'maint' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Senggara Tetapan Sistem</a>
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Senggara Perolehan</a>
                <a href="{{ route('penyelenggaraan') }}" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Senggara Aset</a>
            </div>
        </div>

        <!-- Tetapan -->
        <div class="space-y-1">
            <button @click="openMenu === 'admin' ? openMenu = null : openMenu = 'admin'" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-400 hover:bg-white hover:shadow-sm transition-all">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                    <span x-show="sidebarOpen" class="text-[10px] font-bold uppercase tracking-widest">Tetapan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 transition-transform" :class="openMenu === 'admin' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2.5"/></svg>
            </button>
            <div x-show="openMenu === 'admin' && sidebarOpen" x-collapse x-cloak class="pl-12 space-y-1">
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Pendaftaran Baru</a>
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Pelantikan Pegawai</a>
                <a href="#" class="block py-2 text-[9px] font-bold text-gray-400 hover:text-blue-600 uppercase">Audit Logs</a>
            </div>
        </div>

        <!-- Support -->
        <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-xl text-gray-400 hover:bg-white hover:shadow-sm transition-all">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            <span x-show="sidebarOpen" class="text-[10px] font-bold uppercase tracking-widest">Help & Support</span>
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="w-full pt-2">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center py-3 text-red-400 hover:text-red-600 hover:bg-red-50 transition-all rounded-xl group" :class="sidebarOpen ? 'px-5 gap-5' : 'px-0'">
                <svg class="w-5 h-5 flex-shrink-0 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-6 0v-1m6-10V7a3 3 0 00-6 0v1"/></svg>
                <span x-show="sidebarOpen" x-transition.opacity class="text-[9px] font-bold uppercase tracking-[0.2em] whitespace-nowrap">Log Keluar</span>
            </button>
        </form>
    </div>
</aside>