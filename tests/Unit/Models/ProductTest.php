<?php

declare(strict_types=1);

use App\Models\Product;

test('to array', function () {
    $product = Product::factory()->create()->fresh();

    expect(array_keys($product->toArray()))->toBe([
        'id',
        'uuid',
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
