<?php

use Illuminate\Database\Seeder;
use GsTest\User;
use GsTest\Model\Employee;
use GsTest\Model\TypeUser;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            $user = new User();
            $user->email = $faker->email;
            $user->password = bcrypt('admin');
            $user->type_user_id = TypeUser::EMPLOYEE;
            $user->save();

            $employee = new Employee(array(
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address
            ));

            $user->employee()->save($employee);
        }
    }
}
