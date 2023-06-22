<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@serv.com',
                'password' => 'Admin.123',
                'verified_at' => '2023-06-05 09:28:40',
                'role' => 'Admin',
            ],
            [
                'name' => 'Vendor User',
                'email' => 'Vendor@serv.com',
                'password' => 'Vendor.123',
                'verified_at' => '2023-06-05 09:30:21',
                'role' => 'Vendor',
            ],
            [
                'name' => 'Normal User',
                'email' => 'User@serv.com',
                'password' => 'Normal.123',
                'verified_at' => '2023-06-05 09:27:21',
                'role' => 'User',
            ]

        ];

        foreach($users as $user){
            $createdUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => $user['verified_at'],
                'password' => Hash::make($user['password']),
            ]);
            $createdUser->assignRole($user['role']);
        }
    }
}
