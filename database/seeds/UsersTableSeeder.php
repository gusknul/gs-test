<?php

use Illuminate\Database\Seeder;
use GsTest\User;
use GsTest\Model\TypeUser;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = new User();
        $userAdmin->email = 'admin@admin.com';
        $userAdmin->password = bcrypt('admin');
        $userAdmin->type_user_id = TypeUser::ADMIN;
        $userAdmin->save();
    }
}
