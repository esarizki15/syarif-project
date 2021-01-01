<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "Admin";
        $role->save();

        $role1 = new Role();
        $role1->name = "Siswa";
        $role1->save();

        $role2 = new Role();
        $role2->name = "Guru";
        $role2->save();

        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt("rahasia");
        $user->role_id = $role->id; 
        $user->save();

        $user = new User();
        $user->name = "Siswa";
        $user->email = "siswa@gmail.com";
        $user->password = bcrypt("rahasia");
        $user->role_id = $role1->id; 
        $user->save();

        $user = new User();
        $user->name = "Guru";
        $user->email = "guru@gmail.com";
        $user->password = bcrypt("rahasia");
        $user->role_id = $role2->id; 
        $user->save();
    }
}
