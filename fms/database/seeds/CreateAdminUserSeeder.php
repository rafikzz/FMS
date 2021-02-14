<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'admin1',
        	'email' => 'admin@mail.com',
        	'password' => bcrypt('password')

        ]);
        $role2 = Role::create(['name' => 'Customer']);
        $role2 = Role::create(['name' => 'Vendor']);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();


        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
