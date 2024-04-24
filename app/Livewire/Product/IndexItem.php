<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class IndexItem extends Component
{
    public Product $product;

    public function render()
    {
        return view('livewire.product.index-item');
    }
}
