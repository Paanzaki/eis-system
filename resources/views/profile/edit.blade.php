<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-sm text-[#2C2C2C] leading-tight tracking-widest uppercase">
            EIS <span class="text-[#FEB05D]">/</span> {{ __('Tetapan Profil') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#F8F9FA] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="p-8 bg-white shadow-sm rounded-2xl border border-gray-200 border-l-4 ">
                <div class="max-w-xl">
                    <h3 class="text-xs font-bold text-[#2C2C2C] uppercase tracking-widest mb-6 border-b border-gray-100 pb-2">
                        Maklumat Profil
                    </h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-8 bg-white shadow-sm rounded-2xl border border-gray-200 border-l-4 ">
                <div class="max-w-xl">
                    <h3 class="text-xs font-bold text-[#2C2C2C] uppercase tracking-widest mb-6 border-b border-gray-100 pb-2">
                        Kemaskini Kata Laluan
                    </h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-8 bg-white shadow-sm rounded-2xl border border-gray-200 border-l-4 border-l-red-500">
                <div class="max-w-xl">
                    <h3 class="text-xs font-bold text-red-600 uppercase tracking-widest mb-6 border-b border-red-50 star-2 pb-2">
                        Padam Akaun
                    </h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>