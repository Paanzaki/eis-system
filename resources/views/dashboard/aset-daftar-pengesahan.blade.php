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
                Semakan Muat Naik Aset
            </h3>
            <p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Kemaskini maklumat fail muat naik sebelum rekod disimpan</p>
        </div>
        <div class="flex items-center gap-4 bg-white p-5 rounded-[5px] shadow-sm border border-gray-100">
            <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest">Status: Draf Muat Naik</span>
        </div>
    </div>

    <form action="{{ route('aset.index') }}" method="GET" class="bg-white p-8 rounded-[5px] shadow-sm border border-gray-100 relative overflow-hidden">
        <input type="hidden" name="status" value="simpan">
        <div class="flex items-center justify-between gap-4 mb-8 pb-4 border-b border-gray-50">
            <div>
                <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Rekod Aset Dimuat Naik</h4>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Medan boleh dikemaskini sebelum simpan akhir</p>
            </div>
            <span class="badge badge-amber">Perlu Semakan</span>
        </div>

        <div class="space-y-8">
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

            {{-- Rujukan Fail --}}
            <section class="space-y-5">
                <h5 class="text-[11px] font-black text-slate-500 uppercase tracking-widest">Rujukan Fail Muat Naik</h5>
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-6 space-y-2">
                        <label class="label-heavy">Nama Fail Sumber</label>
                        <input type="text" value="aset_ict_ptj_mei_2026.xlsx" class="input-heavy input-fixed" readonly>
                    </div>
                    <div class="col-span-12 lg:col-span-6 space-y-2">
                        <label class="label-heavy">Tarikh Muat Naik</label>
                        <input type="text" value="13/05/2026 03:45 PM" class="input-heavy input-fixed" readonly>
                    </div>
                </div>
            </section>

            {{-- ===== SEKSYEN 1: MAKLUMAT ASAS ===== --}}
            <section class="space-y-5 border-t border-gray-100 pt-8">
                <h5 class="text-[11px] font-black text-slate-500 uppercase tracking-widest">Seksyen 1: Maklumat Asas</h5>
                <div class="grid grid-cols-12 gap-6">

                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Jenis Aset <span class="text-red-500">*</span></label>
                        <div class="select-wrap">
                            <select name="jenis_aset" class="input-heavy select-heavy cursor-pointer" required>
                                <option value="" disabled>-- Sila Pilih --</option>
                                <option value="Harta Modal" selected>Harta Modal (≥ RM2,000)</option>
                                <option value="Aset Bernilai Rendah">Aset Bernilai Rendah (< RM2,000)</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Kategori Aset <span class="text-red-500">*</span></label>
                        <div class="select-wrap">
                            <select name="kategori_aset" id="kategoriAset" class="input-heavy select-heavy cursor-pointer" required>
                                <option value="" disabled>-- Sila Pilih --</option>
                                <option value="PERALATAN DAN KELENGKAPAN ICT" selected>PERALATAN DAN KELENGKAPAN ICT</option>
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

                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Sub Kategori Aset <span class="text-red-500">*</span></label>
                        <div class="select-wrap">
                            <select name="sub_kategori_aset" id="subKategoriAset" class="input-heavy select-heavy cursor-pointer" required>
                                <option value="" disabled>-- Sila Pilih --</option>
                                {{-- Populated by JS on load based on kategori --}}
                            </select>
                        </div>
                    </div>

                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Nombor Siri Aset TPA <span class="text-red-500">*</span></label>
                        <input type="text" name="no_siri_aset" value="DL-M3-14-2026-0098" class="input-heavy" required>
                    </div>

                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">No. Siri Aset (iSPEKS)</label>
                        <input type="text" name="no_siri_ispeks" placeholder="Jika berkenaan" class="input-heavy input-optional">
                    </div>

                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Tarikh Perolehan <span class="text-red-500">*</span></label>
                        <input type="date" name="tarikh_perolehan" value="2026-05-12" class="input-heavy" required>
                    </div>

                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Tarikh Terima <span class="text-red-500">*</span></label>
                        <input type="date" name="tarikh_terima" value="2026-05-12" class="input-heavy" required>
                    </div>

                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Nilai Perolehan (RM) <span class="text-red-500">*</span></label>
                        <input type="number" name="nilai_perolehan" step="0.01" value="8500" class="input-heavy text-blue-600" required>
                    </div>

                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Nilai Semasa (Auto)</label>
                        <input type="text" value="Dikira oleh sistem" class="input-heavy input-fixed" readonly>
                    </div>

                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Tempoh Penggunaan (Auto)</label>
                        <input type="text" value="Dikira oleh sistem" class="input-heavy input-fixed" readonly>
                    </div>

                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Susut Nilai Tahunan (Auto)</label>
                        <input type="text" value="Dikira oleh sistem" class="input-heavy input-fixed" readonly>
                    </div>

                    
                </div>

                {{-- ===== BAHAGIAN KENDERAAN ===== --}}
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
                        <input type="text" name="bahagian_unit" value="Unit ICT PNS" class="input-heavy" required>
                    </div>
                    <div class="col-span-12 lg:col-span-3 space-y-2">
                        <label class="label-heavy">Blok <span class="text-red-500">*</span></label>
                        <input type="text" name="blok" value="Blok A" class="input-heavy" required>
                    </div>
                    <div class="col-span-12 lg:col-span-3 space-y-2">
                        <label class="label-heavy">Aras <span class="text-red-500">*</span></label>
                        <input type="text" name="aras" value="Aras 7" class="input-heavy" required>
                    </div>
                    <div class="col-span-12 lg:col-span-3 space-y-2">
                        <label class="label-heavy">Nama Ruang / Bilik <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_ruang" value="Bilik Server Mini" class="input-heavy" required>
                    </div>
                    <div class="col-span-12 lg:col-span-4 space-y-2">
                        <label class="label-heavy">Status Aset <span class="text-red-500">*</span></label>
                        <div class="select-wrap">
                            <select name="status_aset" class="input-heavy select-heavy cursor-pointer" required>
                                <option value="" disabled>-- Sila Pilih --</option>
                                <option value="A" selected>A — Sedang Digunakan</option>
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

            
        </div>

        <div class="flex justify-end gap-4 pt-10 mt-10 border-t border-gray-50">
            <a href="{{ route('aset.daftar') }}" class="px-8 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest text-slate-400 hover:bg-gray-50 transition-all border border-gray-200">
                Kembali / Muat Naik Semula
            </a>
            <button type="submit" class="bg-[#1E3A8A] hover:bg-red-700 text-white px-8 py-3 rounded-[5px] text-[10px] font-black uppercase tracking-widest shadow-lg transition-all">
                Simpan Rekod Aset
            </button>
        </div>
    </form>

</div>

{{-- ===== JAVASCRIPT: DROPDOWN DINAMIK & PRE-POPULATE ===== --}}
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

// Nilai pre-populate dari fail muat naik (diisi oleh backend dalam konteks sebenar)
const preloadKategori = "PERALATAN DAN KELENGKAPAN ICT";
const preloadSubKategori = "KOMPUTER";

const kategoriSelect = document.getElementById('kategoriAset');
const subKategoriSelect = document.getElementById('subKategoriAset');
const seksyenKenderaan = document.getElementById('seksyenKenderaan');

function populateSubKategori(kategori, selectedSub) {
    subKategoriSelect.innerHTML = '<option value="" disabled>-- Sila Pilih --</option>';
    subKategoriSelect.disabled = true;

    if (kategori && subKategoriData[kategori]) {
        subKategoriData[kategori].forEach(function (sub) {
            const opt = document.createElement('option');
            opt.value = sub;
            opt.textContent = sub;
            if (sub === selectedSub) opt.selected = true;
            subKategoriSelect.appendChild(opt);
        });
        subKategoriSelect.disabled = false;
    }

    if (kategori === 'KENDERAAN') {
        seksyenKenderaan.classList.remove('hidden');
    } else {
        seksyenKenderaan.classList.add('hidden');
    }
}

// Pre-populate sub kategori berdasarkan data dari fail muat naik
populateSubKategori(preloadKategori, preloadSubKategori);

// Handle perubahan kategori oleh pengguna
kategoriSelect.addEventListener('change', function () {
    populateSubKategori(this.value, null);
});
</script>

@endsection