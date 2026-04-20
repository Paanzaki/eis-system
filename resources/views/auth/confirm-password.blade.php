<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-black tracking-tight text-[#2C2C2C] uppercase leading-none text-center">Sahkan Akses</h2>
        <p class="text-[10px] uppercase font-bold text-gray-400 tracking-widest mt-3 text-center">
            Sila sahkan kata laluan anda sebelum meneruskan.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf
        <div>
            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Kata Laluan</label>
            <x-text-input id="password" class="block mt-1 w-full !bg-gray-50 !border-gray-200 focus:!border-[#FEB05D] focus:!ring-0 !rounded-xl !py-3 !font-bold !text-[#2C2C2C]"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <button type="submit" class="w-full py-4 bg-[#2C2C2C] text-[#FEB05D] rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-[#3d3d3d] transition-all shadow-lg border-none">
            Sahkan Kata Laluan
        </button>
    </form>
</x-guest-layout>