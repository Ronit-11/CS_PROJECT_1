<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_Admin = Role::create(['name' => 'Admin']);
        $role_Vendor = Role::create(['name' => 'Vendor']);
        $role_User = Role::create(['name' => 'User']);


        $permission_Create = Permission::create(['name' => 'create users']);
        $permission_Edit = Permission::create(['name' => 'Edit users']);
        $permission_read = Permission::create(['name' => 'read users']);
        $permission_Delete = Permission::create(['name' => 'delete users']);
        //$permission_Create = Permission::create(['name' => 'create users']);

        $AdminPermissions = [$permission_Create, $permission_Edit, $permission_read, $permission_Delete];

        $role_Admin->syncPermissions($AdminPermissions);

        //$role->givePermissionTo($permission); assign 1 permission to role

        //$role->revokePermissionTo($permission); revoke a permission from role

    }
}
