<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prices') }}  
        </h2>
    </x-slot>

    <div class="py-12">
        @livewire('prices.price-dashboard');
    </div>
</x-app-layout>
