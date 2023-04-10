<?php

namespace Database\Seeders;

 use App\Models\Admin;
 use App\Models\Category;
 use App\Models\Product;
 use App\Models\User;
 use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
        ]);

        User::factory(9)->create();

        Category::factory(10)->create();

        Product::factory(20)->create();

        Product::all()->each(function ($product) {
            $product->copyMedia(resource_path('img/example-product-image.jpg'))->toMediaCollection('images');
        });

        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
