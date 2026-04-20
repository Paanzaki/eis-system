<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-sm text-[#2C2C2C] leading-tight tracking-widest uppercase">
            EIS <span class="text-[#FEB05D]">/</span> {{ __('AI Smart Assistant') }}
        </h2>
    </x-slot>

    <div class="py-11 bg-[#F8F9FA] min-h-screen">
        <div class="max-w-[98%] mx-auto sm:px-4 lg:px-6 space-y-4">
            <div class="bg-white shadow-xl rounded-2xl flex flex-col h-[650px] border border-gray-200 border-l-4  overflow-hidden">
                
                <div class="p-4 border-b border-gray-100 bg-[#2C2C2C] flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#FEB05D] rounded-full flex items-center justify-center text-[#2C2C2C] shadow-lg border-2 border-white/10">
                            <span class="font-black text-xs">AI</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-white text-sm">EIS Virtual Mentor</h3>
                            <p class="text-[10px] text-[#FEB05D] flex items-center gap-1 uppercase tracking-wider font-bold">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span> System Ready
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-6 overflow-y-auto flex-grow bg-[#FDFDFD] space-y-6 custom-scrollbar">
                    
                    <div class="flex justify-start items-end gap-2 text-[#2C2C2C]">
                        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-[10px] font-bold text-[#2C2C2C] border border-gray-200 shadow-sm shrink-0">AI</div>
                        <div class="bg-gray-100 p-4 rounded-2xl rounded-bl-none max-w-md text-sm font-bold border border-gray-200 text-[#2C2C2C]">
                            Selamat sejahtera! Saya adalah **EIS Assistant**. 
                            <br><br>
                            Ada apa-apa soalan mengenai **perolehan** atau **aset** syarikat?
                        </div>
                    </div>

                    <div class="flex justify-end items-end gap-2">
                        <div class="bg-[#FEB05D] p-4 rounded-2xl rounded-br-none max-w-md text-sm font-bold text-[#2C2C2C] shadow-md border border-[#fd9d35]">
                            Macam mana nak daftar laptop baru dalam sistem?
                        </div>
                        <div class="w-8 h-8 bg-[#2C2C2C] rounded-full flex items-center justify-center text-[10px] font-bold text-[#FEB05D] uppercase shrink-0">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    </div>

                </div>

                <div class="p-4 bg-white border-t border-gray-100">
                    <div class="flex items-center gap-3">
                        <input type="text" 
                            class="block w-full px-4 py-3 bg-gray-50 border-gray-200 focus:border-[#FEB05D] focus:ring-0 rounded-xl text-sm text-[#2C2C2C] placeholder-gray-400 transition-all font-bold" 
                            placeholder="Tanya sesuatu tentang sistem...">
                        
                        <button type="button" 
                            style="background-color: #2C2C2C; color: #FEB05D; padding: 12px 24px; border-radius: 12px; font-weight: bold; border: none; cursor: pointer; min-width: 100px; transition: 0.3s;"
                            onmouseover="this.style.backgroundColor='#404040'" 
                            onmouseout="this.style.backgroundColor='#2C2C2C'">
                            Hantar
                        </button>
                    </div>
                    <p class="text-[9px] text-gray-400 mt-2 text-center tracking-widest uppercase font-bold">Powered by EIS Intelligence v3.0</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>