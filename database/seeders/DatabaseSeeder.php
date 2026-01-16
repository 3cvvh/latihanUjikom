<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
        ]);
        Category::create([
            "name" => "olahraga",
        ]);
        Category::create([
            "name" => "casual",
        ]);
        Category::create([
            "name" => "safety",
        ]);
        Brand::create([
            "name" => "Ventela",
        ]);
        Brand::create([
            "name" => "compass",
        ]);
        Brand::create([
            "name" => "AeroStreet",
        ]);
    }
}
