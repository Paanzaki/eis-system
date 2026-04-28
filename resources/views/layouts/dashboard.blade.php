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
</head>
<body class="bg-[#F8F9FB] font-sans antialiased overflow-hidden" x-data="{ sidebarOpen: true }">
    <div class="flex h-screen overflow-hidden">
        @include('partials.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden relative">
            @include('partials.navbar')
            <main class="flex-1 overflow-y-auto p-8 lg:p-12 relative">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>