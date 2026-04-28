<aside 
    :class="sidebarOpen ? 'w-80' : 'w-24'" 
    class="hidden lg:flex flex-col bg-white border-r border-gray-100 transition-all duration-500 ease-in-out relative z-30"
    x-data="{ openMenu: '{{ request()->segment(1) }}' }">
    
    <div class="h-24 flex items-center px-8 overflow-hidden">
        <div class="w-10 h-10 bg-[#1E3A8A] rounded-2xl flex items-center justify-center shadow-lg flex-shrink-0">
            <span class="text-white text-sm font-black italic">P</span>
        </div>
        <h1 x-show="sidebarOpen" class="ml-4 text-xl font-black text-[#1E3A8A] tracking-tighter uppercase italic whitespace-nowrap">
            EIS<span class="text-blue-500">.</span>PNS
        </h1>
    </div>

    <nav class="flex-1 px-4 space-y-2 py-4 overflow-y-auto custom-scrollbar">
        
        <div class="relative group">
            <a href="{{ route('dashboard') }}" 
                class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-[#1E3A8A]' : 'text-gray-400 hover:bg-gray-50' }}">
                <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                <span x-show="sidebarOpen" class="text-[11px] font-black uppercase tracking-widest">Dashboard</span>
            </a>
        </div>

        

        <div class="space-y-1">
            <button @click="sidebarOpen ? (openMenu === 'perolehan' ? openMenu = null : openMenu = 'perolehan') : (sidebarOpen = true, openMenu = 'perolehan')" 
                class="w-full flex items-center justify-between px-4 py-4 rounded-2xl transition-all {{ request()->is('perolehan*') ? 'bg-blue-50/50 text-[#1E3A8A]' : 'text-gray-400 hover:bg-gray-50' }}">
                <div class="flex items-center gap-4">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span x-show="sidebarOpen" class="text-[11px] font-black uppercase tracking-widest">Perolehan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-4 h-4 transition-transform" :class="openMenu === 'perolehan' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2"/></svg>
            </button>
            <div x-show="openMenu === 'perolehan' && sidebarOpen" x-collapse class="pl-14 space-y-1">
                <a href="{{ route('perolehan') }}" class="block py-2 text-[10px] font-black {{ request()->routeIs('perolehan') ? 'text-blue-600' : 'text-gray-400' }} hover:text-blue-600 uppercase tracking-widest">Pendaftaran</a>
                <a href="{{ route('perolehan.data') }}" class="block py-2 text-[10px] font-black {{ request()->routeIs('perolehan.data') ? 'text-blue-600' : 'text-gray-400' }} hover:text-blue-600 uppercase tracking-widest">Analitik & ETL</a>
                <a href="{{ route('perolehan.carian') }}" class="block py-2 text-[10px] font-black {{ request()->routeIs('perolehan.carian') ? 'text-blue-600' : 'text-gray-400' }} hover:text-blue-600 uppercase tracking-widest">Carian Rekod</a>
            </div>
        </div>

        

        <div class="space-y-1">
            <button @click="sidebarOpen ? (openMenu === 'aset' ? openMenu = null : openMenu = 'aset') : (sidebarOpen = true, openMenu = 'aset')" 
                class="w-full flex items-center justify-between px-4 py-4 rounded-2xl transition-all {{ request()->is('aset*') ? 'bg-blue-50/50 text-[#1E3A8A]' : 'text-gray-400 hover:bg-gray-50' }}">
                <div class="flex items-center gap-4">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    <span x-show="sidebarOpen" class="text-[11px] font-black uppercase tracking-widest">Pengurusan Aset</span>
                </div>
                <svg x-show="sidebarOpen" class="w-4 h-4 transition-transform" :class="openMenu === 'aset' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2"/></svg>
            </button>
            <div x-show="openMenu === 'aset' && sidebarOpen" x-collapse class="pl-14 space-y-1">
                <a href="{{ route('aset') }}" class="block py-2 text-[10px] font-black {{ request()->routeIs('aset') ? 'text-blue-600' : 'text-gray-400' }} hover:text-blue-600 uppercase tracking-widest">Daftar Harta</a>
                <a href="{{ route('aset.pemeriksaan') }}" class="block py-2 text-[10px] font-black {{ request()->routeIs('aset.pemeriksaan') ? 'text-blue-600' : 'text-gray-400' }} hover:text-blue-600 uppercase tracking-widest">Pemeriksaan</a>
                <a href="{{ route('aset.pelupusan') }}" class="block py-2 text-[10px] font-black {{ request()->routeIs('aset.pelupusan') ? 'text-blue-600' : 'text-gray-400' }} hover:text-blue-600 uppercase tracking-widest">Pelupusan & Hapus Kira</a>
                <a href="{{ route('aset.pelantikan') }}" class="block py-2 text-[10px] font-black {{ request()->routeIs('aset.pelantikan') ? 'text-blue-600' : 'text-gray-400' }} hover:text-blue-600 uppercase tracking-widest">Pelantikan</a>
            </div>
        </div>

        <div class="relative group">
            <a href="{{ route('naziran') }}" 
                class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all {{ request()->routeIs('naziran') ? 'bg-blue-50 text-[#1E3A8A]' : 'text-gray-400 hover:bg-gray-50' }}">
                <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <span x-show="sidebarOpen" class="text-[11px] font-black uppercase tracking-widest">Modul Naziran</span>
            </a>
        </div>

        <a href="{{ route('chatbot') }}" 
            class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all {{ request()->routeIs('chatbot') ? 'bg-blue-50 text-[#1E3A8A]' : 'text-gray-400 hover:bg-gray-50' }}">
            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            <span x-show="sidebarOpen" class="text-[11px] font-black uppercase tracking-widest">Chatbot AI</span>
        </a>

        <div class="space-y-1">
            <button @click="sidebarOpen ? (openMenu === 'admin' ? openMenu = null : openMenu = 'admin') : (sidebarOpen = true, openMenu = 'admin')" 
                class="w-full flex items-center justify-between px-4 py-4 rounded-2xl transition-all {{ request()->is('admin*') ? 'bg-blue-50/50 text-[#1E3A8A]' : 'text-gray-400 hover:bg-gray-50' }}">
                <div class="flex items-center gap-4">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"/><circle cx="12" cy="12" r="3" stroke-width="2"/></svg>
                    <span x-show="sidebarOpen" class="text-[11px] font-black uppercase tracking-widest">Tetapan </span>
                </div>
                <svg x-show="sidebarOpen" class="w-4 h-4 transition-transform" :class="openMenu === 'admin' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2"/></svg>
            </button>
            <div x-show="openMenu === 'admin' && sidebarOpen" x-collapse class="pl-14 space-y-1">
                <a href="{{ route('admin.rbac') }}" class="block py-2 text-[10px] font-black {{ request()->routeIs('admin.rbac') ? 'text-blue-600' : 'text-gray-400' }} hover:text-blue-600 uppercase tracking-widest">RBAC Control</a>
                <a href="{{ route('admin.config') }}" class="block py-2 text-[10px] font-black {{ request()->routeIs('admin.config') ? 'text-blue-600' : 'text-gray-400' }} hover:text-blue-600 uppercase tracking-widest">System Config</a>
                <a href="{{ route('admin.audit') }}" class="block py-2 text-[10px] font-black {{ request()->routeIs('admin.audit') ? 'text-blue-600' : 'text-gray-400' }} hover:text-blue-600 uppercase tracking-widest italic">Audit Logs</a>
            </div>
        </div>
    </nav>

    

    

    <div class="p-4 border-t border-gray-50 space-y-4 flex flex-col items-center">
        
        <div x-show="sidebarOpen" x-transition.opacity
            class="flex items-center gap-3 px-3 py-1 bg-green-50 rounded-full w-max">
            <div class="w-1.5 h-1.5 bg-green-500 rounded-full"></div>
            <span class="text-[8px] font-black text-green-600 uppercase">MyDigitalID Verified</span>
        </div>

        <a href="{{ route('profile.edit') }}" 
            class="flex items-center justify-center p-2 lg:p-3 bg-gray-50 rounded-2xl border border-gray-100 hover:bg-white hover:shadow-md transition-all overflow-hidden w-full max-w-[56px] lg:max-w-none"
            :class="sidebarOpen ? 'gap-4' : 'gap-0'">
            
            <div class="w-10 h-10 rounded-full bg-[#1E3A8A] text-white flex items-center justify-center text-xs font-black flex-shrink-0 shadow-md">
                {{ substr(Auth::user()->name, 0, 2) }}
            </div>

            <div x-show="sidebarOpen" x-transition.opacity class="flex-1 min-w-0 overflow-hidden text-left">
                <p class="text-[10px] font-black text-gray-800 truncate uppercase leading-tight">{{ Auth::user()->name }}</p>
                <p class="text-[8px] font-bold text-blue-500 uppercase tracking-tighter">Executive PNS</p>
            </div>
        </a>

        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" 
                class="w-full flex items-center justify-center py-3 text-red-400/70 hover:text-red-600 transition-all rounded-2xl hover:bg-red-50 group overflow-hidden"
                :class="sidebarOpen ? 'px-5 gap-5' : 'px-0 gap-0'">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-6 0v-1m6-10V7a3 3 0 00-6 0v1" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span x-show="sidebarOpen" x-transition.opacity class="text-[10px] font-black uppercase tracking-[0.2em] whitespace-nowrap">Log Keluar</span>
            </button>
        </form>
    </div>
</aside>