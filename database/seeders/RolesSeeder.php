<?php

namespace Database\Seeders;

use App\Models\Role;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create([
            'name' => 'Admin',
            'slug' => substr(base64_encode(hash('sha256', 'Admin', true)), 0, 10),
            'description' => 'Administrator with full access to the system.',
        ]);
    }
}
