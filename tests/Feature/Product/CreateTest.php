<?php

declare(strict_types=1);

use App\Livewire\Product\Create;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\UploadedFile;

test('guest', function () {
    $this->get(route('products.create'))
        ->assertRedirect(route('login'));
});

test('auth', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('products.create'));

    $response->assertOk()
        ->assertSee('Create New Product')
        ->assertSeeLivewire('product.create');
});

