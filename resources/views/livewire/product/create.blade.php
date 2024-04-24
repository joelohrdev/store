<div>
    <x-slot name="header">
        <div class="w-full flex justify-between items-baseline">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Product') }}
            </h2>
            <x-secondary-button-link href="{{ route('products.index') }}">Cancel</x-secondary-button-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form wire:submit.prevent="create" class="space-y-6">
                <div>
                    <x-input-label for="name" :value="__('Product Name')" />
                    <x-text-input wire:model="name" id="create_product_name" name="name" type="text" class="mt-1 block w-full" autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="price" :value="__('Product Price')" />
                    <x-text-input wire:model="price" id="create_product_price" name="price" type="text" class="mt-1 block w-full" autocomplete="price" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Product Description')" />
                    <textarea wire:model="description" rows="4" name="comment" id="comment" class="mt-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div>
                    <div class="mt-2 flex items-center gap-x-3">
                        @if($image)
                            <img src="{{ $image->temporaryUrl() }}" alt="Product Image" class="w-12 h-12 rounded-full">
                        @else
                            <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                            </svg>
                        @endif
                        <label for="image" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            <span>Change</span>
                            <input type="file" id="image" name="image" wire:model="image" class="sr-only">
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <x-primary-button>Submit</x-primary-button>
            </form>
        </div>
    </div>

</div>
