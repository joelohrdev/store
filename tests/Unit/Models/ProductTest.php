<?php

declare(strict_types=1);

use App\Models\Product;
use App\Models\User;

test('to array', function () {
    $product = Product::factory()->create()->fresh();

    expect(array_keys($product->toArray()))->toBe([
        'id',
        'uuid',
        'user_id',
        'name',
        'slug',
        'description',
        'price',
        'image',
        'deleted_at',
        'created_at',
        'updated_at',
    ]);
});

test('relations', function () {
    $product = Product::factory()->create();

    expect($product->user)->toBeInstanceOf(User::class);
});
