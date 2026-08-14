<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns a paginated product collection from the API', function () {
    foreach (range(1, 12) as $number) {
        Product::create([
            'name' => "API Product {$number}",
            'description' => "Description {$number}",
            'price' => 3.50,
            'is_available' => true,
        ]);
    }

    $this->getJson('/api/products?per_page=5')
        ->assertOk()
        ->assertJsonCount(5, 'data')
        ->assertJsonPath('meta.per_page', 5)
        ->assertJsonPath('meta.total', 12);
});

it('filters API products by search and availability', function () {
    Product::create([
        'name' => 'Caramel Latte',
        'description' => 'Espresso with caramel.',
        'price' => 5.95,
        'is_available' => true,
    ]);

    Product::create([
        'name' => 'Caramel Frappe',
        'description' => 'Cold caramel drink.',
        'price' => 6.50,
        'is_available' => false,
    ]);

    $this->getJson('/api/products?search=caramel&availability=available')
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.name', 'Caramel Latte');
});

it('returns a single product from the API', function () {
    $product = Product::create([
        'name' => 'Americano',
        'description' => 'Espresso and hot water.',
        'price' => 3.75,
        'is_available' => true,
    ]);

    $this->getJson("/api/products/{$product->id}")
        ->assertOk()
        ->assertJsonPath('data.id', $product->id)
        ->assertJsonPath('data.name', 'Americano');
});

it('returns 404 for a missing API product', function () {
    $this->getJson('/api/products/999999')
        ->assertNotFound();
});
