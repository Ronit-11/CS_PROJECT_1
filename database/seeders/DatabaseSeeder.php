<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UserRolesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserRolesSeeder::class,
            UserSeeder::class,
            VendorsSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
