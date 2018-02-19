<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_employee = Role::where('name', 'Employee')->first();

        $admin = new User();
        $admin->emp_code = '1';
        $admin->first_name = 'Tharindu';
        $admin->middle_name = 'Dilshan';
        $admin->last_name = 'Kosgamage';
        $admin->telephone_no = '0774586759';
        $admin->email = 'dilshan.kt@gmail.com';
        $admin->username = 'dilshan.kt@gmail.com';
        $admin->password = bcrypt('12345');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $employee = new User();
        $employee->emp_code = '2';
        $employee->first_name = 'Dhanishi';
        $employee->middle_name = 'Tharika';
        $employee->last_name = 'Liyanage';
        $employee->telephone_no = '0779422201';
        $employee->email = 'dhani@gmail.com';
        $employee->username = 'dhani@gmail.com';
        $employee->password = bcrypt('12345');
        $employee->save();
        $employee->roles()->attach($role_employee);
    }
}
