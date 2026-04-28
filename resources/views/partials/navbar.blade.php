<nav class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between z-30 sticky top-0">
    <div class="flex items-center">
        <button @click="mobileMenu = true; sidebarOpen = true" class="lg:hidden p-2 mr-3 text-slate-600 hover:bg-slate-50 rounded-xl transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <button @click="sidebarOpen = !sidebarOpen" class="hidden lg:flex p-2 mr-6 text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50 rounded-xl transition-all">
            <svg class="w-5 h-5 transition-transform duration-500" :class="!sidebarOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
        </button>
        
        <h2 class="hidden md:block text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">
            Dashboard <span class="text-blue-600">/</span> {{ Request::segment(1) ?? 'Overview' }}
        </h2>
    </div>

    <div class="flex items-center gap-4">
        <div class="text-right hidden sm:block">
            <p class="text-[9px] font-black text-[#1E3A8A] uppercase italic leading-none">{{ \Carbon\Carbon::now()->format('d F Y') }}</p>
            <p class="text-[8px] font-bold text-slate-300 uppercase mt-1 tracking-tighter italic">Sabak Bernam, Selangor</p>
        </div>
    </div>
</nav>