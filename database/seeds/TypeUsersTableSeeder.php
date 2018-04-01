<?php

use Illuminate\Database\Seeder;
use GsTest\Model\TypeUser;

class TypeUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeUser::create(array(
            'id' => TypeUser::ADMIN,
            'name' => 'Administrador'
        ));

        TypeUser::create(array(
            'id' => TypeUser::EMPLOYEE,
            'name' => 'Empleado'
        ));
    }
}
