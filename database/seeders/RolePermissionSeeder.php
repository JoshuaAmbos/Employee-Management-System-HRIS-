<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Clear cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // // Define permissions
        // Permission::create(['name' => 'view posts']);
        // Permission::create(['name' => 'create posts']);
        // Permission::create(['name' => 'edit posts']);
        // Permission::create(['name' => 'delete posts']);

        // employee records permissions
        Permission::firstOrCreate(['name' => 'view employee records']);
        Permission::firstOrCreate(['name' => 'create employee records']);
        Permission::firstOrCreate(['name' => 'edit employee records']);
        Permission::firstOrCreate(['name' => 'delete employee records']);

        // department records permissions
        Permission::firstOrCreate(['name' => 'view department records']);
        Permission::firstOrCreate(['name' => 'create department records']);
        Permission::firstOrCreate(['name' => 'edit department records']);
        Permission::firstOrCreate(['name' => 'delete department records']);
        
        // attendance records permissions
        Permission::firstOrCreate(['name' => 'view attendance records']);
        Permission::firstOrCreate(['name' => 'create attendance records']);
        Permission::firstOrCreate(['name' => 'edit attendance records']);
        Permission::firstOrCreate(['name' => 'delete attendance records']);

        // leave request records permissions
        Permission::firstOrCreate(['name' => 'view leave request records']);
        Permission::firstOrCreate(['name' => 'create leave request records']);
        Permission::firstOrCreate(['name' => 'edit leave request records']);
        Permission::firstOrCreate(['name' => 'delete leave request records']);
        
        // Create roles
        // $editor = Role::create(['name' => 'editor']);
        // $viewer = Role::create(['name' => 'viewer']);

        $admin = Role::create(['name' => 'Admin']);
        $hr = Role::create(['name'=> 'HR Staff']);
        $manager = Role::create(['name'=> 'Manager']);
        $employee = Role::create(['name'=> 'Employee']);


        // Assign permissions to roles
        $admin->givePermissionTo(Permission::all());

        $hr->givePermissionTo([
            'create employee records', 'edit employee records', 
            'view department records','create department records', 'edit department records', 'delete department records', 
            'view attendance records', 'create attendance records', 'edit attendance records', 'delete attendance records', 
            'view leave request records', 'create leave request records', 'edit leave request records', 'delete leave request records'
        ]);

        $manager->givePermissionTo([
            'view department records',
            'view employee records',
            'view leave request records', 'create leave request records', 'edit leave request records', 'delete leave request records',
            'view attendance records'
        ]);

        $employee->givePermissionTo([
            'view attendance records',
            'create leave request records', 'view leave request records'
        ]);
    }
}