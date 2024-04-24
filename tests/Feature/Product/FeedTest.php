<?php

declare(strict_types=1);

use App\Models\User;

test('guest', function () {
   $response = $this->get(route('products.index'));

   $response->assertRedirect(route('login'));
});

test('auth', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('products.index'));

    $response->assertStatus(200)
    ->assertViewIs('product.index')
    ->assertSee('Products');
});
