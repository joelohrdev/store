<?php

use App\Models\Product;
use App\Models\User;

test('guest', function () {
    $response = $this->get(route('products.show', 1));

    $response->assertRedirect(route('login'));
});

test('auth', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    $response = $this->actingAs($user)->get(route('products.show', $product));

    $response->assertSeeLivewire('product.show');
});
