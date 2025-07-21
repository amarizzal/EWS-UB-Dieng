<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Admin User',
                'username' => 'admin',
                'password' => Hash::make('admin12345'),
            ],
            [
                'id' => 2,
                'name' => 'Manager User',
                'username' => 'manager',
                'password' => Hash::make('manager12345'),
            ],
            [
                'id' => 3,
                'name' => 'Staff User',
                'username' => 'staff',
                'password' => Hash::make('staff12345'),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['username' => $user['username']], // Cek by email agar unik
                $user
            );
        }
    }
}
