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
        /* FORCE ARIAL GLOBALLY */
        * { font-family: Arial, Helvetica, sans-serif !important; }
        [x-cloak] { display: none !important; }
        
        /* CUSTOM SCROLLBAR */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #E2E8F0; border-radius: 10px; }

        /* SMOOTH TRANSITION FOR DARK MODE */
        .dark-mode-transition {
            transition: background-color 0.5s ease, color 0.5s ease, border-color 0.5s ease;
        }
    </style>
</head>
<body class="antialiased dark-mode-transition" 
    x-data="{ 
        sidebarOpen: true, 
        mobileMenu: false,
        darkMode: false,
        init() {
            // 1. Logic Sidebar (Kekalkan yang sedia ada)
            const savedSidebar = localStorage.getItem('pns_sidebar_state');
            this.sidebarOpen = savedSidebar !== null ? JSON.parse(savedSidebar) : true;
            this.$watch('sidebarOpen', value => {
                localStorage.setItem('pns_sidebar_state', JSON.stringify(value));
            });

            // 2. Logic Dark Mode (Manual Persistence)
            const savedDark = localStorage.getItem('pns_dark_mode');
            this.darkMode = savedDark !== null ? JSON.parse(savedDark) : false;
            this.$watch('darkMode', value => {
                localStorage.setItem('pns_dark_mode', JSON.stringify(value));
            });
        }
    }"
    :class="darkMode ? 'bg-[#0F172A] text-slate-200' : 'bg-[#F8F9FB] text-slate-900'">

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

    <script>
        window.addEventListener('alpine:init', () => {
            // Kau boleh tambah event listener kat sini kalau nak update chart color secara live
        });
    </script>
</body>
</html>