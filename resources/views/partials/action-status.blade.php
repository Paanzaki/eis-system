@php
    $status = request('status');
    $statusMap = [
        'simpan' => ['title' => 'Rekod berjaya disimpan', 'body' => 'Maklumat telah direkodkan dalam sistem.', 'class' => 'border-emerald-200 bg-emerald-50 text-emerald-700'],
        'kemaskini' => ['title' => 'Rekod berjaya dikemaskini', 'body' => 'Perubahan maklumat telah direkodkan.', 'class' => 'border-blue-200 bg-blue-50 text-blue-700'],
        'cetak' => ['title' => 'Dokumen berjaya dijana', 'body' => 'Dokumen tersedia untuk cetakan atau semakan lanjut.', 'class' => 'border-green-200 bg-green-50 text-green-700'],
        'jana' => ['title' => 'Janaan berjaya diproses', 'body' => 'Fail atau laporan baharu telah disediakan.', 'class' => 'border-green-200 bg-green-50 text-green-700'],
        'hapus' => ['title' => 'Rekod ditanda untuk hapus', 'body' => 'Tindakan hapus telah direkodkan untuk semakan.', 'class' => 'border-red-200 bg-red-50 text-red-700'],
        'padam' => ['title' => 'Rekod berjaya dipadam', 'body' => 'Rekod telah dikeluarkan daripada senarai aktif.', 'class' => 'border-red-200 bg-red-50 text-red-700'],
        'draf' => ['title' => 'Draf berjaya disimpan', 'body' => 'Maklumat boleh disambung semula sebelum dihantar.', 'class' => 'border-amber-200 bg-amber-50 text-amber-700'],
        'tambah' => ['title' => 'Rekod baharu berjaya ditambah', 'body' => 'Item baharu telah dimasukkan ke dalam modul ini.', 'class' => 'border-indigo-200 bg-indigo-50 text-indigo-700'],
        'muat-turun' => ['title' => 'Muat turun tersedia', 'body' => 'Fail yang diminta sedia untuk dimuat turun.', 'class' => 'border-sky-200 bg-sky-50 text-sky-700'],
        'reset' => ['title' => 'Tetapan dipulihkan', 'body' => 'Nilai lalai sistem telah dipulihkan.', 'class' => 'border-slate-200 bg-slate-50 text-slate-700'],
        'aktif' => ['title' => 'Status berjaya diaktifkan', 'body' => 'Rekod ini kini aktif dalam sistem.', 'class' => 'border-emerald-200 bg-emerald-50 text-emerald-700'],
        'nyahaktif' => ['title' => 'Status berjaya dinyahaktifkan', 'body' => 'Rekod ini tidak lagi aktif dalam sistem.', 'class' => 'border-orange-200 bg-orange-50 text-orange-700'],
    ];
@endphp

<div
    x-data="actionStatusBanner(@js($statusMap), @js($status))"
    x-init="init()"
    x-show="show"
    x-transition
    x-cloak
    class="fixed top-24 right-8 z-[60] max-w-md"
>
    <div :class="banner.class" class="border shadow-lg rounded-[5px] px-5 py-4 flex items-start gap-3">
        <div class="w-8 h-8 rounded-[5px] bg-white/70 flex items-center justify-center flex-shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <div class="min-w-0">
            <p class="text-[11px] font-black uppercase tracking-widest" x-text="banner.title"></p>
            <p class="text-[11px] font-bold opacity-80 mt-1 leading-relaxed" x-text="banner.body"></p>
        </div>
        <button type="button" @click="show = false" class="ml-2 text-current opacity-50 hover:opacity-100">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="2.5" stroke-linecap="round"/></svg>
        </button>
    </div>
</div>

<script>
if (!window.actionStatusBanner) {
    window.actionStatusBanner = function(statusMap, initialStatus) {
        return {
            show: false,
            banner: {},
            timer: null,
            init() {
                const flash = initialStatus || sessionStorage.getItem('global_action_status');
                if (flash && statusMap[flash]) {
                    this.open(statusMap[flash]);
                    sessionStorage.removeItem('global_action_status');
                }

                window.addEventListener('action-status', (event) => {
                    const key = event.detail;
                    if (statusMap[key]) {
                        this.open(statusMap[key]);
                    }
                });
            },
            open(payload) {
                this.banner = payload;
                this.show = true;
                clearTimeout(this.timer);
                this.timer = setTimeout(() => this.show = false, 4500);
            }
        };
    };

    window.dispatchActionStatus = function(key) {
        sessionStorage.setItem('global_action_status', key);
        window.dispatchEvent(new CustomEvent('action-status', { detail: key }));
    };
}
</script>
