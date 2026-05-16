import re

with open('resources/views/partials/sidebar.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Update Pengurusan Aset links array
old_aset_array = """                @foreach([
                    ['Senarai Aset', route('aset')],
                    ['Pendaftaran Aset Baru', route('aset.daftar')],
                    ['Pemeriksaan Aset', route('aset.pemeriksaan')],
                    ['Verifikasi Fizikal', route('aset.verifikasi')],
                    ['Pengurusan Lantikan', route('aset.pelantikan')],
                    ['Pindahan & Pelupusan', route('aset.pindahan-pelupusan')],
                    ['Kehilangan & Hapus Kira', route('aset.kehilangan-hapuskira')],
                ] as [$label, $href])
                <a href="{{ $href }}"
                   :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                   class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                    <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                    {{ $label }}
                </a>
                @endforeach"""

new_aset_array = """                @foreach([
                    ['Senarai Aset', route('aset')],
                    ['Pendaftaran Aset Baru', route('aset.daftar')],
                ] as [$label, $href])
                <a href="{{ $href }}"
                   :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                   class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                    <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                    {{ $label }}
                </a>
                @endforeach
                
                <div x-data="{ openP: false }">
                    <button @click="openP = !openP" :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'" class="sub-item w-full flex items-center justify-between gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                        <span class="flex items-center gap-2">
                            <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                            Pemeriksaan Aset
                        </span>
                        <svg class="w-2.5 h-2.5 transition-transform duration-200" :class="openP ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                        </svg>
                    </button>
                    <div x-show="openP" x-collapse x-cloak class="ml-4 space-y-0.5 border-l" :class="darkMode ? 'border-white/5' : 'border-gray-100'">
                        @foreach([
                            ['Senarai Pemeriksaan', route('aset.pemeriksaan')],
                            ['Pengurusan Lantikan', route('aset.pelantikan')]
                        ] as [$label, $href])
                        <a href="{{ $href }}" :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'" class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                            <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                            {{ $label }}
                        </a>
                        @endforeach
                    </div>
                </div>

                @foreach([
                    ['Pindahan & Pelupusan', route('aset.pindahan-pelupusan')],
                    ['Kehilangan & Hapus Kira', route('aset.kehilangan-hapuskira')],
                ] as [$label, $href])
                <a href="{{ $href }}"
                   :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                   class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                    <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                    {{ $label }}
                </a>
                @endforeach"""

content = content.replace(old_aset_array, new_aset_array)

# 2. Tetapan
old_tetapan = """                @foreach([
                        ['Pengguna', route('admin.pengguna')],
                        ['Peranan', route('admin.peranan')],
                        ['Jabatan', route('admin.jabatan')],
                        ['Pengurusan Lantikan', route('aset.pelantikan')],
                        ['Konfigurasi Sistem', route('admin.config')],
                        ['Jejak Audit (Forensics)', route('admin.audit')],
                        ['SOP Log Viewer', route('admin.log_viewer')]
                    ] as [$label, $route])"""

new_tetapan = """                @foreach([
                        ['Peranan', route('admin.peranan')],
                        ['Konfigurasi Sistem', route('admin.config')],
                        ['Jejak Audit (Forensics)', route('admin.audit')],
                        ['SOP Log Viewer', route('admin.log_viewer')]
                    ] as [$label, $route])"""

content = content.replace(old_tetapan, new_tetapan)

# 3. Penyelenggaraan: Add Selenggara Kakitangan after Selenggara Aset
sel_aset_end = """                            <a href="{{ $route }}" :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                               class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                                <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </div>"""

new_sel_aset_end = sel_aset_end + """
                {{-- Selenggara Sistem --}}
                <div x-data="{ openSS: false }">
                    <button @click="openSS = !openSS"
                        :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                        class="sub-item w-full flex items-center justify-between gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                        <span class="flex items-center gap-2">
                            <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                            Selenggara Sistem / Kakitangan
                        </span>
                        <svg class="w-2.5 h-2.5 transition-transform duration-200" :class="openSS ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2.5"/>
                        </svg>
                    </button>
                    <div x-show="openSS" x-collapse x-cloak class="ml-4 space-y-0.5 border-l" :class="darkMode ? 'border-white/5' : 'border-gray-100'">
                        @foreach([
                                ['Pengguna / Kakitangan', route('admin.pengguna')],
                                ['Jabatan', route('admin.jabatan')]
                            ] as [$label, $route])
                            <a href="{{ $route }}" :class="darkMode ? 'text-slate-500 hover:text-blue-400 hover:bg-white/5' : 'text-slate-400 hover:text-[#1E3A8A] hover:bg-blue-50/60'"
                               class="sub-item flex items-center gap-2 px-4 py-2 rounded-r-lg text-[11px] font-bold uppercase tracking-wider transition-all duration-150">
                                <span class="w-1 h-1 rounded-full flex-shrink-0" :class="darkMode ? 'bg-white/20' : 'bg-slate-300'"></span>
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </div>"""

content = content.replace(sel_aset_end, new_sel_aset_end)

with open('resources/views/partials/sidebar.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
