<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'PhotoAdd']);
        Permission::create(['name' => 'PhotoEdit']);
        Permission::create(['name' => 'PhotoDelete']);

        Permission::create(['name' => 'UserList']);
        Permission::create(['name' => 'UserEdit']);

        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions

        // or may be done by chaining
        Role::create(['name' => 'Publisher'])
            ->givePermissionTo(['PhotoAdd', 'PhotoEdit', 'PhotoDelete']);

        Role::create(['name' => 'SuperAdmin'])
            ->givePermissionTo(Permission::all());
    }
}
