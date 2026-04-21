<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Masuk — EIS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen w-screen flex overflow-hidden">

    <div class="hidden md:flex w-1/2 flex-shrink-0 bg-[#2C2C2C] flex-col justify-between p-14">
        <div>
            <h1 class="text-7xl font-black text-white leading-none" style="letter-spacing:-0.04em;">
                EIS
            </h1>
            <div class="w-12 h-1 bg-[#FEB05D] rounded-full mt-5 mb-5"></div>
            <p class="text-[10px] font-bold uppercase tracking-widest" style="color:rgba(255,255,255,0.3);">
                Enterprise Intelligence System
            </p>
        </div>

        <div>
            <p class="text-2xl font-black text-white leading-snug" style="letter-spacing:-0.01em;">
                Sistem pengurusan aset <span class="text-[#FEB05D]">pintar</span> untuk organisasi anda.
            </p>
            <p class="text-[10px] font-bold uppercase tracking-widest mt-5" style="color:rgba(255,255,255,0.2);">
                v2.0 &nbsp;·&nbsp; Secure Access
            </p>
        </div>
    </div>

    <div class="w-full md:w-1/2 flex items-center justify-center px-10 py-12 overflow-y-auto bg-[#f4f4f5]">
        <div class="w-full max-w-sm">

            <div class="inline-flex items-center gap-2 bg-[#FEB05D]/10 border border-[#FEB05D]/25 rounded-full px-3 py-1 mb-8">
                <span class="w-1.5 h-1.5 rounded-full bg-[#FEB05D] inline-block"></span>
                <span class="text-[10px] font-bold uppercase tracking-widest text-[#FEB05D]">Secure Portal</span>
            </div>

            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">Selamat kembali</p>
            <h2 class="text-3xl font-black text-[#2C2C2C] mb-8" style="letter-spacing:-0.02em;">Log Masuk</h2>

            @if (session('status'))
                <div class="mb-4 text-sm font-medium text-green-600">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5">Alamat Emel</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@organisasi.gov.my"
                        class="w-full bg-white border-[1.5px] border-gray-200 rounded-xl py-3 px-4 text-sm font-semibold text-[#2C2C2C] placeholder-gray-300 focus:border-[#FEB05D] focus:ring-0 outline-none transition">
                    @error('email') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Kata Laluan</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-[#FEB05D] uppercase tracking-widest hover:underline">Lupa?</a>
                        @endif
                    </div>
                    <input type="password" name="password" required placeholder="••••••••"
                        class="w-full bg-white border-[1.5px] border-gray-200 rounded-xl py-3 px-4 text-sm font-semibold text-[#2C2C2C] placeholder-gray-300 focus:border-[#FEB05D] focus:ring-0 outline-none transition">
                    @error('password') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember_me" class="w-4 h-4 rounded accent-[#FEB05D] border-gray-300 cursor-pointer">
                    <label for="remember_me" class="text-[10px] font-bold uppercase tracking-widest text-gray-400 cursor-pointer select-none">Ingat Saya</label>
                </div>

                <button type="submit" class="w-full py-3.5 bg-[#FEB05D] text-[#2C2C2C] rounded-xl font-black uppercase tracking-widest text-xs hover:bg-amber-400 transition shadow-lg shadow-amber-500/10 active:scale-[0.98]">
                    Masuk Sistem &rarr;
                </button>

                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-[9px] uppercase font-bold tracking-[0.2em]">
                        <span class="bg-[#f4f4f5] px-4 text-gray-400">Atau Guna</span>
                    </div>
                </div>

                <button type="button" onclick="window.location.href='#'"
                    class="w-full py-3.5 bg-white border-[1.5px] border-[#2C2C2C] text-[#2C2C2C] rounded-xl font-bold uppercase tracking-widest text-[10px] hover:bg-gray-50 transition flex items-center justify-center gap-3 active:scale-[0.98]">
                    <img src="{{ asset('images/mydid.png') }}" alt="MyDID" class="w-14 h-5 object-contain">
                    Log Masuk MyDigital ID
                </button>

                <p class="text-center text-[10px] font-bold uppercase tracking-widest text-gray-400 pt-1">
                    Belum ada akaun?
                    <a href="{{ route('register') }}" class="text-[#FEB05D] hover:underline font-black">Daftar Sekarang</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>