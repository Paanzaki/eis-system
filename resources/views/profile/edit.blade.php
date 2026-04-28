@extends('layouts.dashboard')

@section('content')
<style>
    body { background-color: #FAFAFA; }
</style>

<div class="mb-10">
    <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase italic">Account<span class="text-blue-500">.</span></h3>
    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em] mt-2">Tetapan Profil & Sekuriti Pengguna</p>
</div>

<div class="max-w-5xl space-y-8">
    
    <div class="bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 w-40 h-40 bg-blue-50/50 rounded-bl-[5rem] -z-0"></div>
        
        <div class="relative z-10">
            <div class="mb-10">
                <h4 class="text-lg font-black text-[#1A1A1A] uppercase tracking-wider">Maklumat Peribadi</h4>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Kemaskini data akaun rasmi PNS anda</p>
            </div>

            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
    </div>

    <div class="bg-white p-10 rounded-[3rem] border border-gray-100 shadow-sm">
        <div class="mb-10">
            <h4 class="text-lg font-black text-[#1A1A1A] uppercase tracking-wider">Sekuriti & Kata Laluan</h4>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Pastikan kata laluan anda kuat dan sulit</p>
        </div>

        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="bg-white p-10 rounded-[3rem] border border-red-50 shadow-sm">
        <div class="mb-10">
            <h4 class="text-lg font-black text-red-600 uppercase tracking-wider italic">Danger Zone</h4>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Tindakan ini akan memadam semua data sistem secara kekal</p>
        </div>

        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

</div>
@endsection