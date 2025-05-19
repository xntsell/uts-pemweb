<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Buat permission
        $permissions = [
            'view pelanggan',
            'create pelanggan',
            'update pelanggan',
            'delete pelanggan',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $kasirRole = Role::firstOrCreate(['name' => 'kasir']);
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        // permission yang diinginkan ke role kasir
        $kasirRole->syncPermissions(['view pelanggan']);

        // Beri semua permission ke role super_admin
        $superAdminRole->syncPermissions($permissions);

        $userKasir = User::find(2);
        if ($userKasir) {
            $userKasir->assignRole('kasir');
        }

        $userSuperAdmin = User::find(1);
        if ($userSuperAdmin) {
            $userSuperAdmin->assignRole('super_admin');
        }
    }
}
