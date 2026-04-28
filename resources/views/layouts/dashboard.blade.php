<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EIS Selangor — Executive Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', sans-serif; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #E2E8F0; border-radius: 10px; }
    </style>
</head>
<body class="bg-[#F8F9FB] font-sans antialiased" 
    x-data="{ 
        sidebarOpen: true, 
        mobileMenu: false,
        init() {
            // Ambil memori dari browser. Default: true (terbuka)
            const savedState = localStorage.getItem('pns_sidebar_state');
            this.sidebarOpen = savedState !== null ? JSON.parse(savedState) : true;
            
            // Simpan setiap kali user klik toggle
            this.$watch('sidebarOpen', value => {
                localStorage.setItem('pns_sidebar_state', JSON.stringify(value));
            });
        }
    }">

    <div class="flex h-screen overflow-hidden">
        @include('partials.sidebar')

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative">
            @include('partials.navbar')

            <main class="flex-1 overflow-y-auto p-6 lg:p-12 relative">
                @yield('content')
            </main>

            <div x-show="mobileMenu" @click="mobileMenu = false" x-cloak 
                class="fixed inset-0 bg-slate-900/40 z-[35] lg:hidden transition-opacity duration-300">
            </div>
        </div>
    </div>
</body>
</html>