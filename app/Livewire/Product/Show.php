<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Number;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    public Product $product;
    use WithFileUploads;

    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required')]
    public string $description = '';

    #[Validate('required')]
    public string $price = '';

    #[Validate('nullable|image|max:1024')]
    public $image = '';

    public function mount()
    {
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->price = $this->product->price / 100;
    }

    public function update()
    {
        $this->validate();

        try {
            $image = $this->image ? $this->image->store('products', 'public') : $this->product->image;

            $this->product->update([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price * 100,
                'image' => $image,
            ]);

            session()->flash('flash.type', 'success');
            session()->flash('flash.title', $this->name.' Updated');
            session()->flash('flash.message', 'Product has been successfully updated.');

            return redirect()->route('products.show', $this->product);
        } catch (\Exception $e) {
            $this->addError('name', $e->getMessage());

            session()->flash('flash.type', 'error');
            session()->flash('flash.title', 'Product Update Failed');
            session()->flash('flash.message', 'There was an error updating the product.');

            return redirect()->back();
        }
    }

    public function render(): View
    {
        return view('livewire.product.show')->layout('layouts.app');
    }
}
