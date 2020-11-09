<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $userLimit = \Illuminate\Support\Facades\Config::get('client.seed-defaults')['users'];

        for ($i = 1; $i <= $userLimit; $i++) {
            \DB::table('role_user')->insert([
                'role_id' => $faker->randomElement(array(1,1,1,1,1,1,1,1,1,1,2)),
                'user_id' => $i
            ]);
        }
    }
}