<header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8 relative z-20">
    <div class="flex items-center gap-6">
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 text-gray-400 hover:text-[#1E3A8A] transition-colors duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16M4 18h7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <h2 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.4em] italic">
            EIS <span class="text-[#1E3A8A]">Selangor</span> — PNS Portal
        </h2>
    </div>

    <div class="hidden md:flex items-center gap-4">
        <div class="flex flex-col items-end">
            <span class="text-[9px] font-black text-[#1E3A8A] uppercase">Server Status</span>
            <span class="text-[8px] font-bold text-green-500 uppercase tracking-tighter italic">Optimized</span>
        </div>
        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
    </div>
</header>