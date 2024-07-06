<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            ['name' => 'assign roles'],
            ['name' => 'access product'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $adminRole->permissions()->attach(Permission::where('name', 'assign roles')->first());
        $adminRole->permissions()->attach(Permission::where('name', 'access product')->first());
        $userRole->permissions()->attach(Permission::where('name', 'access product')->first());
    
    }
}
