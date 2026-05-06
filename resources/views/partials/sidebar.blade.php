<aside
    x-cloak
    :class="[
        sidebarOpen ? 'w-72 translate-x-0' : 'w-20 -translate-x-full lg:translate-x-0',
        darkMode
            ? 'bg-[#0B1120] border-white/5'
            : 'bg-white border-gray-100'
    ]"
    class="fixed inset-y-0 left-0 z-40 lg:static lg:flex flex-col border-r transition-all duration-500 ease-in-out"
    x-data="{ openMenu: '{{ request()->segment(1) }}' }">

    {{-- ══ LOGO ══ --}}
    <div :class="darkMode ? 'border-white/5' : 'border-gray-100'"
         class="h-20 flex items-center px-4 border-b flex-shrink-0 transition-colors duration-500">
        <div class="flex items-center gap-3 min-w-0">
            <img src="{{ asset('images/jata-selangor.png') }}" alt="Jata" class="h-10 w-10 flex-shrink-0 object-contain">
            <div x-show="sidebarOpen" x-transition.opacity class="min-w-0">
                <h1 :class="darkMode ? 'text-blue-400' : 'text-[#1E3A8A]'"
                    class="text-[15px] font-black tracking-tighter uppercase italic leading-none"
                    style="font-family: Arial !important;">
                    EIS<span class="text-yellow-400 text-lg">.</span>PNS
                </h1>
                <div class="flex mt-1.5 gap-1">
                    <div class="h-0.5 w-8 bg-red-600 rounded-full"></div>
                    <div class="h-0.5 w-4 bg-yellow-400 rounded-full"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- ══ NAVIGATION ══ --}}
    <nav class="flex-1 px-2.5 py-4 space-y-0.5 overflow-y-auto custom-scrollbar">

        {{-- Helper macros via inline ternary:
             active  dark  → bg-blue-500/10 text-blue-400 border-l-[3px] border-yellow-400
             active  light → bg-blue-50     text-[#1E3A8A] border-l-[3px] border-yellow-400
             default dark  → text-slate-400 hover:bg-white/5 hover:text-slate-200 hover:border-l-[3px] hover:border-yellow-400/40
             default light → text-slate-500 hover:bg-blue-50/60 hover:text-[#1E3A8A] hover:border-l-[3px] hover:border-yellow-400/40
        --}}

        {{-- ── Dashboard ── --}}
        @php
            $isDash = request()->routeIs('dashboard');
        @endphp
        <a href="{{ route('dashboard') }}"
           :class="darkMode
               ? '{{ $isDash ? 'bg-blue-500/10 text-blue-400 border-l-[3px] border-yellow-400' : 'text-slate-400 hover:bg-white/5 hover:text-slate-200 border-l-[3px] border-transparent hover:border-yellow-400/40' }}'
               : '{{ $isDash ? 'bg-blue-50 text-[#1E3A8A] border-l-[3px] border-yellow-400' : 'text-slate-500 hover:bg-blue-50/60 hover:text-[#1E3A8A] border-l-[3px] border-transparent hover:border-yellow-400/40' }}'"
           class="nav-item flex items-center gap-3.5 px-3 py-2.5 rounded-r-xl transition-all duration-200">
            <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
            </svg>
            <span x-show="sidebarOpen" x-transition.opacity class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">Dashboard</span>
        </a>

        {{-- ── SECTION: Operasi ── --}}
        <div x-show="sidebarOpen" class="pt-4 pb-1 px-3">
            <p :class="darkMode ? 'text-white/20' : 'text-slate-300'"
               class="text-[9px] font-black uppercase tracking-[0.25em]">Operasi</p>
        </div>

        {{-- ── Perolehan ── --}}
        <div x-data="{ open: openMenu === 'perolehan' }">
            <button @click="open = !open; sidebarOpen || (sidebarOpen = true)"
                :class="darkMode
                    ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200 border-l-[3px] border-transparent hover:border-yellow-400/40'
                    : 'text-slate-500 hover:bg-blue-50/60 hover:text-[#1E3A8A] border-l-[3px] border-transparent hover:border-yellow-400/40'"
                class="nav-item w-full flex items-center justify-between gap-3.5 px-3 py-2.5 rounded-r-xl transition-all duration-200">
                <div class="flex items-center gap-3.5">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <span x-show="sidebarOpen" x-transition.opacity class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">Pengurusan Perolehan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                </svg>
            </button>

            <div x-show="open && sidebarOpen" x-collapse x-cloak class="ml-8 mt-0.5 space-y-0.5 border-l"
                 :class="darkMode ? 'border-white/5' : 'border-gray-100'">
                @foreach([
                    ['Perancangan Tahunan (PPT)', '#'],
                    ['Pelaksanaan Perolehan', '#'],
                    ['Tender', route('perolehan.data')],
                ] as [$label, $href])
                <a href="{{ $href }}"
                   :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                   class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                    <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                    {{ $label }}
                </a>
                @endforeach

                {{-- Rundingan Terus (nested) --}}
                <div x-data="{ openR: false }">
                    <button @click="openR = !openR"
                        :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                        class="sub-item w-full flex items-center justify-between gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                        <span class="flex items-center gap-2">
                            <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                            Rundingan Terus
                        </span>
                        <svg class="w-2.5 h-2.5 transition-transform duration-200" :class="openR ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                        </svg>
                    </button>
                    <div x-show="openR" x-collapse x-cloak class="ml-4 space-y-0.5 border-l" :class="darkMode ? 'border-white/5' : 'border-gray-100'">
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                           class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                            <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                            Muktamad Rundingan Harga
                        </a>
                    </div>
                </div>

                {{-- Kontrak (nested) --}}
                <div x-data="{ openK: false }">
                    <button @click="openK = !openK"
                        :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                        class="sub-item w-full flex items-center justify-between gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                        <span class="flex items-center gap-2">
                            <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                            Kontrak
                        </span>
                        <svg class="w-2.5 h-2.5 transition-transform duration-200" :class="openK ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                        </svg>
                    </button>
                    <div x-show="openK" x-collapse x-cloak class="ml-4 space-y-0.5 border-l" :class="darkMode ? 'border-white/5' : 'border-gray-100'">
                        @foreach(['Pengurusan Kontrak (Perunding)', 'Pengurusan Kontrak (Kerja)'] as $kLabel)
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                           class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                            <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                            {{ $kLabel }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Pengurusan Aset ── --}}
        <div x-data="{ open: openMenu === 'aset' }">
            <button @click="open = !open; sidebarOpen || (sidebarOpen = true)"
                :class="darkMode
                    ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200 border-l-[3px] border-transparent hover:border-yellow-400/40'
                    : 'text-slate-500 hover:bg-blue-50/60 hover:text-[#1E3A8A] border-l-[3px] border-transparent hover:border-yellow-400/40'"
                class="nav-item w-full flex items-center justify-between gap-3.5 px-3 py-2.5 rounded-r-xl transition-all duration-200">
                <div class="flex items-center gap-3.5">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    <span x-show="sidebarOpen" x-transition.opacity class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">Pengurusan Aset</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                </svg>
            </button>
            <div x-show="open && sidebarOpen" x-collapse x-cloak class="ml-8 mt-0.5 space-y-0.5 border-l" :class="darkMode ? 'border-white/5' : 'border-gray-100'">
                @foreach([
                    ['Daftar Aset', route('aset')],
                    ['Verifikasi Fizikal', '#'],
                    ['Pindahan & Pelupusan', '#'],
                    ['Kehilangan & Hapus Kira', '#'],
                ] as [$label, $href])
                <a href="{{ $href }}"
                   :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                   class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                    <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                    {{ $label }}
                </a>
                @endforeach
            </div>
        </div>

        {{-- ── Laporan ── --}}
        <div x-data="{ open: openMenu === 'laporan' }">
            <button @click="open = !open; sidebarOpen || (sidebarOpen = true)"
                :class="darkMode
                    ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200 border-l-[3px] border-transparent hover:border-yellow-400/40'
                    : 'text-slate-500 hover:bg-blue-50/60 hover:text-[#1E3A8A] border-l-[3px] border-transparent hover:border-yellow-400/40'"
                class="nav-item w-full flex items-center justify-between gap-3.5 px-3 py-2.5 rounded-r-xl transition-all duration-200">
                <div class="flex items-center gap-3.5">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span x-show="sidebarOpen" x-transition.opacity class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">Laporan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                </svg>
            </button>
            <div x-show="open && sidebarOpen" x-collapse x-cloak class="ml-8 mt-0.5 space-y-0.5 border-l" :class="darkMode ? 'border-white/5' : 'border-gray-100'">
                @foreach([
                    'Laporan Suku Tahun JKPAK',
                    'Laporan Eksekutif Tahunan JKPAK',
                    'Laporan Naziran',
                ] as $label)
                <a href="#"
                   :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                   class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                    <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                    {{ $label }}
                </a>
                @endforeach
            </div>
        </div>

        {{-- ── Naziran ── --}}
        <div x-data="{ open: openMenu === 'naziran' }">
            <button @click="open = !open; sidebarOpen || (sidebarOpen = true)"
                :class="darkMode
                    ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200 border-l-[3px] border-transparent hover:border-yellow-400/40'
                    : 'text-slate-500 hover:bg-blue-50/60 hover:text-[#1E3A8A] border-l-[3px] border-transparent hover:border-yellow-400/40'"
                class="nav-item w-full flex items-center justify-between gap-3.5 px-3 py-2.5 rounded-r-xl transition-all duration-200">
                <div class="flex items-center gap-3.5">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span x-show="sidebarOpen" x-transition.opacity class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">Naziran</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                </svg>
            </button>
            <div x-show="open && sidebarOpen" x-collapse x-cloak class="ml-8 mt-0.5 space-y-0.5 border-l" :class="darkMode ? 'border-white/5' : 'border-gray-100'">
                @foreach([
                    ['Naziran Perolehan', route('naziran.perolehan')],
                    ['Naziran Aset', route('naziran.aset')],
                ] as [$label, $href])
                <a href="{{ $href }}"
                   :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                   class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                    <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                    {{ $label }}
                </a>
                @endforeach
            </div>
        </div>

        {{-- ── SECTION: Sokongan ── --}}
        <div x-show="sidebarOpen" class="pt-5 pb-1 px-3">
            <p :class="darkMode ? 'text-white/20' : 'text-slate-300'"
               class="text-[9px] font-black uppercase tracking-[0.25em]">Sokongan</p>
        </div>

        {{-- ── FAQ / Chatbot ── --}}
        @php $isChatbot = request()->routeIs('chatbot'); @endphp
        <a href="{{ route('chatbot') }}"
           :class="darkMode
               ? '{{ $isChatbot ? 'bg-blue-500/10 text-blue-400 border-l-[3px] border-yellow-400' : 'text-slate-400 hover:bg-white/5 hover:text-slate-200 border-l-[3px] border-transparent hover:border-yellow-400/40' }}'
               : '{{ $isChatbot ? 'bg-blue-50 text-[#1E3A8A] border-l-[3px] border-yellow-400' : 'text-slate-500 hover:bg-blue-50/60 hover:text-[#1E3A8A] border-l-[3px] border-transparent hover:border-yellow-400/40' }}'"
           class="nav-item flex items-center gap-3.5 px-3 py-2.5 rounded-r-xl transition-all duration-200">
            <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
            </svg>
            <span x-show="sidebarOpen" x-transition.opacity class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">FAI Chatbot</span>
        </a>

        {{-- ── Pengurusan Data ── --}}
        <a href="#"
           :class="darkMode
               ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200 border-l-[3px] border-transparent hover:border-yellow-400/40'
               : 'text-slate-500 hover:bg-blue-50/60 hover:text-[#1E3A8A] border-l-[3px] border-transparent hover:border-yellow-400/40'"
           class="nav-item flex items-center gap-3.5 px-3 py-2.5 rounded-r-xl transition-all duration-200">
            <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
            </svg>
            <span x-show="sidebarOpen" x-transition.opacity class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">migrasi Data</span>
        </a>

    </nav>

    {{-- ══ BOTTOM CONTROLS ══ --}}
    <div :class="darkMode ? 'border-white/5' : 'border-gray-100'"
         class="px-2.5 pb-4 pt-3 space-y-0.5 border-t transition-colors duration-500">

        {{-- ── SECTION: Sistem ── --}}
        <div x-show="sidebarOpen" class="pb-2 px-1">
            <p :class="darkMode ? 'text-white/20' : 'text-slate-300'"
               class="text-[9px] font-black uppercase tracking-[0.25em]">Sistem</p>
        </div>

        {{-- ── Tetapan ── --}}
        <div x-data="{ open: openMenu === 'admin' }">
            <button @click="open = !open; sidebarOpen || (sidebarOpen = true)"
                :class="darkMode
                    ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200 border-l-[3px] border-transparent hover:border-yellow-400/40'
                    : 'text-slate-500 hover:bg-blue-50/60 hover:text-[#1E3A8A] border-l-[3px] border-transparent hover:border-yellow-400/40'"
                class="nav-item w-full flex items-center justify-between gap-3.5 px-3 py-2.5 rounded-r-xl transition-all duration-200">
                <div class="flex items-center gap-3.5">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                    </svg>
                    <span x-show="sidebarOpen" x-transition.opacity class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">Tetapan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                </svg>
            </button>
            <div x-show="open && sidebarOpen" x-collapse x-cloak class="ml-8 mt-0.5 space-y-0.5 border-l" :class="darkMode ? 'border-white/5' : 'border-gray-100'">
                @foreach(['Pengguna', 'Peranan', 'Jabatan'] as $label)
                <a href="#"
                   :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                   class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                    <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                    {{ $label }}
                </a>
                @endforeach
            </div>
        </div>

        {{-- ── Penyelenggaraan ── --}}
        <div x-data="{ open: openMenu === 'maint' }">
            <button @click="open = !open; sidebarOpen || (sidebarOpen = true)"
                :class="darkMode
                    ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200 border-l-[3px] border-transparent hover:border-yellow-400/40'
                    : 'text-slate-500 hover:bg-blue-50/60 hover:text-[#1E3A8A] border-l-[3px] border-transparent hover:border-yellow-400/40'"
                class="nav-item w-full flex items-center justify-between gap-3.5 px-3 py-2.5 rounded-r-xl transition-all duration-200">
                <div class="flex items-center gap-3.5">
                    <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"/>
                        <circle cx="12" cy="12" r="3" stroke-width="2"/>
                    </svg>
                    <span x-show="sidebarOpen" x-transition.opacity class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">Penyelenggaraan</span>
                </div>
                <svg x-show="sidebarOpen" class="w-3 h-3 flex-shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                </svg>
            </button>
            <div x-show="open && sidebarOpen" x-collapse x-cloak class="ml-8 mt-0.5 space-y-0.5 border-l" :class="darkMode ? 'border-white/5' : 'border-gray-100'">

                {{-- Selenggara Perolehan --}}
                <div x-data="{ openSP: false }">
                    <button @click="openSP = !openSP"
                        :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                        class="sub-item w-full flex items-center justify-between gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                        <span class="flex items-center gap-2">
                            <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                            Selenggara Perolehan
                        </span>
                        <svg class="w-2.5 h-2.5 transition-transform duration-200" :class="openSP ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                        </svg>
                    </button>
                    <div x-show="openSP" x-collapse x-cloak class="ml-4 space-y-0.5 border-l" :class="darkMode ? 'border-white/5' : 'border-gray-100'">
                        @foreach(['Kategori Perolehan','Kaedah Perolehan','Sumber Peruntukan','Kategori Jabatan/Agensi','Jabatan/Agensi Memohon','Kategori Naziran','Borang Naziran'] as $label)
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                           class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                            <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                            {{ $label }}
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- Selenggara Aset --}}
                <div x-data="{ openSA: false }">
                    <button @click="openSA = !openSA"
                        :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                        class="sub-item w-full flex items-center justify-between gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                        <span class="flex items-center gap-2">
                            <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                            Selenggara Aset
                        </span>
                        <svg class="w-2.5 h-2.5 transition-transform duration-200" :class="openSA ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                        </svg>
                    </button>
                    <div x-show="openSA" x-collapse x-cloak class="ml-4 space-y-0.5 border-l" :class="darkMode ? 'border-white/5' : 'border-gray-100'">
                        @foreach(['Kategori Aset','Sub-Kategori Aset','Status Aset','Kuasa Melulus Pelupusan','Kaedah Pelupusan','Kategori Naziran','Borang Naziran','Had Nilai Aset','Templat Dokumen Aset'] as $label)
                        <a href="#" :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                           class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                            <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                            {{ $label }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Help & Support ── --}}
        <a href="#"
           :class="darkMode
               ? 'text-slate-400 hover:bg-white/5 hover:text-slate-200 border-l-[3px] border-transparent hover:border-yellow-400/40'
               : 'text-slate-500 hover:bg-blue-50/60 hover:text-[#1E3A8A] border-l-[3px] border-transparent hover:border-yellow-400/40'"
           class="nav-item flex items-center gap-3.5 px-3 py-2.5 rounded-r-xl transition-all duration-200">
            <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <span x-show="sidebarOpen" x-transition.opacity class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">Help & Support</span>
        </a>

        {{-- ── Divider ── --}}
        <div class="my-2 mx-3 border-t" :class="darkMode ? 'border-white/5' : 'border-gray-100'"></div>

        {{-- ── Logout ── --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                :class="darkMode
                    ? 'text-red-400/70 hover:text-red-300 hover:bg-red-500/10 border-l-[3px] border-transparent hover:border-red-400/40'
                    : 'text-red-400 hover:text-red-600 hover:bg-red-50 border-l-[3px] border-transparent hover:border-red-400/40'"
                class="nav-item w-full flex items-center gap-3.5 px-3 py-2.5 rounded-r-xl transition-all duration-200">
                <svg class="w-[18px] h-[18px] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-6 0v-1m6-10V7a3 3 0 00-6 0v1"/>
                </svg>
                <span x-show="sidebarOpen" x-transition.opacity class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">Log Keluar</span>
            </button>
        </form>
    </div>

</aside>

<style>
    /* Ensure left border always occupies space so layout doesn't shift on hover */
    .nav-item  { border-left-width: 3px; }
    .sub-item  { border-radius: 0 8px 8px 0; }
    [x-cloak]  { display: none !important; }

    .custom-scrollbar::-webkit-scrollbar       { width: 3px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.08); border-radius: 10px; }
</style>