<?php

namespace Database\Seeders;

use App\Models\User;
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
        $permissions = ['view-events', 'manage-events', 'manage-transactions', 'manage-users'];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }

        $user = Role::create(['name' => 'user']);
        $admin = Role::create(['name' => 'admin']);

        $user->givePermissionTo('view-events');
        $admin->givePermissionTo($permissions);

        $user1 = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        $user2 = User::create([
            'name' => 'user',
            'email' => 'axcel@gmail.com',
            'password' => bcrypt('axcel123')
        ]);


        $user1->givePermissionTo($permissions);
        $user2->givePermissionTo('view-events');

    }
}
