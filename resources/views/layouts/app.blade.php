<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EIS System</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Base Background */
        body { background-color: #F8F9FA; margin: 0; padding: 0; }
        
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #F8F9FA; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

        /* Styling Form Profile & Inputs Tema EIS */
        input[type="text"], 
        input[type="email"], 
        input[type="password"],
        textarea,
        select {
            background-color: #ffffff !important;
            border: 1px solid #e5e7eb !important;
            border-radius: 0.75rem !important;
            font-weight: 700 !important;
            color: #2C2C2C !important;
            transition: all 0.2s;
        }

        input:focus, textarea:focus {
            border-color: #FEB05D !important;
            ring-color: #FEB05D !important;
            outline: none !important;
            box-shadow: 0 0 0 2px rgba(254, 176, 93, 0.2) !important;
        }

        /* Override Breeze Buttons to match Anthracite & Amber */
        button[type="submit"], 
        .inline-flex.items-center.px-4.py-2.bg-gray-800 {
            background-color: #2C2C2C !important;
            color: #FEB05D !important;
            border-radius: 0.5rem !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            border: none !important;
            transition: all 0.2s !important;
        }

        button[type="submit"]:hover {
            background-color: #404040 !important;
            transform: translateY(-1px);
        }

        /* Label styling */
        label {
            color: #64748b !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            font-size: 10px !important;
            letter-spacing: 0.05em !important;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800">
    <div class="flex min-h-screen overflow-hidden">
        
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col min-w-0">
            
            @isset($header)
                <header class="bg-white border-b border-gray-200 h-16 flex items-center px-8 shrink-0 shadow-sm">
                    <div class="w-full">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-1 overflow-y-auto custom-scrollbar p-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>