<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::firstOrCreate(['name' => 'create-users']);
        Permission::firstOrCreate(['name' => 'update-users']);
        Permission::firstOrCreate(['name' => 'delete-users']);

        Permission::firstOrCreate(['name' => 'create-college']);
        Permission::firstOrCreate(['name' => 'update-college']);
        Permission::firstOrCreate(['name' => 'delete-college']);

        Permission::firstOrCreate(['name' => 'create-school']);
        Permission::firstOrCreate(['name' => 'update-school']);
        Permission::firstOrCreate(['name' => 'delete-school']);

        Permission::firstOrCreate(['name' => 'create-program']);
        Permission::firstOrCreate(['name' => 'update-program']);
        Permission::firstOrCreate(['name' => 'delete-program']);

        Permission::firstOrCreate(['name' => 'create-department']);
        Permission::firstOrCreate(['name' => 'update-department']);
        Permission::firstOrCreate(['name' => 'delete-department']);

        Permission::firstOrCreate(['name' => 'create-student']);
        Permission::firstOrCreate(['name' => 'update-student']);
        Permission::firstOrCreate(['name' => 'delete-student']);

        Role::firstOrCreate(['name' => 'Admin'])->givePermissionTo(Permission::all());
        Role::firstOrCreate(['name' => 'HOD'])->givePermissionTo(['create-student', 'update-student', 'delete-student', 'create-department', 'update-department', 'delete-department']);
        Role::firstOrCreate(['name' => 'student']);
    }
}
