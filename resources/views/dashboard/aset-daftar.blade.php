@extends('layouts.dashboard')

@section('content')

<div class="content-fluid space-y-8 pb-12">

    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 border-b border-gray-100 pb-10">
        <div>
            <div class="flex items-center gap-2 mb-3">
                <div class="h-2 w-16 bg-red-600 rounded-full"></div>
                <div class="h-2 w-8 bg-yellow-400 rounded-full"></div>
            </div>
            <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">
                Pendaftaran Aset Baru
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Pendaftaran Dan Penempatan Aset</p>
        </div>
        <div class="flex items-center gap-4 bg-white p-5 rounded-[5px] shadow-sm border border-gray-100">
            <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest">ID Transaksi: REG-2026-{{ rand(1000,9999) }}</span>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[5px] shadow-sm border border-gray-100 relative overflow-hidden">
        <div class="flex items-center gap-4 mb-8 pb-4 border-b border-gray-50">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">1. Muat Naik Pukal (CSV/Excel)</h4>
        </div>

        <form action="{{ route('aset.daftar.pengesahan') }}" method="GET" class="mb-12">
            <div class="border-2 border-dashed border-gray-200 rounded-[5px] p-8 text-center hover:bg-gray-50 transition-all cursor-pointer">
                <svg class="w-8 h-8 mx-auto text-slate-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                <p class="text-[12px] font-bold text-slate-600">Klik untuk muat naik fail CSV atau Excel</p>
                <p class="text-[10px] text-slate-400 mt-1">Sokongan format: .csv, .xls, .xlsx</p>
                <input type="file" class="hidden" id="fileUpload">
            </div>
            <div class="mt-4 flex justify-end">
                <button type="submit" class="bg-[#1E3A8A] hover:bg-red-700 text-white px-8 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                    Muat Naik & Semak
                </button>
            </div>
        </form>

        <div class="flex items-center gap-4 mb-8 pb-4 border-b border-gray-50">
            <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">2. Kemasukan Manual Terperinci</h4>
        </div>

        <form action="{{ route('aset.index') }}" method="GET" class="space-y-8">
            <input type="hidden" name="status" value="simpan">
            <div class="flex flex-wrap items-center gap-2 rounded-[5px] bg-slate-50 border border-slate-100 px-3 py-2">
                <div class="flex items-center gap-2 text-[9px] font-black uppercase tracking-widest text-slate-500">
                    <span class="h-3 w-3 rounded-[3px] bg-white border border-slate-200"></span>
                    Editable
                </div>
                <div class="flex items-center gap-2 text-[9px] font-black uppercase tracking-widest text-amber-700">
                    <span class="h-3 w-3 rounded-[3px] bg-[#FFFDF5] border border-amber-200"></span>
                    Jika Berkenaan
                </div>
                <div class="flex items-center gap-2 text-[9px] font-black uppercase tracking-widest text-slate-500">
                    <span class="h-3 w-3 rounded-[3px] bg-slate-200 border border-slate-300"></span>
                    Fixed
                </div>
            </div>

            {{-- ===== SEKSYEN 1: MAKLUMAT ASAS ===== --}}
            <section class="space-y-5">
                <h5 class="text-[11px] font-black text-slate-500 uppercase tracking-widest">Seksyen 1: Maklumat Asas</h5>
                <div class="grid grid-cols-12 gap-6">

                    {{-- Jenis Aset (Auto-klasifikasi oleh sistem berdasarkan nilai - boleh letak as display sahaja) --}}
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Jenis Aset <span class="text-red-500">*</span></label>
                        <div class="select-wrap">
                            <select name="jenis_aset" class="input-heavy select-heavy cursor-pointer" required>
                                <option value="" selected disabled>-- Sila Pilih --</option>
                                <option value="Harta Modal">Harta Modal (≥ RM2,000)</option>
                                <option value="Aset Bernilai Rendah">Aset Bernilai Rendah (< RM2,000)</option>
                            </select>
                        </div>
                    </div>

                    {{-- Kategori Aset --}}
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Kategori Aset <span class="text-red-500">*</span></label>
                        <div class="select-wrap">
                            <select name="kategori_aset" id="kategoriAset" class="input-heavy select-heavy cursor-pointer" required>
                                <option value="" selected disabled>-- Sila Pilih --</option>
                                <option value="PERALATAN DAN KELENGKAPAN ICT">PERALATAN DAN KELENGKAPAN ICT</option>
                                <option value="PERALATAN DAN KELENGKAPAN PEJABAT">PERALATAN DAN KELENGKAPAN PEJABAT</option>
                                <option value="PERALATAN DAN KELENGKAPAN DAPUR">PERALATAN DAN KELENGKAPAN DAPUR</option>
                                <option value="PERALATAN DAN KELENGKAPAN MAKMAL">PERALATAN DAN KELENGKAPAN MAKMAL</option>
                                <option value="PERALATAN DAN KELENGKAPAN TELEKOMUNIKASI">PERALATAN DAN KELENGKAPAN TELEKOMUNIKASI</option>
                                <option value="PERALATAN DAN KELENGKAPAN PENYIARAN & MUZIK">PERALATAN DAN KELENGKAPAN PENYIARAN & MUZIK</option>
                                <option value="PERALATAN DAN KELENGKAPAN KESELAMATAN">PERALATAN DAN KELENGKAPAN KESELAMATAN</option>
                                <option value="PERALATAN DAN KELENGKAPAN BENGKEL / KEJURUTERAAN">PERALATAN DAN KELENGKAPAN BENGKEL / KEJURUTERAAN</option>
                                <option value="PERALATAN DAN KELENGKAPAN ALAM SEKITAR">PERALATAN DAN KELENGKAPAN ALAM SEKITAR</option>
                                <option value="PERALATAN DAN KELENGKAPAN PERUBATAN">PERALATAN DAN KELENGKAPAN PERUBATAN</option>
                                <option value="PERALATAN DAN KELENGKAPAN SUKAN / REKREASI">PERALATAN DAN KELENGKAPAN SUKAN / REKREASI</option>
                                <option value="PERALATAN DAN KELENGKAPAN PERTANIAN / PERHUTANAN / MARIN">PERALATAN DAN KELENGKAPAN PERTANIAN / PERHUTANAN / MARIN</option>
                                <option value="KENDERAAN">KENDERAAN</option>
                                <option value="LOJI / JENTERA">LOJI / JENTERA</option>
                                <option value="PERABOT">PERABOT</option>
                                <option value="HIASAN / LANGSIR / HAMPARAN">HIASAN / LANGSIR / HAMPARAN</option>
                                <option value="ASET ALIH (PAJAKAN)">ASET ALIH (PAJAKAN)</option>
                            </select>
                        </div>
                    </div>

                    {{-- Sub Kategori Aset (dropdown dinamik) --}}
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Sub Kategori Aset <span class="text-red-500">*</span></label>
                        <div class="select-wrap">
                            <select name="sub_kategori_aset" id="subKategoriAset" class="input-heavy select-heavy cursor-pointer" required disabled>
                                <option value="" selected disabled>-- Pilih Kategori Dahulu --</option>
                            </select>
                        </div>
                    </div>

                    {{-- No. Siri Aset --}}
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Nombor Siri Aset TPA <span class="text-red-500">*</span></label>
                        <input type="text" name="no_siri_aset" placeholder="Kunci masuk nombor siri aset TPA" class="input-heavy" required>
                    </div>

                    {{-- No. Siri Aset (iSPEKS) --}}
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">No. Siri Aset (iSPEKS)</label>
                        <input type="text" name="no_siri_ispeks" placeholder="Jika berkenaan" class="input-heavy input-optional">
                    </div>

                    

                    {{-- Tarikh Perolehan --}}
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Tarikh Perolehan <span class="text-red-500">*</span></label>
                        <input type="date" name="tarikh_perolehan" class="input-heavy" required>
                    </div>

                    {{-- Tarikh Terima --}}
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Tarikh Terima <span class="text-red-500">*</span></label>
                        <input type="date" name="tarikh_terima" class="input-heavy" required>
                    </div>

                    {{-- Nilai Perolehan --}}
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Nilai Perolehan (RM) <span class="text-red-500">*</span></label>
                        <input type="number" name="nilai_perolehan" step="0.01" placeholder="0.00" class="input-heavy text-blue-600" required>
                    </div>

                    {{-- Nilai Semasa (Auto) --}}
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Nilai Semasa (Auto)</label>
                        <input type="text" value="Dikira oleh sistem" class="input-heavy input-fixed" readonly>
                    </div>

                    {{-- Tempoh Penggunaan (Auto) --}}
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Tempoh Penggunaan (Auto)</label>
                        <input type="text" value="Dikira oleh sistem" class="input-heavy input-fixed" readonly>
                    </div>

                    {{-- Susut Nilai Tahunan (Auto) --}}
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Susut Nilai Tahunan (Auto)</label>
                        <input type="text" value="Dikira oleh sistem" class="input-heavy input-fixed" readonly>
                    </div>

                    
                </div>

                {{-- ===== BAHAGIAN KENDERAAN (Papar hanya jika kategori = KENDERAAN) ===== --}}
                <div id="seksyenKenderaan" class="hidden mt-6 p-5 rounded-[5px] bg-amber-50 border border-amber-200 space-y-5">
                    <p class="text-[10px] font-black text-amber-700 uppercase tracking-widest">Maklumat Tambahan Kenderaan</p>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 lg:col-span-4 space-y-2">
                            <label class="label-heavy">Jenis / Model Kenderaan</label>
                            <input type="text" name="model_kenderaan" placeholder="Contoh: Toyota Hilux 2.4G" class="input-heavy input-optional">
                        </div>
                        <div class="col-span-12 lg:col-span-4 space-y-2">
                            <label class="label-heavy">Tahun Dibuat</label>
                            <input type="number" name="tahun_dibuat" placeholder="Contoh: 2022" min="1900" max="2099" class="input-heavy input-optional">
                        </div>
                        <div class="col-span-12 lg:col-span-4 space-y-2">
                            <label class="label-heavy">Kos Pembaikian Semasa (RM)</label>
                            <input type="number" name="kos_pembaikian" step="0.01" placeholder="0.00" class="input-heavy input-optional">
                        </div>
                        
                        <div class="col-span-12 lg:col-span-4 space-y-2">
                            <label class="label-heavy">Nombor Pendaftaran Kenderaan</label>
                            <input type="text" name="no_pendaftaran" placeholder="Contoh: WXX 1234" class="input-heavy input-optional">
                        </div>
                        <div class="col-span-12 lg:col-span-4 space-y-2">
                            <label class="label-heavy">Nombor Enjin</label>
                            <input type="text" name="no_enjin" placeholder="Nombor enjin kenderaan" class="input-heavy input-optional">
                        </div>
                        <div class="col-span-12 lg:col-span-4 space-y-2">
                            <label class="label-heavy">Nombor Casis</label>
                            <input type="text" name="no_casis" placeholder="Nombor casis kenderaan" class="input-heavy input-optional">
                        </div>
                    </div>
                </div>
            </section>

            {{-- ===== SEKSYEN 2: PENEMPATAN ASET ===== --}}
            <section class="space-y-5 border-t border-gray-100 pt-8">
                <h5 class="text-[11px] font-black text-slate-500 uppercase tracking-widest">Seksyen 2: Penempatan Aset</h5>
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-3 space-y-2">
                        <label class="label-heavy">Bahagian / Unit <span class="text-red-500">*</span></label>
                        <input type="text" name="bahagian_unit" placeholder="Nama bahagian atau unit" class="input-heavy" required>
                    </div>
                    <div class="col-span-12 lg:col-span-3 space-y-2">
                        <label class="label-heavy">Blok <span class="text-red-500">*</span></label>
                        <input type="text" name="blok" placeholder="Contoh: Blok A" class="input-heavy" required>
                    </div>
                    <div class="col-span-12 lg:col-span-3 space-y-2">
                        <label class="label-heavy">Aras <span class="text-red-500">*</span></label>
                        <input type="text" name="aras" placeholder="Contoh: Aras 2" class="input-heavy" required>
                    </div>
                    <div class="col-span-12 lg:col-span-3 space-y-2">
                        <label class="label-heavy">Nama Ruang / Bilik <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_ruang" placeholder="Contoh: Bilik Mesyuarat" class="input-heavy" required>
                    </div>
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Status Aset <span class="text-red-500">*</span></label>
                        <div class="select-wrap">
                            <select name="status_aset" class="input-heavy select-heavy cursor-pointer" required>
                                <option value="" selected disabled>-- Sila Pilih --</option>
                                <option value="A">A — Sedang Digunakan</option>
                                <option value="B">B — Tidak Digunakan</option>
                                <option value="C">C — Rosak</option>
                                <option value="D">D — Sedang Diselenggara</option>
                                <option value="E">E — Pinjaman</option>
                                <option value="F">F — Hilang</option>
                                <option value="G">G — Lain-lain Penemuan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            

            

            <div class="flex justify-end gap-4 pt-10 border-t border-gray-50">
                <a href="{{ route('aset.index', ['status' => 'draf']) }}" class="px-8 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest text-slate-400 hover:bg-gray-50 transition-all border border-gray-200">
                    Simpan Draf
                </a>
                <button type="submit" class="bg-[#1E3A8A] hover:bg-red-700 text-white px-8 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                    Simpan Rekod Aset
                </button>
            </div>
        </form>
    </div>

    <div class="bg-blue-50/50 p-6 rounded-[5px] border border-blue-100 flex items-center gap-4">
        <div class="w-10 h-10 bg-white rounded-[5px] shadow-sm flex items-center justify-center text-blue-600 flex-shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2.5"/></svg>
        </div>
        <p class="text-[10px] font-bold text-slate-500 leading-relaxed">
            Nombor Siri Aset perlu dikunci masuk oleh Pegawai Aset PTJ. Sistem hanya mengira Susut Nilai Tahunan dan Nilai Semasa berdasarkan parameter Modul Tetapan.
        </p>
    </div>
</div>

{{-- ===== JAVASCRIPT: DROPDOWN DINAMIK ===== --}}
<script>
const subKategoriData = {
    "PERALATAN DAN KELENGKAPAN ICT": [
        "PELAYAN (SERVER)", "KOMPUTER", "PERALATAN RANGKAIAN", "PDA / PALMTOP",
        "PENCETAK (PRINTER)", "PERALATAN STORAN", "PENGIMBAS (SCANNER)",
        "PERISIAN / SISTEM MAYA (ASET TAK KETARA)", "PERANTI KOMPUTER", "RAK PERALATAN ICT",
        "KIT PEMBELAJARAN", "PERALATAN SANITASI DATA", "PERALATAN MENGUJI / FABRIC TESTER",
        "PERALATAN ACARA RASMI", "PERALATAN BANTUAN MENGAJAR", "KONTENA KHEMAH PEJABAT", "PERALATAN AM"
    ],
    "PERALATAN DAN KELENGKAPAN PEJABAT": [
        "MESIN PEJABAT", "PERALATAN PEJABAT", "PERALATAN PANDANG DENGAR", "PERALATAN PAMERAN",
        "PERALATAN PERCETAKAN", "PERALATAN FOTOGRAFI", "TEMPAT STORAN", "PERALATAN PENYAMAN UDARA",
        "PAPAN KENYATAAN / TULIS", "PETI", "BUKU RUJUKAN BERCETAK", "PERALATAN SANITARI",
        "PERALATAN MENGUJI / FABRIC TESTER", "PERALATAN ACARA RASMI", "PERALATAN BANTUAN MENGAJAR",
        "KONTENA KHEMAH PEJABAT", "PERALATAN AM"
    ],
    "PERALATAN DAN KELENGKAPAN DAPUR": [
        "DAPUR STOVES", "BEKAS MEMASAK COOKINGWARE", "PERKAKAS ELEKTRIK DAPUR",
        "PISAU DAPUR / KITCHEN KNIVES", "ALATAN DAPUR / KITCHEN UTENSIL", "PERABOT DAPUR",
        "SET PINGGAN MANGKUK", "BEKAS MINUM / DRINK WARE / MAKANAN", "SET HIDANGAN",
        "KUTLERI (STOK)", "TEMPAT PENYIMPANAN"
    ],
    "PERALATAN DAN KELENGKAPAN MAKMAL": [
        "PERALATAN PEMANAS (HEATING INST)", "OVEN MAKMAL (LAB. OVEN)", "AUTOKLAF (AUTOCLAVE)",
        "RELAU (FURNACE)", "EMPARAN (CENTRIFUGE)", "PERALATAN PENYEJUKAN",
        "PENGGAUL / PEMOTONG / PENGISAR", "PENGGONCANG / PENGACAU / HOMOGENIZER",
        "PERALATAN MEREKOD", "BEKALAN KUASA", "PERALATAN MENCUCI", "PAM MAKMAL",
        "PERALATAN MENGUKUR", "PERALATAN PENYELIDIKAN DAN PENGUJIAN",
        "PERALATAN PENYELIDIKAN NUKLEAR", "KABINET / MEJA KERJA MAKMAL", "RAK KHAS / ALAT PENYIMPANAN",
        "RADAS / KELENGKAPAN MAKMAL", "PERALATAN PENYELIDIKAN SAINS ANGKASA",
        "KIT PEMBELAJARAN MAKMAL", "CHAMBER", "WRAPPER", "PERALATAN MAKMAL / PENYELIDIKAN",
        "PERALATAN PERLINDUNGAN DIRI", "PERALATAN DAN KELENGKAPAN MAKMAL FORENSIK",
        "BACTERIA INCINERATOR", "PERALATAN PEMERIKSAAN KUALITI"
    ],
    "PERALATAN DAN KELENGKAPAN TELEKOMUNIKASI": [
        "TELEFON", "AKSESORI TELEFON", "WALKIE TALKIE", "INTERCOM", "RADIO KOMUNIKASI",
        "ALAT KOMUNIKASI", "SISTEM VSAT", "PERALATAN AM", "PENSTRIMAN (STREAMING)"
    ],
    "PERALATAN DAN KELENGKAPAN PENYIARAN & MUZIK": [
        "ALAT PEMANCAR", "ALAT PENGESAN / PENGUJIAN SIARAN", "ALAT SIAR AUDIO", "ALAT SIAR VIDEO",
        "KELENGKAPAN STUDIO", "ALAT MUZIK TIUP (WIND INSTRUMENT)", "ALAT MUZIK TALI (STRING)",
        "ALAT MUZIK PERKUSI (PERCUSSION)", "ALAT MUZIK KEKUNCI (KEYBOARD)", "SISTEM SATELIT", "PERALATAN FALAK"
    ],
    "PERALATAN DAN KELENGKAPAN KESELAMATAN": [
        "KAWALAN KESELAMATAN FIZIKAL", "KAWALAN KEBAKARAN", "SENJATA PERTAHANAN",
        "KAWALAN KESELAMATAN NUKLEAR", "PERALATAN PERLINDUNGAN DIRI (PPE)",
        "PERALATAN PENYELAMAT DARAT", "PERALATAN PENYELAMAT AIR", "PERALATAN PENGESAN",
        "PERALATAN KESELAMATAN HAZMAT", "KENDERAAN KESELAMATAN", "PERALATAN RISIKAN",
        "PERALATAN KESELAMATAN PENYELIDIKAN ANGKASA", "KELENGKAPAN KESELAMATAN",
        "PERALATAN PEMUSNAHAN BOM", "PERALATAN OPERASI", "NON-LETHAL WEAPON",
        "PERALATAN PENYELAMAT UDARA", "PERALATAN KESELAMATAN C.B.R.N.E"
    ],
    "PERALATAN DAN KELENGKAPAN BENGKEL / KEJURUTERAAN": [
        "MESIN / PERALATAN MEKANIKAL DAN LOGAM", "MESIN PERALATAN ELEKTRIK / ELEKTRONIK",
        "MESIN / PERALATAN KAYU DAN ROTAN", "PERALATAN KENDALIAN MEKANIKAL", "ALAT TANGAN BENGKEL",
        "MEJA KERJA", "PERALATAN KETUKANGAN BATIK", "PERALATAN KETUKANGAN TENUN",
        "PERALATAN KETUKANGAN TEMBIKAR / SERAMIK", "SET KIT PEMBELAJARAN DAN PENGUJIAN",
        "PERALATAN BENGKEL AUTOMOTIF", "PERALATAN BENGKEL KIMPALAN / FOUNDRI",
        "PERALATAN BENGKEL MARIN", "PERALATAN BENGKEL ELEKTRONIK / ELEKTRIK",
        "PERALATAN BENGKEL TERAPI DAN KECANTIKAN", "PERALATAN BENGKEL HOSPITALITI",
        "PERALATAN BENGKEL JAHITAN", "MESIN / PERALATAN KERJA BINAAN BANGUNAN",
        "KEJURUTERAAN ROBOTICS", "PERALATAN KETUKANGAN PENCELUPAN DAN PERCETAKAN",
        "PERALATAN KENDALIAN BENGKEL", "MESIN / PERALATAN PENGELUARAN MAKANAN",
        "PERALATAN BENGKEL MEKANIKAL PERKAKASAN"
    ],
    "PERALATAN DAN KELENGKAPAN ALAM SEKITAR": [
        "PERALATAN KAJI UDARA", "PERALATAN KAJI AIR", "PERALATAN KAJI BUNYI",
        "PERALATAN KELENGKAPAN MARITIM", "PERALATAN KAJIBUMI", "PERALATAN KAJI ASTRONOMI",
        "PERALATAN KIT PEMBELAJARAN", "PERALATAN METEOROLOGI", "PERALATAN SOLAR"
    ],
    "PERALATAN DAN KELENGKAPAN PERUBATAN": [
        "PERALATAN DIAGNOSIS", "PERALATAN RAWATAN", "PERALATAN PEMBEDAHAN",
        "PERALATAN TERAPI PEMULIHAN DAN CARA KERJA", "PERALATAN KARDIOLOGY",
        "PERALATAN RAWATAN PERGIGIAN", "PERALATAN ANALISA PERUBATAN",
        "KELENGKAPAN HOSPITAL / KLINIK", "PERKAKASAN HOSPITAL / KLINIK (UTENSIL)",
        "KIT DAN ALAT PEMBELAJARAN / PAMERAN PERUBATAN", "PERALATAN BUKAN PERUBATAN",
        "PERALATAN RAWATAN KANSER", "PERALATAN FISIOTERAPI", "INSEKTARIUM DAN MAKMAL SERANGGA",
        "PERALATAN PENYEMBURAN DENGGI", "PERALATAN PENYELIDIKAN DAN PENGUJIAN"
    ],
    "PERALATAN DAN KELENGKAPAN SUKAN / REKREASI": [
        "KELENGKAPAN GIMNASIUM", "SUKAN MEMANAH", "BADMINTIN / SQUARSH / TENNIS",
        "BOLA KERANJANG / BOLA JARING", "BOWLING", "BOLA SEPAK / FUTSAL",
        "SUKAN MENDAKI / X GAMES", "SUKAN KRIKET", "LUMBA BASIKAL", "SKY DIVING",
        "SUKAN PEDANG (FENCING)", "HOKI", "GOLF", "RUGBY", "SEPAK TAKRAW / BOLA TAMPAR",
        "SUKAN BERKUDA", "TINJU / GUSTI / PERTAHANAN DIRI", "SUKAN PADANG DAN BALAPAN",
        "SUKAN AIR", "PERKHEMAHAN / PENGEMBARAAN", "MEMANCING", "PEMBURUAN (HUNTING)",
        "PAINTBALL", "KELENGKAPAN PADANG MAINAN", "INDOOR GAME", "PERLUMBAAN KERETA",
        "SUKAN GIMNASTIK", "SUKAN TENIS", "SUKAN PENDIDIKAN JASMANI", "PANDU ARAH",
        "BOLA BALING / HANDBALL"
    ],
    "PERALATAN DAN KELENGKAPAN PERTANIAN / PERHUTANAN / MARIN": [
        "MESIN PERTANIAN / PERHUTANAN", "KELENGKAPAN PERTANIAN / PERHUTANAN",
        "PERANGKAP HAIWAN", "SANGKAR", "PERALATAN MARIN", "PERALATAN PERTANIAN",
        "PERALATAN PERIKANAN", "PERALATAN VETERINAR", "PAGAR", "PERALATAN PEMBERSIH"
    ],
    "KENDERAAN": [
        "KERETA", "BAS", "MOTOSIKAL", "LORI / TRAK", "KENDERAAN AIR", "PESAWAT",
        "TIDAK BERMOTOR", "ALATAN KENDERAAN ELEKTRIK", "KENDERAAN KHAS BOMBA",
        "KENDERAAN MARIN BOMBA", "KENDERAAN UDARA BOMBA"
    ],
    "LOJI / JENTERA": [
        "LOJI KUASA ELEKTRIK", "SISTEM PENYAMAN UDARA", "LOJI NUKLEAR (ASET TAK ALIH)",
        "LOJI SISA (ASET TAK ALIH)", "LOJI AIR (ASET TAK ALIH)", "BILIK SEJUK",
        "LOJI KEJURUTERAAN", "JENTERA PERTANIAN", "JENTERA BOMBA",
        "JENTERA KERJA AWAM", "JENTERA PERTAHANAN", "JENTERA ANGKUT"
    ],
    "PERABOT": [
        "MEJA", "KERUSI", "ALMARI", "KABINET", "SOFA / SETTEE", "RAK",
        "PERABOT MODULAR", "KELENGKAPAN TIDUR", "KELENGKAPAN BILIK", "KIOSK"
    ],
    "HIASAN / LANGSIR / HAMPARAN": [
        "HIASAN DINDING", "HIASAN SILING", "HIASAN LANGSIR", "HAMPARAN",
        "AKSESORI HIASAN", "HIASAN TAMAN", "HIASAN EMAS"
    ],
    "ASET ALIH (PAJAKAN)": [
        "PERABUT DAN PERALATAN HOSPITAL (PAJAKAN)"
    ]
};

const kategoriSelect = document.getElementById('kategoriAset');
const subKategoriSelect = document.getElementById('subKategoriAset');
const seksyenKenderaan = document.getElementById('seksyenKenderaan');

kategoriSelect.addEventListener('change', function () {
    const selected = this.value;

    // Update sub kategori dropdown
    subKategoriSelect.innerHTML = '<option value="" selected disabled>-- Sila Pilih --</option>';
    subKategoriSelect.disabled = true;

    if (selected && subKategoriData[selected]) {
        subKategoriData[selected].forEach(function (sub) {
            const opt = document.createElement('option');
            opt.value = sub;
            opt.textContent = sub;
            subKategoriSelect.appendChild(opt);
        });
        subKategoriSelect.disabled = false;
    }

    // Tunjuk / sembunyi bahagian kenderaan
    if (selected === 'KENDERAAN') {
        seksyenKenderaan.classList.remove('hidden');
    } else {
        seksyenKenderaan.classList.add('hidden');
    }
});
</script>

@endsection