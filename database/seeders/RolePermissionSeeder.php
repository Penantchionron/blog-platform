<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Permissions
        $permissions = [
            'create content',
            'edit content',
            'delete content',
            'view content',
            'purchase content',
            'rate content'
        ];
        Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // Donner toutes les permissions à l'admin
        $admin->givePermissionTo(Permission::all());

        // Donner des permissions au user
        $user->givePermissionTo([
            'view content',
            'purchase content',
            'rate content'
        ]);
    }
}
