<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if( Auth::user()->authLygis == 0 )
    <div class="border rounded bg-danger text-red-700">
        Reikia administratoriaus patvirtinimo!
    </div>
    @endif
    @if( Auth::user()->authLygis > 0 )
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    primtu darbu kiekis
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
