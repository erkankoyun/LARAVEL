<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $products = [
            [
                'name' => 'Caramel Latte',
                'description' => 'Espresso with steamed milk and caramel.',
                'price' => 5.95,
                'is_available' => true,
            ],
            [
                'name' => 'Cappuccino',
                'description' => 'Espresso topped with steamed milk and a thick layer of foam.',
                'price' => 4.75,
                'is_available' => true,
            ],
            [
                'name' => 'Americano',
                'description' => 'Rich espresso finished with hot water for a smooth, bold cup.',
                'price' => 3.50,
                'is_available' => true,
            ],
            [
                'name' => 'Iced Mocha',
                'description' => 'Espresso, chocolate and milk served over ice.',
                'price' => 5.50,
                'is_available' => true,
            ],
            [
                'name' => 'Matcha Latte',
                'description' => 'Smooth matcha blended with steamed milk.',
                'price' => 5.25,
                'is_available' => true,
            ],
            [
                'name' => 'Chai Latte',
                'description' => 'Spiced chai tea blended with steamed milk.',
                'price' => 4.95,
                'is_available' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                $product,
            );
        }

        $this->command?->info('Demo cafe products are ready.');

        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (! $email || ! $password) {
            $this->command?->warn('ADMIN_EMAIL and ADMIN_PASSWORD are not set. Admin user was not created.');

            return;
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => env('ADMIN_NAME', 'AIHAN Admin'),
                'password' => $password,
                'is_admin' => true,
            ],
        );

        $this->command?->info('Administrator account is ready.');
    }
}
