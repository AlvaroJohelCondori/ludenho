<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Category;
use App\Models\Description;
use App\Models\Material;
use App\Models\Spot;
use App\Models\Start;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        Category::factory(5)->create();
        Material::factory(10)->create();
        $this->call(ProductSeeder::class);
        Start::factory(5)->create();
        //Spot::factory(10)->create();
        Address::factory(1)->create();
        Description::factory(1)->create();
    }
}
