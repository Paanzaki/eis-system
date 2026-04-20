<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | EIS Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen w-screen flex items-center justify-center bg-[#F2F2F2] px-6 py-12 overflow-x-hidden">

    <div class="fixed top-0 left-0 w-full h-1 bg-[#FEB05D]"></div>

    <div class="relative z-10 w-full max-w-3xl bg-white rounded-xl shadow-[0_10px_40px_rgba(0,0,0,0.04)] border border-gray-200 p-12 md:px-20 md:py-16">

        <div class="text-center mb-10">
            <h1 class="text-4xl font-black text-[#2C2C2C] tracking-tighter uppercase">
                EIS<span class="text-[#FEB05D]">.</span> REGISTRATION
            </h1>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.5em] mt-3">
                Cipta Akaun Baharu Karyawan
            </p>
            <div class="w-10 h-[3px] bg-[#FEB05D] mx-auto mt-4"></div>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6 max-w-xl mx-auto">
            @csrf

            <div class="space-y-2">
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1">Nama Penuh</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required autofocus 
                    class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg text-sm font-bold text-[#2C2C2C] transition-all duration-200
                    focus:border-[#2C2C2C] focus:ring-[10px] focus:ring-[#FEB05D]/10 focus:outline-none placeholder:text-gray-300"
                    placeholder="Contoh: Muhammad Farhan"
                >
                <x-input-error :messages="$errors->get('name')" class="mt-1 ml-1" />
            </div>

            <div class="space-y-2">
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1">Alamat Emel Rasmi</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg text-sm font-bold text-[#2C2C2C] transition-all duration-200
                    focus:border-[#2C2C2C] focus:ring-[10px] focus:ring-[#FEB05D]/10 focus:outline-none placeholder:text-gray-300"
                    placeholder="farhan@intern.my"
                >
                <x-input-error :messages="$errors->get('email')" class="mt-1 ml-1" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1">Kata Laluan</label>
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

                <div class="space-y-2">
                    <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1">Sahkan Kata Laluan</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg text-sm font-bold text-[#2C2C2C] transition-all duration-200
                        focus:border-[#2C2C2C] focus:ring-[10px] focus:ring-[#FEB05D]/10 focus:outline-none placeholder:text-gray-300"
                        placeholder="••••••••"
                    >
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 ml-1" />
                </div>
            </div>

            <div class="pt-4 space-y-6 text-center">
                <button 
                    type="submit" 
                    class="w-full py-4 bg-[#2C2C2C] text-[#FEB05D] rounded-lg font-bold uppercase tracking-[0.4em] text-xs hover:bg-[#1a1a1a] transition-all shadow-lg active:scale-[0.99]">
                    Daftar Akaun
                </button>

                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest pt-4 border-t border-gray-100">
                    Sudah mempunyai akaun?
                    <a href="{{ route('login') }}" class="text-[#FEB05D] font-black hover:underline ml-1">Log Masuk</a>
                </p>
            </div>
        </form>

        <p class="text-center text-[9px] font-bold text-gray-300 uppercase tracking-[0.5em] mt-12">
            Portal Pendaftaran &copy; 2026 Kodewave Sdn Bhd
        </p>
    </div>

</body>
</html>