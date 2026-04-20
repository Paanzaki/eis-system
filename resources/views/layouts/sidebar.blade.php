<div class="w-64 bg-[#2C2C2C] flex flex-col hidden md:flex shadow-xl">
    <div class="h-16 flex items-center px-6 bg-[#232323] border-b border-gray-700">
        <span class="text-[#FEB05D] font-black text-2xl tracking-tighter">EIS.</span>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2">
        <p class="px-2 text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-4">Menu Utama</p>
        
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-[#FEB05D] text-[#2C2C2C]' : 'text-gray-400 hover:text-[#FEB05D]' }} flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all">
            Dashboard
        </a>
        <a href="{{ route('perolehan') }}" class="{{ request()->routeIs('perolehan') ? 'bg-[#FEB05D] text-[#2C2C2C]' : 'text-gray-400 hover:text-[#FEB05D]' }} flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all text-gray-400">
            Perolehan
        </a>
        <a href="{{ route('aset') }}" class="{{ request()->routeIs('aset') ? 'bg-[#FEB05D] text-[#2C2C2C]' : 'text-gray-400 hover:text-[#FEB05D]' }} flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all text-gray-400">
            Pengurusan Aset
        </a>
        <a href="{{ route('chatbot') }}" class="{{ request()->routeIs('chatbot') ? 'bg-[#FEB05D] text-[#2C2C2C]' : 'text-gray-400 hover:text-[#FEB05D]' }} flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all text-gray-400">
            AI Assistant
        </a>
    </nav>

    <div class="p-4 bg-[#232323] border-t border-gray-800">
        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-[#2C2C2C] transition-all group border border-transparent hover:border-gray-700">
            <div class="w-10 h-10 bg-[#FEB05D] rounded-lg flex items-center justify-center font-bold text-[#2C2C2C] shadow-lg">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="overflow-hidden">
                <p class="text-xs font-bold text-gray-100 truncate group-hover:text-[#FEB05D] transition-colors">{{ Auth::user()->name }}</p>
                <p class="text-[9px] text-gray-500 uppercase font-bold tracking-tighter">System User</p>
            </div>
        </a>

        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center px-3 py-2 text-[10px] font-bold text-gray-600 hover:text-red-400 uppercase tracking-widest transition-colors border border-gray-800 rounded-lg hover:border-red-400/20 hover:bg-red-400/5">
                Log Keluar
            </button>
        </form>
    </div>
</div>