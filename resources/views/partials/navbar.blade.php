<nav class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between z-30 sticky top-0">
    <div class="flex items-center">
        <button @click="sidebarOpen = !sidebarOpen" class="hidden lg:flex p-2 mr-6 text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50 rounded-xl transition-all">
            <svg class="w-5 h-5 transition-transform duration-500" :class="!sidebarOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
        </button>

        <div class="flex items-center gap-3">
            <h2 class="text-[10px] font-bold text-slate-300 uppercase tracking-[0.3em] italic" style="font-family: Arial !important;">
                Dashboard
            </h2>
            
            @if(Request::segment(1))
                <span class="text-blue-600 font-bold text-sm italic">/</span>
                <h2 class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.3em] italic" style="font-family: Arial !important;">
                    {{ str_replace('-', ' ', Request::segment(1)) }}
                </h2>
            @endif

            @if(Request::segment(2))
                <span class="text-red-600 font-bold text-sm italic">/</span>
                <h2 class="text-[10px] font-bold text-[#1E3A8A] uppercase tracking-[0.3em] italic underline decoration-yellow-400 decoration-2 underline-offset-4" style="font-family: Arial !important;">
                    {{ str_replace('-', ' ', Request::segment(2)) }}
                </h2>
            @endif
        </div>
    </div>

    <div class="flex items-center gap-6">

        <div class="flex items-center gap-6">
            <button @click="darkMode = !darkMode" class="p-2 rounded-xl transition-all hover:bg-gray-100 dark:hover:bg-slate-800">
                <svg x-show="darkMode" class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
                <svg x-show="!darkMode" class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
            </button>

            <div class="text-right hidden sm:block border-r border-gray-100 pr-6">
                <p class="text-[10px] font-bold text-[#1E3A8A] uppercase  leading-none" style="font-family: Arial !important;">
                    {{ \Carbon\Carbon::now()->format('d F Y') }}
                </p>
                <p class="text-[8px] font-bold text-slate-300 uppercase mt-1 tracking-tighter " style="font-family: Arial !important;">
                    Sabak Bernam, Selangor
                </p>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-[9px] font-bold text-slate-400  tracking-tighter" style="font-family: Arial !important;">Selamat Datang,</p>
                    <p class="text-[12px] font-bold text-[#1E3A8A] uppercase leading-none" style="font-family: Arial !important;">
                        Hello, {{ explode(' ', Auth::user()->name)[0] }}!
                    </p>
                </div>
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#1E3A8A] to-blue-500 flex items-center justify-center text-white text-xs font-bold border-2 border-white shadow-sm flex-shrink-0">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </div>
        </div>

        
    </div>
</nav>