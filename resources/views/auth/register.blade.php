<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-black tracking-tight text-[#2C2C2C] uppercase">Daftar</h2>
        <p class="text-[10px] uppercase font-bold text-gray-400 tracking-widest">Cipta akaun baru dalam sistem EIS</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Nama Penuh</label>
            <x-text-input id="name" class="block mt-1 w-full !bg-gray-50 !border-gray-200 focus:!border-[#FEB05D] !rounded-xl !py-3 !font-bold" type="text" name="name" required autofocus />
        </div>

        <div>
            <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Emel Rasmi</label>
            <x-text-input id="email" class="block mt-1 w-full !bg-gray-50 !border-gray-200 focus:!border-[#FEB05D] !rounded-xl !py-3 !font-bold" type="email" name="email" required />
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Kata Laluan</label>
                <x-text-input id="password" class="block mt-1 w-full !bg-gray-50 !border-gray-200 focus:!border-[#FEB05D] !rounded-xl !py-3 !font-bold" type="password" name="password" required />
            </div>
            <div>
                <label class="block text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Sahkan</label>
                <x-text-input id="password_confirmation" class="block mt-1 w-full !bg-gray-50 !border-gray-200 focus:!border-[#FEB05D] !rounded-xl !py-3 !font-bold" type="password" name="password_confirmation" required />
            </div>
        </div>

        <button type="submit" class="w-full mt-6 py-4 bg-[#2C2C2C] text-[#FEB05D] rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-[#3d3d3d] transition-all shadow-lg border-none">
            Daftar Akaun
        </button>

        <p class="text-center text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-4">
            Sudah ada akaun? <a href="{{ route('login') }}" class="text-[#FEB05D] hover:underline">Log Masuk</a>
        </p>
    </form>
</x-guest-layout>