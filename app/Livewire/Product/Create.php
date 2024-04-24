<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:255')]
    public string $name = '';
    #[Validate('required|string')]
    public string $description = '';
    #[Validate('required|numeric')]
    public string $price = '';
    #[Validate('nullable|image|max:1024')]
    public $image = '';

    public function create()
    {
        $this->validate();

        Product::create([
            'name' => $this->pull('name'),
            'description' => $this->pull('description'),
            'price' => $this->pull('price'),
//            'image' => $this->pull('image')->store('products'),
        ]);
    }
    public function render(): View
    {
        return view('livewire.product.create')->layout('layouts.app');
    }
}
