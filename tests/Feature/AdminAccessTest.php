<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutVite();
});

it('allows anyone to browse products', function () {
    $this->get(route('products.index'))->assertOk();
});

it('redirects guests away from product management', function () {
    $this->get(route('products.create'))
        ->assertRedirect(route('login'));
});

it('blocks non-admin users from product management', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user)
        ->get(route('products.create'))
        ->assertForbidden();
});

it('allows administrators to manage products', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin)
        ->get(route('products.create'))
        ->assertOk();
});

it('allows administrators to open the dashboard', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin)
        ->get(route('admin.dashboard'))
        ->assertOk();
});
