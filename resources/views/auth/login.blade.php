<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EIS Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen w-screen flex items-center justify-center bg-[#F2F2F2] px-6 py-12 overflow-x-hidden">

    <div class="fixed top-0 left-0 w-full h-1 bg-[#FEB05D]"></div>

    <div class="relative z-10 w-full max-w-2xl bg-white rounded-xl shadow-[0_10px_40px_rgba(0,0,0,0.04)] border border-gray-200 p-12 md:p-20">

        <div class="text-center mb-12">
            <h1 class="text-5xl font-black text-[#2C2C2C] tracking-tighter uppercase">
                EIS<span class="text-[#FEB05D]">.</span>
            </h1>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.5em] mt-3">
                Executive Information System
            </p>
            <div class="w-10 h-[3px] bg-[#FEB05D] mx-auto mt-4"></div>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-7 max-w-md mx-auto">
            @csrf

            <div class="space-y-2">
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1">Alamat Emel</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required autofocus 
                    class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg text-sm font-bold text-[#2C2C2C] transition-all duration-200
                    focus:border-[#2C2C2C] focus:ring-[10px] focus:ring-[#FEB05D]/10 focus:outline-none placeholder:text-gray-300"
                    placeholder="farhan@intern.my"
                >
                <x-input-error :messages="$errors->get('email')" class="mt-1 ml-1" />
            </div>

            <div class="space-y-2">
                <div class="flex justify-between items-center px-1">
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em]">Kata Laluan</label>
                    <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-[#FEB05D] uppercase tracking-widest hover:underline">
                        Lupa?
                    </a>
                </div>
                <input 
                    type="password" 
                    name="password" 
                    required 
                    class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg text-sm font-bold text-[#2C2C2C] transition-all duration-200
                    focus:border-[#2C2C2C] focus:ring-[10px] focus:ring-[#FEB05D]/10 focus:outline-none placeholder:text-gray-300"
                    placeholder="••••••••"
                >
                <x-input-error :messages="$errors->get('password')" class="mt-1 ml-1" />
            </div>

            <div class="flex items-center px-1">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded-sm border-gray-300 text-[#2C2C2C] focus:ring-[#FEB05D]">
                    <span class="ms-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Ingat Saya</span>
                </label>
            </div>

            <div class="pt-2">
                <button 
                    type="submit" 
                    class="w-full py-4 bg-[#2C2C2C] text-[#FEB05D] rounded-lg font-bold uppercase tracking-[0.4em] text-xs hover:bg-[#1a1a1a] transition-all shadow-lg active:scale-[0.99]">
                    Log Masuk
                </button>
            </div>

            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-100"></div>
                </div>
                <div class="relative flex justify-center text-[9px] uppercase font-bold tracking-[0.3em]">
                    <span class="bg-white px-4 text-gray-400">Atau Guna</span>
                </div>
            </div>

            <div class="pt-1">
                <button 
                    type="button" 
                    onclick="window.location.href='#'"
                    class="w-full py-5 bg-white border-2 border-[#2C2C2C] text-[#2C2C2C] rounded-lg font-bold uppercase tracking-[0.2em] text-[11px] hover:bg-gray-50 transition-all flex items-center justify-center gap-4 active:scale-[0.99]">
                    
                    <img src="{{ asset('images/mydid.png') }}" alt="MyDigital ID" class="w-16 h-6 object-contain">
                    
                    <span class="mt-0.5">Log Masuk MyDigital ID</span>
                </button>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                    Kakitangan Baru?
                    <a href="{{ route('register') }}" class="text-[#FEB05D] font-black hover:underline ml-1">Daftar Sini</a>
                </p>
            </div>
        </form>

        <p class="text-center text-[9px] font-bold text-gray-300 uppercase tracking-[0.5em] mt-12">
            Internal Portal &copy; 2026 Kodewave Sdn Bhd
        </p>
    </div>

</body>
</html>