<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'description' => 'Administrator with full access to the system.',
        ]);

        Role::create([
            'name' => 'Editor',
            'description' => 'Editor with access to modify content.',
        ]);

        Role::create([
            'name' => 'Viewer',
            'description' => 'Viewer with read-only access.',
        ]);
    }
}
