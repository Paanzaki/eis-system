<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-sm text-[#2C2C2C] leading-tight tracking-widest uppercase">
            Executive Information System <span class="text-[#FEB05D]">/</span> Dashboard
        </h2>
    </x-slot>

    <div class="py-1 min-h-screen bg-[#F8F9FA]">
        <div class="max-w-[98%] mx-auto sm:px-4 lg:px-6 space-y-4">

            {{-- KPI Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <div class="kpi-card relative overflow-hidden rounded-2xl p-5 bg-white shadow-sm border border-gray-200 border-l-4 border-l-[#FEB05D]">
                    <p class="text-[10px] font-bold tracking-widest uppercase mb-2 text-gray-500">Total Assets</p>
                    <h3 class="text-3xl font-bold text-[#2C2C2C] mb-2">1,240</h3>
                    <span class="inline-flex items-center gap-1 text-[11px] font-bold px-2 py-0.5 rounded-full bg-green-50 text-green-600">
                        ↑ +3.2% this month
                    </span>
                </div>

                <div class="kpi-card relative overflow-hidden rounded-2xl p-5 bg-white shadow-sm border border-gray-200 border-l-4 border-l-[#FEB05D]">
                    <p class="text-[10px] font-bold tracking-widest uppercase mb-2 text-gray-500">Active Requests</p>
                    <h3 class="text-3xl font-bold text-[#2C2C2C] mb-2">14</h3>
                    <span class="inline-flex items-center gap-1 text-[11px] font-bold px-2 py-0.5 rounded-full bg-orange-50 text-orange-600">
                        ⚠ 5 pending review
                    </span>
                </div>

                <div class="kpi-card relative overflow-hidden rounded-2xl p-5 bg-white shadow-sm border border-gray-200 border-l-4 border-l-[#FEB05D]">
                    <p class="text-[10px] font-bold tracking-widest uppercase mb-2 text-gray-500">Maintenance</p>
                    <h3 class="text-3xl font-bold text-[#2C2C2C] mb-2">05</h3>
                    <span class="inline-flex items-center gap-1 text-[11px] font-bold px-2 py-0.5 rounded-full bg-blue-50 text-blue-600">
                        ● Scheduled
                    </span>
                </div>

                <div class="kpi-card relative overflow-hidden rounded-2xl p-5 bg-white shadow-sm border border-gray-200 border-l-4 border-l-[#FEB05D]">
                    <p class="text-[10px] font-bold tracking-widest uppercase mb-2 text-gray-500">AI Uptime</p>
                    <h3 class="text-3xl font-bold text-[#2C2C2C] mb-2">99.9%</h3>
                    <span class="inline-flex items-center gap-1 text-[11px] font-bold px-2 py-0.5 rounded-full bg-green-50 text-green-600">
                        ✓ All systems nominal
                    </span>
                </div>

            </div>

            {{-- Charts Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 border-l-4 ">
                    <div class="flex items-center justify-between mb-6">
                        <h4 class="flex items-center gap-2 text-[11px] font-bold uppercase tracking-widest text-[#2C2C2C]">
                            <span style="display:inline-block; width:3px; height:14px; background:#FEB05D; border-radius:2px;"></span>
                            Monthly Procurement Trend
                        </h4>
                        <span class="text-[11px] text-gray-400 px-2 py-0.5 rounded-full bg-gray-50 border border-gray-100">Jan – Jun</span>
                    </div>
                    <canvas id="procurementChart" height="180"></canvas>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 border-l-4 border-l-">
                    <div class="flex items-center justify-between mb-6">
                        <h4 class="flex items-center gap-2 text-[11px] font-bold uppercase tracking-widest text-[#2C2C2C]">
                            <span style="display:inline-block; width:3px; height:14px; background:#FEB05D; border-radius:2px;"></span>
                            Asset Inventory Breakdown
                        </h4>
                        <span class="text-[11px] text-gray-400 px-2 py-0.5 rounded-full bg-gray-50 border border-gray-100">1,240 total</span>
                    </div>
                    <div class="relative max-w-[220px] mx-auto">
                        <canvas id="assetCategoryChart"></canvas>
                        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                            <span class="text-2xl font-bold text-[#2C2C2C]">1,240</span>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mt-0.5">assets</span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Activity Log --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 border-l-4 border-l- overflow-hidden">
                <div class="flex items-center justify-between px-5 py-3 bg-gray-50 border-b border-gray-100">
                    <h4 class="text-[11px] font-bold tracking-widest uppercase text-[#2C2C2C]">System Activity Log</h4>
                    <span class="flex items-center gap-1.5 text-[11px] text-green-600 font-bold uppercase">
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                        Live
                    </span>
                </div>
                <div class="p-4 space-y-2.5">

                    <div class="flex items-center justify-between px-4 py-3 rounded-xl bg-gray-50 border border-gray-100 hover:border-[#FEB05D]/30 transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-lg flex items-center justify-center text-xs font-bold flex-shrink-0 bg-green-100 text-green-700">✓</div>
                            <span class="text-sm font-bold text-[#2C2C2C]">Procurement #9321 approved</span>
                        </div>
                        <span class="text-[11px] font-bold text-gray-400 uppercase whitespace-nowrap">2 mins ago</span>
                    </div>

                    <div class="flex items-center justify-between px-4 py-3 rounded-xl bg-gray-50 border border-gray-100 hover:border-[#FEB05D]/30 transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-lg flex items-center justify-center text-xs font-bold flex-shrink-0 bg-blue-100 text-blue-700">+</div>
                            <span class="text-sm font-bold text-[#2C2C2C]">New asset registered: KW-SRV-09</span>
                        </div>
                        <span class="text-[11px] font-bold text-gray-400 uppercase whitespace-nowrap">1 hour ago</span>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const gridColor = '#f1f5f9';
        const tickColor = '#94a3b8';

        // Line Chart
        const ctxLine = document.getElementById('procurementChart').getContext('2d');
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Requests',
                    data: [12, 19, 8, 15, 22, 14],
                    borderColor: '#FEB05D',
                    backgroundColor: 'rgba(254, 176, 93, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointBackgroundColor: '#FEB05D',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { color: gridColor }, ticks: { color: tickColor, font: { weight: 'bold' } }, border: { display: false } },
                    x: { grid: { display: false }, ticks: { color: tickColor, font: { weight: 'bold' } }, border: { display: false } }
                }
            }
        });

        // Doughnut Chart
        const ctxDoughnut = document.getElementById('assetCategoryChart').getContext('2d');
        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Hardware', 'Software', 'Others'],
                datasets: [{
                    data: [65, 25, 10],
                    backgroundColor: ['#FEB05D', '#2C2C2C', '#94a3b8'],
                    borderColor: '#fff',
                    borderWidth: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { color: '#64748b', font: { weight: 'bold', size: 10 }, usePointStyle: true }
                    }
                },
                cutout: '75%'
            }
        });
    </script>
</x-app-layout>