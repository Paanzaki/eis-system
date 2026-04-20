<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-black tracking-tight text-[#2C2C2C] uppercase leading-none">Tetapan Semula</h2>
        <p class="text-[10px] uppercase font-bold text-gray-400 tracking-widest mt-3">Sila cipta kata laluan baru anda</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Alamat Emel</label>
            <x-text-input id="email" class="block mt-1 w-full !bg-gray-50 !border-gray-200 focus:!border-[#FEB05D] !rounded-xl !py-3 !font-bold" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Kata Laluan Baru</label>
            <x-text-input id="password" class="block mt-1 w-full !bg-gray-50 !border-gray-200 focus:!border-[#FEB05D] !rounded-xl !py-3 !font-bold" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Sahkan Kata Laluan</label>
            <x-text-input id="password_confirmation" class="block mt-1 w-full !bg-gray-50 !border-gray-200 focus:!border-[#FEB05D] !rounded-xl !py-3 !font-bold" type="password" name="password_confirmation" required />
        </div>

        <button type="submit" class="w-full mt-4 py-4 bg-[#2C2C2C] text-[#FEB05D] rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-[#3d3d3d] transition-all shadow-lg border-none">
            Reset Kata Laluan
        </button>
    </form>
</x-guest-layout>