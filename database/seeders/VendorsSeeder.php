<?php

namespace Database\Seeders;

use App\Models\Vendors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendors::create([
            'users_id' => '2', //for vendor user
            'Shop_name' => 'Siwaka cafe',
            'address' => 'ole sangale road',
            'telephone' => '254712345678',
            'kra_pin' => 'KP90785634',
            'business_permit_number' => 'BPN7845629',
        ]);
    }
}
