<?php

declare(strict_types=1);

use App\Livewire\Product\Index;
use App\Models\User;

test('guest', function () {
   $response = $this->get(route('products.index'));

   $response->assertRedirect(route('login'));
});

test('auth', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('products.index'));

    $response->assertOk()
        ->assertViewIs('product.index')
        ->assertSee('Products');
});

test('products', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('products.index'));

    $response->assertOk()
        ->assertSee('Products')
        ->assertSeeLivewire(Index::class);
});
