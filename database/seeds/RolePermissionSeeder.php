<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Create role
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);

        // permission list as array
        $permissions = [
            // dashboard
            'dashboard.view',

            // Admin Premissions
            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.approve',

            // Admin Premissions
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
            'admin.approve',

            // Role Premission
            'role.create',
            'role.view',
            'role.edit',
            'role.delete',
            'role.approve',

            // Profile Permission
            'profile.view',
            'profile.edit',
        ];

        foreach ($permissions as $key => $value) {
            // Crete permissions
            $permission = Permission::create(['name' => $value]);
            // Assign permission
            $roleSuperAdmin->givePermissionTo($permission);
        }
    }
}
