<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = Role::all();
        $permissions = Permission::all()->pluck('id')->toArray();

        // Assign permissions to roles
        $roles->each(function ($role) use ($permissions) {
            $role->permissions()->attach($permissions);
        });
    }
}
