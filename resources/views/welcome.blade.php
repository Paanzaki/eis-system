<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EIS System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-[#F8F9FA] text-[#2C2C2C] font-sans overflow-hidden">
    <div class="min-h-screen flex flex-col md:flex-row">
        
        <div class="w-full md:w-1/2 bg-[#2C2C2C] flex flex-col items-center justify-center p-12 relative">
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
                <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#FEB05D] rounded-full blur-3xl"></div>
            </div>

            <div class="relative z-10 text-center md:text-left">
                <h1 class="text-8xl md:text-9xl font-black tracking-tighter text-[#FEB05D] leading-none">EIS.</h1>
                <p class="mt-4 text-xs font-bold uppercase tracking-[0.4em] text-gray-400">Enterprise Intelligence System</p>
                <div class="mt-12 h-1 w-20 bg-[#FEB05D] hidden md:block"></div>
            </div>

            <div class="absolute bottom-8 text-[9px] text-gray-500 font-bold uppercase tracking-widest">
                Developed for Kodewave Sdn Bhd
            </div>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-6 md:p-12 relative">
            <div class="w-full max-w-lg z-10">
                <div class="bg-white/80 backdrop-blur-xl p-10 md:p-14 rounded-xl shadow-2xl border border-gray-200 transition-all">
                    
                    <div class="mb-10 text-center md:text-left">
                        <h2 class="text-3xl font-black text-[#2C2C2C] uppercase tracking-tight">Log Masuk</h2>
                        <p class="text-[10px] font-bold text-[#FEB05D] uppercase tracking-[0.2em] mt-2">Enterprise Access Portal</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2">Alamat Emel</label>
                            <input type="email" name="email" class="w-full px-5 py-4 bg-white/50 border-gray-200 focus:border-[#FEB05D] focus:ring-0 rounded-lg text-sm font-bold text-[#2C2C2C]" required autofocus>
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest">Kata Laluan</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-[9px] font-bold text-[#FEB05D] uppercase tracking-widest hover:underline">Lupa Kata Laluan?</a>
                                @endif
                            </div>
                            <input type="password" name="password" class="w-full px-5 py-4 bg-white/50 border-gray-200 focus:border-[#FEB05D] focus:ring-0 rounded-lg text-sm font-bold text-[#2C2C2C]" required>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-5 bg-[#2C2C2C] text-[#FEB05D] rounded-lg font-bold uppercase tracking-widest text-xs hover:bg-[#3d3d3d] transition-all border-none cursor-pointer">
                                Masuk Sistem
                            </button>
                        </div>

                        <div class="pt-6 text-center border-t border-gray-100">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                Belum ada akaun? 
                                <a href="{{ route('register') }}" class="ml-1 text-[#FEB05D] hover:text-[#2C2C2C] transition-colors hover:underline">
                                    Daftar Sekarang
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
</html>