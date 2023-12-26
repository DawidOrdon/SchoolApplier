<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'add_school']);
        Permission::create(['name'=>'add_permission']);
        Permission::create(['name'=>'edit_school_data']);

        Role::create(['name' => 'user']);
        Role::create(['name' => 'school'])->givePermissionTo('edit_school_data');
        Role::create(['name' => 'admin'])->getAllPermissions();

    }
}
