<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutVite();
    $this->admin = User::factory()->create(['is_admin' => true]);
});

it('allows an administrator to create a product', function () {
    $response = $this->actingAs($this->admin)->post(route('products.store'), [
        'name' => 'Caramel Latte',
        'description' => 'Espresso with steamed milk and caramel.',
        'price' => '5.95',
        'is_available' => '1',
    ]);

    $response->assertRedirect(route('products.index', absolute: false));

    $this->assertDatabaseHas('products', [
        'name' => 'Caramel Latte',
        'price' => 5.95,
        'is_available' => true,
    ]);
});

it('allows an administrator to update a product', function () {
    $product = Product::create([
        'name' => 'Caramel Latte',
        'description' => 'Original description',
        'price' => 5.95,
        'is_available' => true,
    ]);

    $response = $this->actingAs($this->admin)->put(route('products.update', $product), [
        'name' => 'Vanilla Latte',
        'description' => 'Espresso with steamed milk and vanilla.',
        'price' => '6.25',
    ]);

    $response->assertRedirect(route('products.index', absolute: false));

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => 'Vanilla Latte',
        'price' => 6.25,
        'is_available' => false,
    ]);
});

it('allows an administrator to delete a product', function () {
    $product = Product::create([
        'name' => 'Americano',
        'description' => null,
        'price' => 3.50,
        'is_available' => true,
    ]);

    $response = $this->actingAs($this->admin)->delete(route('products.destroy', $product));

    $response->assertRedirect(route('products.index', absolute: false));
    $this->assertDatabaseMissing('products', ['id' => $product->id]);
});

it('validates required product fields', function () {
    $response = $this->actingAs($this->admin)
        ->from(route('products.create'))
        ->post(route('products.store'), [
            'name' => '',
            'price' => -1,
        ]);

    $response->assertRedirect(route('products.create'));
    $response->assertSessionHasErrors(['name', 'price']);
    $this->assertDatabaseCount('products', 0);
});

it('prevents regular users from changing products', function () {
    $user = User::factory()->create(['is_admin' => false]);
    $product = Product::create([
        'name' => 'Espresso',
        'description' => null,
        'price' => 2.95,
        'is_available' => true,
    ]);

    $this->actingAs($user)
        ->put(route('products.update', $product), [
            'name' => 'Changed',
            'price' => 1.00,
        ])
        ->assertForbidden();

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => 'Espresso',
    ]);
});
