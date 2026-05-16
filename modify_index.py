import re

with open('resources/views/dashboard/index.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Replace Title
content = content.replace(
    '<h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">\n                Executive <span class="text-blue-600">Overview<span class="text-yellow-400">.</span></span>\n            </h3>',
    '<h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">\n                Executive Overview\n            </h3>'
)

# 2. Replace border radius classes
content = re.sub(r'rounded-\[3rem\]', 'rounded-md', content)
content = re.sub(r'rounded-\[2\.5rem\]', 'rounded-md', content)
content = re.sub(r'rounded-\[1\.5rem\]', 'rounded-md', content)
content = re.sub(r'rounded-2xl', 'rounded-md', content)

# 3. AI Insight Card removal
# It starts at: {{-- AI Insight Card --}} and ends before {{-- ── Row 3
insight_pattern = r'\{\{-- AI Insight Card --\}\}.*?</div>\s*</div>\s*(?=\{\{-- ── Row 3)'
content = re.sub(insight_pattern, '', content, flags=re.DOTALL)

# Adjust Bar Chart col-span
content = content.replace(
    '<div class="col-span-12 lg:col-span-9 bg-white p-10 rounded-md border border-gray-100 shadow-sm">',
    '<div class="col-span-12 bg-white p-10 rounded-md border border-gray-100 shadow-sm">'
)

# 4. Agihan Peruntukan to Analisis Perolehan
content = content.replace('Agihan Peruntukan 2026', 'Analisis Perolehan 2026')

# 5. Remove Listings and add Trend Penyelenggaraan graph
# Start at {{-- ── Perolehan: Senarai Kontrak Aktif ── --}}
# End at the end of the Live Activity stream, just before <script src=...
listings_pattern = r'\{\{-- ── Perolehan: Senarai Kontrak Aktif ── --\}\}.*?(?=</div>\s*<script src="https://cdn\.jsdelivr\.net/npm/chart\.js">)'
new_graph = '''{{-- ── Trend Penyelenggaraan Aset ── --}}
    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 bg-white p-10 rounded-md border border-gray-100 shadow-sm">
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h4 class="text-[12px] font-black text-[#1E3A8A] uppercase tracking-widest">Trend Penyelenggaraan Aset Tahunan</h4>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Keseluruhan PTJ & Jabatan</p>
                </div>
            </div>
            <div style="position:relative; height:300px;">
                <canvas id="maintenanceTrendChart" role="img" aria-label="Line chart showing maintenance trends for 2026."></canvas>
            </div>
        </div>
    </div>
'''
content = re.sub(listings_pattern, new_graph, content, flags=re.DOTALL)

# 6. Add the script for the new chart, right before end of DOMContentLoaded
chart_script = '''
    // ── Trend Penyelenggaraan Aset ──
    const maintLabels = ['JAN', 'FEB', 'MAC', 'APR', 'MEI', 'JUN'];
    const maintData = [45, 52, 38, 60, 48, 70];

    new Chart(document.getElementById('maintenanceTrendChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: maintLabels,
            datasets: [{
                label: 'Permintaan Penyelenggaraan',
                data: maintData,
                borderColor: '#E11D48',
                backgroundColor: 'rgba(225,29,72,0.06)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#E11D48',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1E3A8A',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 8,
                    callbacks: { label: ctx => ' ' + ctx.dataset.label + ': ' + ctx.parsed.y + ' Kes' }
                }
            },
            scales: {
                x: { grid: { display: false }, ticks: { color: '#94A3B8', font: { size: 11, weight: '800' } } },
                y: { grid: { color: 'rgba(0,0,0,0.04)' }, ticks: { color: '#94A3B8', font: { size: 11 } } }
            }
        }
    });
});
'''
content = content.replace('});\n});', chart_script)

# 7. Remove contracts, aset, audit from datasets block in script
# We can just remove the whole export section for these
# Actually it's simpler to just replace exportAllExcel() list
content = content.replace("['trend', 'category', 'district', 'allocation', 'contracts', 'aset', 'audit']", "['trend', 'category', 'district', 'allocation']")

with open('resources/views/dashboard/index.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
