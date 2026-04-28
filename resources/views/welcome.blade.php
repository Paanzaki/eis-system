<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Insight | PNS Selangor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: #090e1a;
            background-image: 
                radial-gradient(at 0% 0%, rgba(225, 29, 72, 0.12) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(250, 204, 21, 0.08) 0px, transparent 50%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(25px) saturate(200%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.7);
        }
        /* Sharp Border Radius mengikut feedback */
        .rounded-sharp { border-radius: 1rem; }
        
        .input-dark {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
        .input-dark:focus {
            border-color: #FACC15; /* Hint Kuning Selangor */
            background: rgba(0, 0, 0, 0.4);
            outline: none;
        }
        .noise {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            pointer-events: none; opacity: 0.03;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 overflow-hidden">
    <div class="noise"></div>

    <div class="w-full max-w-[1200px] grid lg:grid-cols-2 gap-16 items-center relative z-10">
        
        <div class="hidden lg:block space-y-10">
            <div class="space-y-6">
                <div class="flex items-center gap-5 mb-10">
                    <img src="{{ asset('images/jata-selangor.png') }}" alt="Jata Selangor" class="h-24 drop-shadow-2xl">
                    <div class="h-16 w-[1px] bg-white/10"></div>
                    <div class="text-white">
                        <p class="text-[10px] font-black uppercase tracking-[0.5em] text-red-500">Portal Rasmi</p>
                        <p class="text-sm font-bold uppercase tracking-widest leading-tight">Perbendaharaan Negeri<br>Selangor</p>
                    </div>
                </div>

                <h1 class="text-8xl font-extrabold text-white tracking-tighter leading-none italic uppercase">
                    PNS<span class="text-yellow-400">EIS.</span>
                </h1>
                <p class="text-slate-400 text-xl font-medium tracking-tight leading-relaxed max-w-sm">
                    Sistem Maklumat Eksekutif Bersepadu.
                </p>
            </div>
        </div>

        <div class="glass-card rounded-sharp p-10 lg:p-14 w-full max-w-lg mx-auto relative overflow-hidden">
            
            <div class="mb-10">
                <h2 class="text-2xl font-extrabold text-white tracking-tighter italic uppercase">login</h2>
                <div class="flex mt-3 gap-1">
                    <div class="h-1 w-12 bg-red-600"></div>
                    <div class="h-1 w-8 bg-yellow-400"></div>
                </div>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label class="text-[9px] font-black text-slate-500 uppercase tracking-[0.3em] ml-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                        class="w-full input-dark py-4 px-6 rounded-lg text-sm font-bold text-white placeholder:text-slate-700" 
                        placeholder="farhan@intern.my">
                </div>

                <div class="space-y-2">
                    <label class="text-[9px] font-black text-slate-500 uppercase tracking-[0.3em] ml-2">Password</label>
                    <input type="password" name="password" required 
                        class="w-full input-dark py-4 px-6 rounded-lg text-sm font-bold text-white placeholder:text-slate-700" 
                        placeholder="••••••••••••">
                </div>

                <div class="pt-6 space-y-4">
                    <button type="submit" 
                        class="w-full bg-[#1E3A8A] hover:bg-red-700 text-white py-5 rounded-lg text-xs font-black uppercase tracking-[0.4em] shadow-xl transition-all duration-300">
                        log masuk
                    </button>

                    <div class="relative flex justify-center items-center py-4">
                        <div class="w-full h-[1px] bg-white/5"></div>
                        <span class="absolute bg-[#0b111e] px-4 text-[7px] font-black uppercase tracking-[0.5em] text-slate-600">SSO Gateway</span>
                    </div>

                    <button type="button" 
                        class="w-full flex items-center justify-center gap-4 py-4 bg-white/5 hover:border-yellow-400/50 border border-white/5 rounded-lg text-[9px] font-black uppercase text-slate-300 tracking-widest transition-all group">
                        <img src="{{ asset('images/mydid-logo.png') }}" alt="MyDigitalID" class="h-5 grayscale group-hover:grayscale-0 transition-all">
                        Log Masuk MyDigitalID
                    </button>
                </div>
            </form>
            
            <div class="mt-12 pt-8 border-t border-white/5 flex justify-between items-center text-[7px] font-black text-slate-600 uppercase tracking-widest italic">
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