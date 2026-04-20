<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-black tracking-tight text-[#2C2C2C] uppercase leading-none">Log Masuk</h2>
        <p class="text-[10px] uppercase font-bold text-gray-400 tracking-widest mt-2">Akses sistem Enterprise Intelligence System</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Alamat Emel</label>
            <x-text-input id="email" class="block mt-1 w-full !bg-gray-50 !border-gray-200 focus:!border-[#FEB05D] focus:!ring-0 !rounded-xl !py-3 !font-bold !text-[#2C2C2C]" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex justify-between items-center mb-1">
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest">Kata Laluan</label>
                @if (Route::has('password.request'))
                    <a class="text-[9px] font-bold text-[#FEB05D] uppercase tracking-widest hover:underline" href="{{ route('password.request') }}">
                        Lupa?
                    </a>
                @endif
            </div>
            <x-text-input id="password" class="block mt-1 w-full !bg-gray-50 !border-gray-200 focus:!border-[#FEB05D] focus:!ring-0 !rounded-xl !py-3 !font-bold !text-[#2C2C2C]" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#FEB05D] shadow-sm focus:ring-[#FEB05D] focus:ring-offset-0" name="remember">
                <span class="ms-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Ingat Saya</span>
            </label>
        </div>

        <button type="submit" class="w-full mt-6 py-4 bg-[#2C2C2C] text-[#FEB05D] rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-[#3d3d3d] transition-all shadow-lg border-none cursor-pointer">
            Log Masuk
        </button>

        <p class="text-center text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-6">
            Belum ada akaun? <a href="{{ route('register') }}" class="text-[#FEB05D] hover:underline">Daftar Sekarang</a>
        </p>
    </form>
</x-guest-layout>