<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        $admin = Role::create(['name' => 'admin']);
        $student = Role::create(['name' => 'student']);
        $teacher = Role::create(['name' => 'teacher']);

        Permission::create(['name' => 'see_users']);
        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'edit_user']);
        Permission::create(['name' => 'delete_user']);

        $admin->givePermissionTo(['see_users', 'create_user', 'edit_user', 'delete_user']);
        $student->givePermissionTo(['see_users']);
        $teacher->givePermissionTo(['see_users']);
        
        
    }
}
