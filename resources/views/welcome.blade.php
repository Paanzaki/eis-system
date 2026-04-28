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
                radial-gradient(at 0% 0%, rgba(30, 58, 138, 0.4) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(59, 130, 246, 0.15) 0px, transparent 50%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(25px) saturate(200%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.7);
        }
        .input-dark {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
        .input-dark:focus {
            border-color: rgba(59, 130, 246, 0.4);
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
            <div class="space-y-4">
                <div class="w-12 h-1 w-24 bg-blue-500 rounded-full"></div>
                <h1 class="text-8xl font-extrabold text-white tracking-tighter leading-none italic uppercase">
                    PNS<br><span class="text-blue-500">EIS.</span>
                </h1>
            </div>
            
            <div class="space-y-6">
                <p class="text-slate-400 text-xl font-medium tracking-tight leading-relaxed max-w-sm">
                    Sistem Maklumat Eksekutif Bersepadu Perbendaharaan Negeri Selangor.
                </p>
                <div class="flex items-center gap-6">
                    <div class="flex -space-x-3">
                        @for($i=0; $i<4; $i++)
                        <div class="w-10 h-10 rounded-full border-2 border-[#090e1a] bg-slate-800 flex items-center justify-center text-[8px] font-black text-slate-400 uppercase tracking-tighter italic">USER</div>
                        @endfor
                    </div>
                    <p class="text-[10px] font-black text-blue-400 uppercase tracking-[0.3em]">Active Session Control</p>
                </div>
            </div>
        </div>

        <div class="glass-card rounded-[4rem] p-12 lg:p-16 w-full max-w-lg mx-auto relative overflow-hidden">
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-500/10 rounded-full blur-3xl"></div>

            <div class="mb-12">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-3xl font-extrabold text-white tracking-tighter italic uppercase">Identity</h2>
                        <p class="text-blue-500 text-[10px] font-black uppercase tracking-[0.4em] mt-1">Verification Required</p>
                    </div>
                    <div class="w-12 h-12 bg-white/5 rounded-2xl border border-white/10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-3.614A9.99 9.99 0 0010 11.22V7a3 3 0 10-6 0v4.22c0 1.258-.291 2.448-.813 3.504m16.035-3.504A9.99 9.99 0 0120 11.22V7a3 3 0 10-6 0v4.22c0 1.258.291 2.448.813 3.504M15 11c0 3.517 1.009 6.799 2.753 9.571" stroke-width="2"/></svg>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-8">
                @csrf
                
                <div class="space-y-3">
                    <label class="text-[9px] font-black text-slate-500 uppercase tracking-[0.3em] ml-2">Official Directory Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                        class="w-full input-dark py-5 px-8 rounded-3xl text-sm font-bold text-white placeholder:text-slate-700" 
                        placeholder="farhan@selangor.gov.my">
                </div>

                <div class="space-y-3">
                    <div class="flex justify-between items-center px-2">
                        <label class="text-[9px] font-black text-slate-500 uppercase tracking-[0.3em]">System Credentials</label>
                        <a href="#" class="text-[8px] font-black text-blue-400 uppercase tracking-widest hover:text-white transition-all">Forgot Access?</a>
                    </div>
                    <input type="password" name="password" required 
                        class="w-full input-dark py-5 px-8 rounded-3xl text-sm font-bold text-white placeholder:text-slate-700" 
                        placeholder="••••••••••••">
                </div>

                <div class="pt-6 space-y-4">
                    <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-500 text-white py-6 rounded-3xl text-xs font-black uppercase tracking-[0.4em] shadow-2xl shadow-blue-900/40 transition-all hover:-translate-y-1 active:translate-y-0">
                        Authenticate
                    </button>

                    <div class="relative flex justify-center items-center py-4 text-slate-700">
                        <div class="w-full h-[1px] bg-white/5"></div>
                        <span class="absolute bg-[#0b111e] px-4 text-[7px] font-black uppercase tracking-[0.5em]">External SSO</span>
                    </div>

                    <button type="button" onclick="alert('MyDigitalID Bridge Active')"
                        class="w-full flex items-center justify-center gap-4 py-5 bg-white/5 hover:bg-white/10 border border-white/5 rounded-3xl text-[9px] font-black uppercase text-slate-300 tracking-widest transition-all">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-width="2.5"/></svg>
                        Log Masuk MyDigitalID
                    </button>
                </div>
            </form>
            
            <div class="mt-12 pt-8 border-t border-white/5 flex justify-between items-center text-[8px] font-black text-slate-600 uppercase tracking-widest italic">
                <span>PNS Selangor Gateway</span>
                <span>v1.5-final</span>
            </div>
        </div>
    </div>
</body>
</html>