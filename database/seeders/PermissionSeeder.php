<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ["name" => "user-show"],
            ["name" => "user-store"],
            ["name" => "user-update"],
            ["name" => "user-delete"],
            ["name" => "role-show"],
            ["name" => "role-store"],
            ["name" => "role-update"],
            ["name" => "role-delete"],

        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
