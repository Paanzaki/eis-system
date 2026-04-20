<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-black tracking-tight text-[#2C2C2C] uppercase leading-none">Lupa Kata Laluan?</h2>
        <p class="text-[10px] uppercase font-bold text-gray-400 tracking-widest mt-3">
            Masukkan emel anda dan kami akan hantar pautan tetapan semula.
        </p>
    </div>

    <x-auth-session-status class="mb-4 text-[10px] font-bold uppercase" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf
        <div>
            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Alamat Emel</label>
            <x-text-input id="email" class="block mt-1 w-full !bg-gray-50 !border-gray-200 focus:!border-[#FEB05D] focus:!ring-0 !rounded-xl !py-3 !font-bold !text-[#2C2C2C]" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <button type="submit" class="w-full py-4 bg-[#2C2C2C] text-[#FEB05D] rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-[#3d3d3d] transition-all shadow-lg border-none">
            Hantar Pautan Reset
        </button>

        <div class="text-center mt-6">
            <a href="{{ route('login') }}" class="text-[10px] font-bold text-gray-400 uppercase tracking-widest hover:text-[#FEB05D]">
                Kembali ke Log Masuk
            </a>
        </div>
    </form>
</x-guest-layout>