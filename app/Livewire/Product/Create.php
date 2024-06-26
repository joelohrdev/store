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

        try {
            $image = $this->image ? $this->image->store('products', 'public') : null;

            $product = Product::create([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price * 100,
                'image' => $image,
            ]);

            session()->flash('flash.type', 'success');
            session()->flash('flash.title', $this->name.' Created');
            session()->flash('flash.message', 'Product has been successfully created.');

            return redirect()->route('products.show', $product);
        } catch (\Exception $e) {
            $this->addError('name', $e->getMessage());

            session()->flash('flash.type', 'error');
            session()->flash('flash.title', 'Product Creation Failed');
            session()->flash('flash.message', 'There was an error creating the product.');

            return redirect()->back();
        }
    }

    public function render(): View
    {
        return view('livewire.product.create')->layout('layouts.app');
    }
}
