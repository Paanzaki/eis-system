<nav class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between z-30 sticky top-0">
    <div class="flex items-center">
        <button @click="sidebarOpen = !sidebarOpen" class="hidden lg:flex p-2 mr-6 text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50 rounded-xl transition-all">
            <svg class="w-5 h-5 transition-transform duration-500" :class="!sidebarOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
        </button>

        <div class="flex items-center gap-3">
            <h2 class="text-[10px] font-black text-slate-300 uppercase tracking-[0.3em] italic">
                Dashboard
            </h2>
            
            @if(Request::segment(1))
                <span class="text-blue-600 font-black text-sm italic">/</span>
                <h2 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">
                    {{ str_replace('-', ' ', Request::segment(1)) }}
                </h2>
            @endif

            @if(Request::segment(2))
                <span class="text-red-600 font-black text-sm italic">/</span>
                <h2 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">
                    {{ str_replace('-', ' ', Request::segment(2)) }}
                </h2>
            @endif
        </div>
    </div>

    <div class="flex items-center gap-6">
        <div class="text-right hidden sm:block">
            <p class="text-[9px] font-black text-[#1E3A8A] uppercase italic leading-none">
                {{ \Carbon\Carbon::now()->format('d F Y') }}
            </p>
            <p class="text-[8px] font-bold text-slate-300 uppercase mt-1 tracking-tighter">
                Sabak Bernam, Selangor
            </p>
        </div>
    </div>
</nav>