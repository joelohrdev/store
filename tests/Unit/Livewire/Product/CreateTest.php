<?php

use App\Livewire\Product\Create;
use App\Models\User;
use Illuminate\Http\UploadedFile;

test('allows to create product with image', function () {
    $user = User::factory()->create();

    $component = Livewire::actingAs($user)->test(Create::class);

    $component->set('name', 'Product Name');
    $component->set('description', 'Product Description');
    $component->set('price', 100);
    $component->set('image', UploadedFile::fake()->image('image.jpg'));

    $component->call('create');

    expect($user->products()->count())->toBe(1);

    $product = $user->products()->first();

    expect($product->name)->toBe('Product Name');
});

test('allows to create product without image', function () {
    $user = User::factory()->create();

    $component = Livewire::actingAs($user)->test(Create::class);

    $component->set('name', 'Product Name');
    $component->set('description', 'Product Description');
    $component->set('price', 100);
    $component->set('image');

    $component->call('create');

    expect($user->products()->count())->toBe(1);

    $product = $user->products()->first();

    expect($product->name)->toBe('Product Name');
});
