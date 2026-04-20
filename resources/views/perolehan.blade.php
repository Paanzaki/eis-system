<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-sm text-[#2C2C2C] leading-tight tracking-widest uppercase">
            EIS <span class="text-[#FEB05D]">/</span> {{ __('Pengurusan Perolehan') }}
        </h2>
    </x-slot>

    <div class="py-1 bg-[#F8F9FA] min-h-screen">
        <div class="max-w-[98%] mx-auto sm:px-4 lg:px-6 space-y-4">
            <div class="bg-white shadow-sm rounded-2xl border border-gray-200 border-l-4  flex flex-col overflow-hidden">
                
                <div class="p-4 border-b border-gray-100 bg-gray-50 flex items-center">
                    <h3 class="font-bold text-[#2C2C2C] text-sm uppercase tracking-wider">Borang Permohonan Baru</h3>
                </div>

                <div class="p-8 space-y-6">
                    <div>
                        <label class="block text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2 text-[#2C2C2C]">Nama Barang / Perkhidmatan</label>
                        <input type="text" class="block w-full px-4 py-3 bg-gray-50 border-gray-200 focus:border-[#FEB05D] focus:ring-0 rounded-xl text-sm text-[#2C2C2C] placeholder-gray-400 transition-all font-bold" placeholder="Contoh: MacBook Pro M3">
                    </div>

                    <div>
                        <label class="block text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2 text-[#2C2C2C]">Justifikasi Keperluan</label>
                        <textarea rows="4" class="block w-full px-4 py-3 bg-gray-50 border-gray-200 focus:border-[#FEB05D] focus:ring-0 rounded-xl text-sm text-[#2C2C2C] placeholder-gray-400 transition-all font-bold" placeholder="Nyatakan sebab permohonan..."></textarea>
                    </div>

                    <button type="button" 
                        style="background-color: #FEB05D; color: #2C2C2C; padding: 14px; border-radius: 12px; font-weight: bold; border: none; cursor: pointer; width: 100%; transition: 0.3s; text-transform: uppercase; letter-spacing: 1px;"
                        onmouseover="this.style.backgroundColor='#fd9d35'" 
                        onmouseout="this.style.backgroundColor='#FEB05D'">
                        Hantar Permohonan
                    </button>
                </div>
                
                <div class="p-4 bg-gray-50 border-t border-gray-100 text-center">
                    <p class="text-[9px] text-gray-400 tracking-widest uppercase font-bold">EIS Procurement System v1.0</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>