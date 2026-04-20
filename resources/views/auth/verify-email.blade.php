<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-black tracking-tight text-[#2C2C2C] uppercase leading-none">Sahkan Emel</h2>
        <p class="text-[10px] uppercase font-bold text-gray-400 tracking-widest mt-4 leading-relaxed">
            Terima kasih kerana mendaftar! Sila sahkan emel anda melalui pautan yang kami hantar. Jika tidak terima, kami boleh hantar semula.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-bold text-[10px] text-green-600 uppercase tracking-widest bg-green-50 p-3 rounded-lg border border-green-100">
            Pautan pengesahan baru telah dihantar.
        </div>
    @endif

    <div class="mt-4 flex flex-col gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="w-full py-4 bg-[#2C2C2C] text-[#FEB05D] rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-[#3d3d3d] transition-all shadow-lg border-none">
                Hantar Semula Emel
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full py-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest hover:text-red-500 transition-colors bg-transparent border-none">
                Log Keluar
            </button>
        </form>
    </div>
</x-guest-layout>