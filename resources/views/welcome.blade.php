<!DOCTYPE html>
<html lang="ms" x-data="{ darkMode: localStorage.getItem('theme') !== 'light' }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Insight | PNS Selangor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            transition: background-color 0.5s ease;
        }

        /* Gradient Selangor - Ditingkatkan kepekatan Merah */
        .bg-selangor {
            background-image: 
                radial-gradient(at 0% 0%, rgba(225, 29, 72, var(--tw-bg-opacity-1)) 0px, transparent 55%),
                radial-gradient(at 100% 100%, rgba(250, 204, 21, var(--tw-bg-opacity-2)) 0px, transparent 50%);
        }

        /* Dark Mode: Merah dikekalkan pada tahap estetik */
        .dark body { 
            background-color: #090e1a;
            --tw-bg-opacity-1: 0.15; /* Naikkan sikit dari 0.12 */
            --tw-bg-opacity-2: 0.08;
        }

        /* Light Mode: Merah ditingkatkan untuk lebih visible */
        body { 
            background-color: #F8FAFC;
            --tw-bg-opacity-1: 0.18; /* Ditingkatkan supaya nampak lebih jelas */
            --tw-bg-opacity-2: 0.20; /* Kuning pun naikkan sikit untuk balance */
        }

        .glass-card {
            transition: all 0.5s ease;
            backdrop-filter: blur(25px) saturate(200%);
        }

        .dark .glass-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.7);
        }

        /* Light Mode Card: Soft Glass dengan border Navy halus */
        .glass-card {
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(30, 58, 138, 0.1);
            box-shadow: 0 20px 50px -10px rgba(30, 58, 138, 0.12);
        }
        
        /* Extra: Bagi effect merah tu "spread" lebih jauh */
        .bg-selangor {
            background-size: 100% 100%;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 overflow-hidden bg-selangor">
    <div class="noise"></div>

    <!-- Theme Toggle Switcher -->
    <button @click="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light')" 
            class="fixed top-8 right-8 z-50 p-3 rounded-xl glass-card hover:scale-110 transition-all border border-gray-200/50">
        <svg x-show="!darkMode" class="w-5 h-5 text-[#1E3A8A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" stroke-width="2.5"/></svg>
        <svg x-show="darkMode" class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" stroke-width="2.5"/></svg>
    </button>

    <div class="w-full max-w-[1200px] grid lg:grid-cols-2 gap-16 items-center relative z-10">
        <!-- Brand Section -->
        <div class="hidden lg:block space-y-10">
            <div class="space-y-6 text-left">
                <div class="flex items-center gap-5 mb-10">
                    <img src="{{ asset('images/jata-selangor.png') }}" alt="Jata Selangor" class="h-32 drop-shadow-2xl">
                    <div class="h-16 w-[1px] bg-slate-300 dark:bg-white/10"></div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-[0.5em] text-red-600">Portal Rasmi</p>
                        <p class="text-sm font-bold text-[#1E3A8A] dark:text-white uppercase tracking-widest leading-tight">Perbendaharaan Negeri<br>Selangor</p>
                    </div>
                </div>

                <h1 class="text-8xl font-extrabold text-[#1E3A8A] dark:text-white tracking-tighter leading-none italic uppercase">
                    PNS<span class="text-yellow-500">EIS.</span>
                </h1>
                <p class="text-slate-500 dark:text-slate-400 text-xl font-medium tracking-tight leading-relaxed max-w-sm">
                    Sistem Maklumat Eksekutif Bersepadu.
                </p>
            </div>
        </div>

        <!-- Action Card -->
        <div class="glass-card rounded-sharp p-10 lg:p-14 w-full max-w-lg mx-auto relative overflow-hidden">
            <div class="mb-10 text-left">
                <h2 class="text-2xl font-extrabold text-[#1E3A8A] dark:text-white tracking-tighter italic uppercase">pilih akses</h2>
                <div class="flex mt-3 gap-1">
                    <div class="h-1 w-12 bg-red-600"></div>
                    <div class="h-1 w-8 bg-yellow-400"></div>
                </div>
            </div>

            <div class="space-y-4">
                <!-- MyDigitalID Button -->
                <button type="button" 
                    class="w-full flex items-center justify-between px-8 py-6 bg-white dark:bg-white/5 hover:bg-gray-50 dark:hover:bg-white/10 border border-slate-200 dark:border-white/10 rounded-lg group transition-all duration-300 shadow-sm">
                    <div class="flex items-center gap-4 text-left">
                        <img src="{{ asset('images/mydid-logo.png') }}" alt="MyDigitalID" class="h-8 grayscale group-hover:grayscale-0 transition-all">
                        <div>
                            <p class="text-[9px] font-black uppercase text-slate-400 dark:text-slate-500 tracking-widest">Akses Persekutuan</p>
                            <p class="text-[11px] font-black uppercase text-[#1E3A8A] dark:text-white tracking-widest">MyDigitalID</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-slate-300 dark:text-slate-500 group-hover:text-yellow-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 5l7 7-7 7M5 12h14" stroke-width="2"/></svg>
                </button>

                <!-- Login By Email Button -->
                <a href="{{ route('login') }}" 
                    class="w-full flex items-center justify-between px-8 py-6 bg-[#1E3A8A] hover:bg-red-700 rounded-lg group transition-all duration-300 shadow-xl">
                    <div class="flex items-center gap-4 text-left text-white">
                        <div class="w-8 h-8 rounded-md bg-white/10 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="2"/></svg>
                        </div>
                        <div>
                            <p class="text-[9px] font-black uppercase text-white/50 tracking-widest">Akses Perbendaharaan</p>
                            <p class="text-[11px] font-black uppercase tracking-widest">Login via Email</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-white/50 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 5l7 7-7 7M5 12h14" stroke-width="2"/></svg>
                </a>
            </div>
            
            <div class="mt-12 pt-8 border-t border-slate-100 dark:border-white/5 flex justify-between items-center text-[7px] font-black text-slate-400 dark:text-slate-600 uppercase tracking-widest italic">
                <span>PNS Selangor Gateway</span>
                <span class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                    Operational
                </span>
            </div>
        </div>
    </div>
</body>
</html>