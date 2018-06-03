<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_emp = new Role();
        $role_emp->name = 'Employee';
        $role_emp->description = 'Role Employee';
        $role_emp->save();

        
        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'Role Admin';
        $role_admin->save();
    }
}
