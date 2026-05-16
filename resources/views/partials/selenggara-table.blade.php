{{--
    Shared CRUD table for all Selenggara pages.
    Props:
      $title   – table heading
      $headers – array of column headers (last column always has action buttons)
      $rows    – array of data rows (last element = Status)
--}}
<div class="bg-white rounded-[5px] border border-gray-100 shadow-sm p-5">
    <div class="flex flex-col md:flex-row gap-4">
        <div class="flex-1 relative">
            <svg class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2.5"/>
            </svg>
            <input type="text" placeholder="Cari rekod..."
                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-[5px] text-[11px] font-bold outline-none focus:border-[#1E3A8A] focus:bg-white transition-all">
        </div>
        <select class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-[5px] text-[10px] font-black uppercase outline-none cursor-pointer">
            <option>Semua Status</option>
            <option>Aktif</option>
            <option>Tidak Aktif</option>
        </select>
    </div>
</div>

<div class="bg-white rounded-[5px] border border-gray-100 shadow-sm overflow-hidden">
    <div class="flex items-center justify-between px-10 py-6 border-b border-gray-50">
        <div>
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">{{ $title ?? 'Senarai Rekod' }}</h4>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">{{ count($rows ?? []) }} rekod aktif dalam sistem</p>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="eis-table">
            <thead>
                <tr>
                    <th class="pl-10">No.</th>
                    @foreach($headers ?? [] as $h)
                    <th>{{ $h }}</th>
                    @endforeach
                    <th class="pr-10 text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rows ?? [] as $i => $row)
                <tr>
                    <td class="pl-10 text-slate-400 font-bold text-[11px]">{{ $i + 1 }}</td>
                    @foreach($row as $j => $cell)
                        @if($j === array_key_last($row))
                        <td>
                            <span class="badge {{ $cell === 'Aktif' ? 'badge-green' : 'badge-red' }}">{{ $cell }}</span>
                        </td>
                        @else
                        <td class="text-[11px] {{ $j === 0 ? 'font-black text-[#1E3A8A]' : 'text-slate-600 font-bold' }}">{{ $cell }}</td>
                        @endif
                    @endforeach
                    <td class="pr-10">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ request()->fullUrlWithQuery(['status' => 'kemaskini']) }}" class="p-1.5 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-600 transition-all">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2"/></svg>
                            </a>
                            <a href="{{ request()->fullUrlWithQuery(['status' => 'hapus']) }}" class="p-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-red-500 transition-all">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2"/></svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
