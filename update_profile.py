with open('resources/views/profile/edit.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Remove "Pengurusan Akaun & Sekuriti Digital MyDigitalID"
content = content.replace(
    '<p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Pengurusan Akaun & Sekuriti Digital MyDigitalID</p>',
    '<p class="text-[12px] font-black text-slate-400 uppercase tracking-[0.4em] mt-3">Sistem Maklumat Peribadi & Akses</p>'
)

# 2. Remove "Software Intern @ kodewave sdn bhd"
content = content.replace(
    '<p class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] mt-3 ">Software Intern @ kodewave sdn bhd</p>',
    ''
)

# 3. Remove MyDigitalID Status from the first column
old_mydigitalid = """                        <div class="flex items-center justify-between p-5 bg-green-50 rounded-2xl border border-green-100">
                            <span class="text-[10px] font-black text-green-700 uppercase ">MyDigitalID Status</span>
                            <span class="px-4 py-1.5 bg-white rounded-lg text-[9px] font-black text-green-600 shadow-sm uppercase">Verified</span>
                        </div>"""
content = content.replace(old_mydigitalid, '')

# 4. Replace Nyahaktif Akaun with MyDigitalID Status
old_nyahaktif = """                    <div class="flex items-center justify-between p-8 bg-red-50 rounded-[2rem] border border-red-100 group">
                        <div class="space-y-1">
                            <p class="text-[11px] font-black text-red-600 uppercase tracking-tighter ">Nyahaktif Akaun</p>
                            <p class="text-[9px] font-bold text-red-400 uppercase">Akses akan dipadam serta-merta</p>
                        </div>
                        <button class="px-6 py-3 bg-white border-2 border-red-200 rounded-xl text-[10px] font-black uppercase text-red-600 hover:bg-red-600 hover:text-white transition-all shadow-sm">Padam</button>
                    </div>"""
new_mydigitalid_block = """                    <div class="flex items-center justify-between p-8 bg-green-50 rounded-[2rem] border border-green-100 group">
                        <div class="space-y-1">
                            <p class="text-[11px] font-black text-green-700 uppercase tracking-tighter ">MyDigitalID Status</p>
                            <p class="text-[9px] font-bold text-green-600 uppercase">Akaun telah disahkan & selamat</p>
                        </div>
                        <span class="px-6 py-3 bg-white border-2 border-green-200 rounded-xl text-[10px] font-black uppercase text-green-600 shadow-sm">Verified</span>
                    </div>"""
content = content.replace(old_nyahaktif, new_mydigitalid_block)

# 5. Add Nombor Kakitangan and modify Jabatan
old_jabatan = """                    <div class="col-span-2 lg:col-span-1 space-y-2">
                        <label class="label-heavy">Jabatan / Agensi</label>
                        <input type="text" value="Pegawai Teknologi Maklumat" class="input-heavy" readonly>
                    </div>"""
new_fields = """                    <div class="col-span-2 lg:col-span-1 space-y-2">
                        <label class="label-heavy">Nombor Kakitangan</label>
                        <input type="text" value="PNS-2023-010" class="input-heavy">
                    </div>
                    <div class="col-span-2 lg:col-span-1 space-y-2">
                        <label class="label-heavy">Jabatan / Agensi</label>
                        <select class="input-heavy cursor-pointer">
                            <option>Unit ICT PNS</option>
                            <option>Jabatan Kewangan</option>
                            <option>Jabatan Audit Selangor</option>
                            <option>Pejabat SUK Selangor</option>
                        </select>
                    </div>"""
content = content.replace(old_jabatan, new_fields)

with open('resources/views/profile/edit.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
