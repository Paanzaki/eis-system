@extends('layouts.dashboard')

@section('content')
<div class="content-fluid space-y-8 pb-12" x-data="penggunaModule()">

    {{-- ── Page Header ── --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div class="space-y-1">
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Pengurusan <span class="text-red-600">Pengguna.</span>
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">
                FB-EIS-MA-PP &mdash; Profil & Kawalan Capaian
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button @click="openAddModal()"
                class="flex items-center gap-2 bg-[#1E3A8A] hover:bg-red-700 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5"/></svg>
                Tambah Pengguna
            </button>
            <button class="flex items-center gap-2 btn-export-outline border text-slate-500 hover:text-[#1E3A8A] px-5 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke-width="2"/></svg>
                Eksport Excel
            </button>
        </div>
    </div>

    {{-- ── Stats Row ── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['label' => 'Jumlah Pengguna',    'val' => '47',  'sub' => 'Berdaftar dalam sistem', 'color' => 'blue',   'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
            ['label' => 'Pengguna Aktif',      'val' => '43',  'sub' => '4 tidak aktif',           'color' => 'green',  'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['label' => 'Peranan Ditetapkan',  'val' => '6',   'sub' => 'Peranan dalam sistem',    'color' => 'yellow', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
            ['label' => 'Log Masuk Hari Ini',  'val' => '19',  'sub' => 'Sesi aktif sekarang',     'color' => 'red',    'icon' => 'M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1'],
        ] as $stat)
        <div class="card-stat-pns bg-white p-6 rounded-2xl">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center
                    {{ $stat['color'] === 'blue' ? 'bg-blue-50' : ($stat['color'] === 'green' ? 'bg-emerald-50' : ($stat['color'] === 'yellow' ? 'bg-yellow-50' : 'bg-red-50')) }}">
                    <svg class="w-5 h-5 {{ $stat['color'] === 'blue' ? 'text-blue-600' : ($stat['color'] === 'green' ? 'text-emerald-600' : ($stat['color'] === 'yellow' ? 'text-yellow-500' : 'text-red-500')) }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="{{ $stat['icon'] }}" stroke-width="2"/></svg>
                </div>
            </div>
            <p class="text-3xl font-black text-[#1E3A8A] tracking-tighter">{{ $stat['val'] }}</p>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-1">{{ $stat['label'] }}</p>
            <p class="text-[9px] text-slate-400 font-bold mt-0.5">{{ $stat['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- ── Filters & Search ── --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <svg class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2.5"/>
                </svg>
                <input type="text" x-model="search" placeholder="Cari nama, emel atau jabatan..."
                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-[11px] font-bold outline-none focus:border-[#1E3A8A] focus:bg-white transition-all">
            </div>
            <select x-model="filterRole" class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-xl text-[10px] font-black uppercase outline-none focus:border-[#1E3A8A] cursor-pointer">
                <option value="">Semua Peranan</option>
                <option value="Super Admin">Super Admin</option>
                <option value="Pentadbir Sistem">Pentadbir Sistem</option>
                <option value="Pegawai Perolehan">Pegawai Perolehan</option>
                <option value="Pegawai Aset">Pegawai Aset</option>
                <option value="Eksekutif">Eksekutif</option>
                <option value="Pengguna Umum">Pengguna Umum</option>
            </select>
            <select x-model="filterStatus" class="bg-gray-50 border border-gray-200 py-3 px-4 rounded-xl text-[10px] font-black uppercase outline-none focus:border-[#1E3A8A] cursor-pointer">
                <option value="">Semua Status</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
    </div>

    {{-- ── Users Table ── --}}
    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-10 py-6 border-b border-gray-50">
            <div>
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Senarai Pengguna Berdaftar</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">
                    Menunjukkan <span x-text="filtered.length"></span> rekod daripada 47 pengguna
                </p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="eis-table">
                <thead>
                    <tr>
                        <th class="pl-10">No.</th>
                        <th>Nama Penuh</th>
                        <th>Emel</th>
                        <th>Jabatan</th>
                        <th>Peranan</th>
                        <th>Gred</th>
                        <th>Log Masuk Terakhir</th>
                        <th>Status</th>
                        <th class="pr-10">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(u, i) in filtered" :key="u.id">
                        <tr>
                            <td class="pl-10 text-slate-400 font-bold" x-text="i + 1"></td>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-[#1E3A8A] to-blue-500 flex items-center justify-center text-white text-[10px] font-black flex-shrink-0"
                                        x-text="u.nama.charAt(0)"></div>
                                    <span class="text-[11px] font-black text-[#1E293B]" x-text="u.nama"></span>
                                </div>
                            </td>
                            <td class="text-[11px] text-slate-600" x-text="u.emel"></td>
                            <td class="text-[11px] text-slate-600" x-text="u.jabatan"></td>
                            <td>
                                <span class="badge"
                                    :class="{
                                        'badge-red':    u.peranan === 'Super Admin',
                                        'badge-blue':   u.peranan === 'Pentadbir Sistem',
                                        'badge-purple': u.peranan === 'Pegawai Perolehan',
                                        'badge-amber':  u.peranan === 'Pegawai Aset',
                                        'badge-green':  u.peranan === 'Eksekutif',
                                        'badge-gray':   u.peranan === 'Pengguna Umum',
                                    }" x-text="u.peranan"></span>
                            </td>
                            <td class="text-[11px] font-bold text-slate-600" x-text="u.gred"></td>
                            <td class="text-[11px] text-slate-400 font-bold" x-text="u.logMasuk"></td>
                            <td>
                                <span class="badge" :class="u.status === 'Aktif' ? 'badge-green' : 'badge-red'" x-text="u.status"></span>
                            </td>
                            <td class="pr-10">
                                <div class="flex items-center gap-2">
                                    <button @click="openEditModal(u)"
                                        class="p-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600 transition-all" title="Edit">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2"/></svg>
                                    </button>
                                    <button @click="toggleStatus(u)"
                                        class="p-1.5 rounded-lg transition-all"
                                        :class="u.status === 'Aktif' ? 'bg-red-50 hover:bg-red-100 text-red-500' : 'bg-emerald-50 hover:bg-emerald-100 text-emerald-600'"
                                        :title="u.status === 'Aktif' ? 'Nyahaktif' : 'Aktifkan'">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" stroke-width="2"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                    <template x-if="filtered.length === 0">
                        <tr>
                            <td colspan="9" class="text-center py-16 text-slate-400 text-[12px] font-bold uppercase tracking-widest">
                                Tiada rekod dijumpai
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    {{-- ── Add/Edit Modal ── --}}
    <div x-show="showModal" x-cloak @click.self="showModal = false"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-6">
        <div class="bg-white rounded-[2rem] shadow-2xl w-full max-w-2xl overflow-hidden"
            @click.stop x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">

            <div class="flex items-center justify-between px-10 py-7 border-b border-gray-100 bg-gray-50/50">
                <div>
                    <h4 class="text-[13px] font-black text-[#1E3A8A] uppercase tracking-widest"
                        x-text="editMode ? 'Kemaskini Pengguna' : 'Tambah Pengguna Baharu'"></h4>
                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">FB-EIS-MA-PP</p>
                </div>
                <button @click="showModal = false" class="p-2 rounded-xl hover:bg-gray-100 text-slate-400 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="2.5"/></svg>
                </button>
            </div>

            <div class="p-10 space-y-5">
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="label-heavy">Nama Penuh</label>
                        <input type="text" x-model="form.nama" placeholder="cth: Ahmad Fadzil bin Kamaruddin"
                            class="input-heavy rounded-xl">
                    </div>
                    <div>
                        <label class="label-heavy">Emel Rasmi</label>
                        <input type="email" x-model="form.emel" placeholder="cth: ahmad.fadzil@pns.gov.my"
                            class="input-heavy rounded-xl">
                    </div>
                    <div>
                        <label class="label-heavy">Jabatan / Agensi</label>
                        <select x-model="form.jabatan" class="input-heavy rounded-xl">
                            <option value="">-- Pilih Jabatan --</option>
                            <option>Perbendaharaan Negeri Selangor</option>
                            <option>Jabatan Audit Selangor</option>
                            <option>Unit Perolehan</option>
                            <option>Unit Aset</option>
                            <option>Jabatan Kewangan</option>
                            <option>Pejabat SUK Selangor</option>
                        </select>
                    </div>
                    <div>
                        <label class="label-heavy">Gred Jawatan</label>
                        <select x-model="form.gred" class="input-heavy rounded-xl">
                            <option value="">-- Pilih Gred --</option>
                            @foreach(['W17','W22','W27','W32','W41','W44','W48','W52','W54'] as $g)
                            <option>{{ $g }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="label-heavy">Peranan (RBAC)</label>
                        <select x-model="form.peranan" class="input-heavy rounded-xl">
                            <option value="">-- Pilih Peranan --</option>
                            <option>Super Admin</option>
                            <option>Pentadbir Sistem</option>
                            <option>Pegawai Perolehan</option>
                            <option>Pegawai Aset</option>
                            <option>Eksekutif</option>
                            <option>Pengguna Umum</option>
                        </select>
                    </div>
                    <div>
                        <label class="label-heavy">Status Akaun</label>
                        <select x-model="form.status" class="input-heavy rounded-xl">
                            <option>Aktif</option>
                            <option>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <template x-if="!editMode">
                    <div>
                        <label class="label-heavy">Kata Laluan Awal</label>
                        <input type="password" x-model="form.password" placeholder="Min. 8 aksara"
                            class="input-heavy rounded-xl">
                        <p class="text-[9px] text-slate-400 font-bold mt-2 ml-2">
                            * Pengguna perlu menukar kata laluan semasa log masuk pertama.
                        </p>
                    </div>
                </template>
            </div>

            <div class="flex items-center justify-end gap-3 px-10 py-6 border-t border-gray-100 bg-gray-50/50">
                <button @click="showModal = false"
                    class="px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-500 hover:bg-gray-100 transition-all">
                    Batal
                </button>
                <button @click="saveUser()"
                    class="px-8 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest bg-[#1E3A8A] hover:bg-red-700 text-white shadow-lg transition-all">
                    <span x-text="editMode ? 'Simpan Perubahan' : 'Daftar Pengguna'"></span>
                </button>
            </div>
        </div>
    </div>

</div>

<script>
function penggunaModule() {
    return {
        search: '',
        filterRole: '',
        filterStatus: '',
        showModal: false,
        editMode: false,
        form: { nama: '', emel: '', jabatan: '', gred: '', peranan: '', status: 'Aktif', password: '' },
        users: [
            { id:1,  nama:'Ahmad Fadzil bin Kamaruddin',   emel:'ahmad.fadzil@pns.gov.my',      jabatan:'Perbendaharaan Negeri Selangor', peranan:'Super Admin',        gred:'W54', logMasuk:'06/05/2026 08:42', status:'Aktif' },
            { id:2,  nama:'Siti Hajar binti Mohd Noor',    emel:'siti.hajar@pns.gov.my',         jabatan:'Unit Aset',                     peranan:'Pegawai Aset',        gred:'W41', logMasuk:'06/05/2026 09:01', status:'Aktif' },
            { id:3,  nama:'Mohd Razif bin Zainudin',       emel:'m.razif@pns.gov.my',            jabatan:'Pejabat SUK Selangor',          peranan:'Eksekutif',           gred:'W52', logMasuk:'06/05/2026 08:55', status:'Aktif' },
            { id:4,  nama:'Nurul Ain binti Abdul Wahab',   emel:'nurul.ain@pns.gov.my',          jabatan:'Unit Aset',                     peranan:'Pegawai Aset',        gred:'W32', logMasuk:'05/05/2026 16:30', status:'Aktif' },
            { id:5,  nama:'Zulkifli bin Omar',             emel:'zulkifli.omar@pns.gov.my',      jabatan:'Unit Perolehan',                peranan:'Pentadbir Sistem',    gred:'W48', logMasuk:'06/05/2026 07:58', status:'Aktif' },
            { id:6,  nama:'Azlan Shah bin Abdul Rahman',   emel:'azlan.shah@pns.gov.my',         jabatan:'Jabatan Kewangan',              peranan:'Pengguna Umum',       gred:'W27', logMasuk:'04/05/2026 11:22', status:'Aktif' },
            { id:7,  nama:'Faridah binti Ismail',          emel:'faridah.ismail@pns.gov.my',     jabatan:'Unit Perolehan',                peranan:'Pegawai Perolehan',   gred:'W44', logMasuk:'06/05/2026 09:30', status:'Aktif' },
            { id:8,  nama:'Hafiz bin Ramli',               emel:'hafiz.ramli@pns.gov.my',        jabatan:'Jabatan Audit Selangor',        peranan:'Pegawai Perolehan',   gred:'W41', logMasuk:'03/05/2026 15:00', status:'Aktif' },
            { id:9,  nama:'Rosnah binti Kadir',            emel:'rosnah.kadir@pns.gov.my',       jabatan:'Perbendaharaan Negeri Selangor',peranan:'Eksekutif',           gred:'W54', logMasuk:'06/05/2026 08:10', status:'Aktif' },
            { id:10, nama:'Iskandar bin Yusof',            emel:'iskandar.yusof@pns.gov.my',     jabatan:'Unit Perolehan',                peranan:'Pegawai Perolehan',   gred:'W32', logMasuk:'02/05/2026 09:45', status:'Tidak Aktif' },
            { id:11, nama:'Hasnah binti Talib',            emel:'hasnah.talib@pns.gov.my',       jabatan:'Jabatan Kewangan',              peranan:'Pengguna Umum',       gred:'W22', logMasuk:'28/04/2026 14:00', status:'Aktif' },
            { id:12, nama:'Ridhwan bin Azmi',              emel:'ridhwan.azmi@pns.gov.my',       jabatan:'Unit Aset',                     peranan:'Pegawai Aset',        gred:'W32', logMasuk:'06/05/2026 10:15', status:'Aktif' },
            { id:13, nama:'Noraini binti Hashim',          emel:'noraini.hashim@pns.gov.my',     jabatan:'Pejabat SUK Selangor',          peranan:'Eksekutif',           gred:'W48', logMasuk:'05/05/2026 08:30', status:'Aktif' },
            { id:14, nama:'Fadzli bin Samsudin',           emel:'fadzli.samsudin@pns.gov.my',    jabatan:'Unit Perolehan',                peranan:'Pengguna Umum',       gred:'W17', logMasuk:'01/05/2026 13:10', status:'Tidak Aktif' },
        ],

        get filtered() {
            return this.users.filter(u => {
                const s = this.search.toLowerCase();
                const matchSearch = !s || u.nama.toLowerCase().includes(s) || u.emel.toLowerCase().includes(s) || u.jabatan.toLowerCase().includes(s);
                const matchRole   = !this.filterRole   || u.peranan === this.filterRole;
                const matchStatus = !this.filterStatus || u.status  === this.filterStatus;
                return matchSearch && matchRole && matchStatus;
            });
        },

        openAddModal() {
            this.editMode = false;
            this.form = { nama:'', emel:'', jabatan:'', gred:'', peranan:'', status:'Aktif', password:'' };
            this.showModal = true;
        },

        openEditModal(u) {
            this.editMode = true;
            this.form = { ...u };
            this.showModal = true;
        },

        toggleStatus(u) {
            u.status = u.status === 'Aktif' ? 'Tidak Aktif' : 'Aktif';
        },

        saveUser() {
            if (this.editMode) {
                const idx = this.users.findIndex(u => u.id === this.form.id);
                if (idx > -1) this.users.splice(idx, 1, { ...this.form });
            } else {
                this.users.push({ ...this.form, id: Date.now(), logMasuk: '—' });
            }
            this.showModal = false;
        }
    }
}
</script>
@endsection
