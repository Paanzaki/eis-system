<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-sm text-[#2C2C2C] leading-tight tracking-widest uppercase">
            EIS <span class="text-[#FEB05D]">/</span> {{ __('Pengurusan Aset') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#F8F9FA] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-2xl border border-gray-200 border-l-4  flex flex-col overflow-hidden">
                
                <div class="p-4 border-b border-gray-100 bg-gray-50 flex items-center justify-between">
                    <h3 class="font-bold text-[#2C2C2C] text-sm uppercase tracking-wider">Senarai Inventori Aset</h3>
                    <button style="background-color: #2C2C2C; color: #FEB05D; padding: 8px 16px; border-radius: 8px; font-weight: bold; border: none; font-size: 11px; text-transform: uppercase; cursor: pointer;"
                            onmouseover="this.style.backgroundColor='#404040'" 
                            onmouseout="this.style.backgroundColor='#2C2C2C'">
                        + Daftar Aset
                    </button>
                </div>

                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white border-b border-gray-100">
                                <th class="px-6 py-4 text-[10px] text-gray-500 uppercase font-bold tracking-widest">No Siri</th>
                                <th class="px-6 py-4 text-[10px] text-gray-500 uppercase font-bold tracking-widest">Nama Aset</th>
                                <th class="px-6 py-4 text-[10px] text-gray-500 uppercase font-bold tracking-widest">Kategori</th>
                                <th class="px-6 py-4 text-[10px] text-gray-500 uppercase font-bold tracking-widest">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-bold text-[#FEB05D] font-mono">KW-ASSET-001</td>
                                <td class="px-6 py-4 text-sm font-bold text-[#2C2C2C]">Dell Latitude 5420</td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-400 uppercase">Hardware</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-green-50 text-green-600 border border-green-100 uppercase tracking-tighter">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                                        Aktif
                                    </span>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-bold text-[#FEB05D] font-mono">KW-ASSET-002</td>
                                <td class="px-6 py-4 text-sm font-bold text-[#2C2C2C]">Logitech MX Master 3</td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-400 uppercase">Peripherals</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-orange-50 text-orange-600 border border-orange-100 uppercase tracking-tighter">
                                        <span class="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2"></span>
                                        Maintenance
                                    </span>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-bold text-[#FEB05D] font-mono">KW-ASSET-003</td>
                                <td class="px-6 py-4 text-sm font-bold text-[#2C2C2C]">Printer HP LaserJet</td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-400 uppercase">Office Gear</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-red-50 text-red-600 border border-red-100 uppercase tracking-tighter">
                                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-2"></span>
                                        Disposed
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="p-4 bg-gray-50 border-t border-gray-100 text-center">
                    <p class="text-[9px] text-gray-400 tracking-widest uppercase font-bold">EIS Asset Management System</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>