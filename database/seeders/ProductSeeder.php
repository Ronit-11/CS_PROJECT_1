<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 10; $i++){
            Product::create([
                'name' => 'Sweet food' . ' ' .$i,
                'details' => 'siwaka\'s food' . ' ' .$i,
                'vendors_id' => '1', //Siwaka bakery
                'description' => 'slightly salted with' . ' ' .$i. ' ' . 'sugar cubes and vinegar',
                'product' => 'SWB-' . ' ' .$i,
                'price' => rand(50, 1000),
                'category' => 'fast food',
            ]);
        };

        for ($i=1; $i <= 10; $i++){
            Product::create([
                'name' => 'Spicy Food' . ' ' .$i,
                'details' => 'siwaka\'s food' . ' ' .$i,
                'vendors_id' => '1', //Siwaka smokies
                'description' => 'marinated with' . ' ' .$i. ' ' . 'chillies with pepper',
                'product' => 'SWS-' .$i,
                'price' => rand(50, 1000),
                'category' => 'Spicy food',
            ]);
        };

        for ($i=1; $i <= 10; $i++){
            Product::create([
                'name' => 'food' . ' ' .$i,
                'details' => 'siwaka\'s drinks' . ' ' .$i,
                'vendors_id' => '1', //Siwaka beverages
                'description' => 'crafted with' . ' ' .$i. ' ' . 'oranges and grapes',
                'product' => 'SWBv-' . ' ' .$i,
                'price' => rand(50, 1000),
                'category' => 'drinks',
            ]);
        };
    }
}
