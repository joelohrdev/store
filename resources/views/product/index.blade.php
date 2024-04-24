<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products') }}
            </h2>
            <x-primary-button-link href="{{ route('products.create') }}">New</x-primary-button-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:product.index />
        </div>
    </div>
</x-app-layout>
