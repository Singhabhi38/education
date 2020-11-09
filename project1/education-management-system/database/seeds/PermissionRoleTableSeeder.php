<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $userlimit = 500;


        for ($i = 1; $i <= $userlimit; $i++) {
            \DB::table('permission_role')->insert([
                'permission_id' => $faker->numberBetween(1,10),
                'role_id' => $i
            ]);
        }
    }

}
