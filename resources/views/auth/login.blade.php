<!DOCTYPE html>
<html lang="ms" x-data="{ darkMode: localStorage.getItem('theme') !== 'light' }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Eksekutif | PNS Selangor</title>
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

        /* Gradient Selangor - Merah dilebihkan sikit opacity */
        .bg-selangor {
            background-image: 
                radial-gradient(at 0% 0%, rgba(225, 29, 72, var(--tw-bg-opacity-1)) 0px, transparent 55%),
                radial-gradient(at 100% 100%, rgba(250, 204, 21, var(--tw-bg-opacity-2)) 0px, transparent 50%);
            background-attachment: fixed;
        }

        .dark body { 
            background-color: #090e1a;
            --tw-bg-opacity-1: 0.15;
            --tw-bg-opacity-2: 0.08;
        }

        body { 
            background-color: #F8FAFC;
            --tw-bg-opacity-1: 0.18; 
            --tw-bg-opacity-2: 0.20;
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

        .glass-card {
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(30, 58, 138, 0.1);
            box-shadow: 0 30px 60px -12px rgba(30, 58, 138, 0.15);
        }

        /* Input Style */
        .input-dark {
            transition: all 0.3s ease;
        }
        .dark .input-dark {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.05);
            color: white;
        }
        .input-dark {
            background: #F1F5F9;
            border: 1px solid rgba(30, 58, 138, 0.05);
            color: #1E3A8A;
        }
        .input-dark:focus {
            border-color: #FACC15;
            background: white;
            outline: none;
            box-shadow: 0 0 0 4px rgba(250, 204, 21, 0.1);
        }

        .rounded-sharp { border-radius: 1rem; }
        .noise { position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; opacity: 0.03; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); }
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

    <div class="w-full max-w-[1200px] flex items-center justify-center relative z-10">
        <div class="glass-card rounded-sharp p-10 lg:p-14 w-full max-w-lg relative overflow-hidden">
            
            <div class="mb-10 flex justify-between items-start">
                <div class="text-left">
                    <h2 class="text-2xl font-extrabold text-[#1E3A8A] dark:text-white tracking-tighter italic uppercase">log masuk</h2>
                    <div class="flex mt-3 gap-1">
                        <div class="h-1.5 w-12 bg-red-600"></div>
                        <div class="h-1.5 w-8 bg-yellow-400"></div>
                    </div>
                </div>
                <!-- Back to Selection -->
                <a href="/" class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest hover:text-red-600 transition-colors italic">Kembali</a>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="text-[9px] font-black text-slate-500 uppercase tracking-[0.3em] ml-2 block text-left" style="font-family: Arial !important;">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                        class="w-full input-dark py-4 px-6 rounded-xl text-sm font-bold placeholder:text-slate-400" 
                        placeholder="farhan@pns.gov.my">
                </div>

                <div class="space-y-2">
                    <label class="text-[9px] font-black text-slate-500 uppercase tracking-[0.3em] ml-2 block text-left" style="font-family: Arial !important;">Password</label>
                    <input type="password" name="password" required 
                        class="w-full input-dark py-4 px-6 rounded-xl text-sm font-bold placeholder:text-slate-400" 
                        placeholder="••••••••••••">
                </div>

                <div class="pt-6">
                    <button type="submit" 
                        class="w-full bg-[#1E3A8A] hover:bg-red-700 text-white py-5 rounded-xl text-xs font-black uppercase tracking-[0.4em] shadow-xl transition-all duration-300">
                        akses portal
                    </button>
                </div>
            </form>
            
            <div class="mt-12 pt-8 border-t border-slate-100 dark:border-white/5 text-[7px] font-black text-slate-400 dark:text-slate-600 uppercase tracking-widest italic text-center">
                Portal Rasmi Perbendaharaan Negeri Selangor
            </div>
        </div>
    </div>
</body>
</html>