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
        $role_admin = Role::where('name', 'admin')->first();
        $role_moderator = Role::where('name', 'moderator')->first();
        $role_user  = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'test';
        $admin->email = 'test@o2.pl';
        $admin->password = bcrypt('dupa00731');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $moderator = new User();
        $moderator->name = 'test1';
        $moderator->email = 'test1@o2.pl';
        $moderator->password = bcrypt('dupa00731');
        $moderator->save();
        $moderator->roles()->attach($role_moderator);

        $user = new User();
        $user->name = 'test2';
        $user->email = 'test2@o2.pl';
        $user->password = bcrypt('dupa00731');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
