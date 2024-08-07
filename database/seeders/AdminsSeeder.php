<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('superpassword'), // Use a secure password
            'phone' => '1234567890',
            'profile_picture' => null,
            'is_active' => true,
            'role_id' => 1, // Assuming the role_id 1 is for 'Admin' role
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        Admin::factory()->count(10)->create();
    }
}
