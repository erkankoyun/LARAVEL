<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutVite();
});

it('searches products by name or description', function () {
    Product::create([
        'name' => 'Caramel Latte',
        'description' => 'Espresso with caramel.',
        'price' => 5.95,
        'is_available' => true,
    ]);

    Product::create([
        'name' => 'Green Tea',
        'description' => 'Fresh jasmine leaves.',
        'price' => 3.25,
        'is_available' => true,
    ]);

    $this->get(route('products.index', ['search' => 'caramel']))
        ->assertOk()
        ->assertSee('Caramel Latte')
        ->assertDontSee('Green Tea');
});

it('filters products by availability', function () {
    Product::create([
        'name' => 'Available Coffee',
        'description' => null,
        'price' => 4.00,
        'is_available' => true,
    ]);

    Product::create([
        'name' => 'Sold Out Tea',
        'description' => null,
        'price' => 4.00,
        'is_available' => false,
    ]);

    $this->get(route('products.index', ['availability' => 'available']))
        ->assertOk()
        ->assertSee('Available Coffee')
        ->assertDontSee('Sold Out Tea');
});

it('paginates the product catalog', function () {
    foreach (range(1, 10) as $number) {
        Product::create([
            'name' => "Product {$number}",
            'description' => null,
            'price' => 2.50,
            'is_available' => true,
        ]);
    }

    $this->get(route('products.index'))
        ->assertOk()
        ->assertSee('Page 1 of 2');
});
