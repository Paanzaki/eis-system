<nav class="bg-slate-950 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <span class="text-orange-500 font-black text-2xl italic tracking-tighter">EIS.</span>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-400 hover:text-orange-500">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('perolehan')" :active="request()->routeIs('perolehan')" class="text-gray-400 hover:text-orange-500">
                        {{ __('Perolehan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('aset')" :active="request()->routeIs('aset')" class="text-gray-400 hover:text-orange-500">
                        {{ __('Pengurusan Aset') }}
                    </x-nav-link>
                    <x-nav-link :href="route('chatbot')" :active="request()->routeIs('chatbot')" class="text-gray-400 hover:text-orange-500">
                        {{ __('AI Assistant') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="flex items-center text-sm font-medium text-gray-400">
                {{ Auth::user()->name }}
            </div>
        </div>
    </div>
</nav>