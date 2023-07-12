<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['categoryName' => 'Sweet food',]);
        Category::create(['categoryName' => 'Spicy food',]);
        Category::create(['categoryName' => 'Drinks',]);
    }
}
