<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full">
                <div class="overflow-hidden border rounded-lg">
                    <table class="min-w-full divide-y divide-neutral-200 bg-white">
                        <thead class="bg-neutral-50">
                        <tr class="text-neutral-500">
                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Name</th>
                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Price</th>
                            <th class="px-5 py-3 text-xs font-medium text-left uppercase">Image</th>
                            <th class="px-5 py-3 text-xs font-medium text-right uppercase">Action</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-200">
                            @foreach($products as $product)
                                <livewire:product.index-item :product="$product" :key="$product->id" />
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
