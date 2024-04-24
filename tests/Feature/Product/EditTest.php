<?php


use App\Models\Product;

test('guest', function () {
    $product = Product::factory()->create();

    $response = $this->get(route('products.show', $product));

    $response->assertRedirect(route('login'));
});

test('auth', function () {
$product = Product::factory()->create();

    $this->actingAs($product->user);

    $response = $this->get(route('products.show', $product));

    $response->assertOk()->assertSee($product->name);

    $response->assertSeeLivewire('product.show');
});
