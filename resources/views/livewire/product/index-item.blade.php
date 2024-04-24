<tr class="text-neutral-800">
    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">{{ $product->name }}</td>
    <td class="px-5 py-4 text-sm whitespace-nowrap">${{ $product->formattedPrice }}</td>
    <td class="px-5 py-4 text-sm whitespace-nowrap">
        @if($product->image)
            <img class="w-12 h-12 rounded-full" src="{{ $product->image }}" alt="">
        @endif
    </td>
    <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
        <a class="text-blue-600 hover:text-blue-700" href="{{ route('products.show', $product) }}">Edit</a>
    </td>
</tr>
