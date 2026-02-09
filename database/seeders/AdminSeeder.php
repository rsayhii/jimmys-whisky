<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'], // Using email as unique identifier
            [
                'name' => 'admin', // "user name is admin"
                'password' => Hash::make('admin@123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
