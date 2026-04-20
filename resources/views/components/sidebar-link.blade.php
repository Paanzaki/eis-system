@props(['active', 'href'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-3 text-sm font-bold text-white bg-orange-600 rounded-xl shadow-[0_4px_15px_rgba(234,88,12,0.3)] transition-all'
            : 'flex items-center px-4 py-3 text-sm font-bold text-gray-400 hover:text-orange-500 hover:bg-slate-800 rounded-xl transition-all';
@endphp

<a {{ $attributes->merge(['class' => $classes, 'href' => $href]) }}>
    {{ $slot }}
</a>