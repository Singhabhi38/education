<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Config;

class GradeUserTableSeeder extends Seeder
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
        $allGrades = \App\GradeModel::where('id', '>', 0)->get();
        $gradeLimit = sizeof($allGrades);

        $gradeId = 1;
        for ($i = 1; $i <= $userLimit; $i++) {
            //Checking Student or teacher
            $gradePerUser = \App\UserModel::find($i)->hasRole('Teacher') ? 8 : 1;  // If teacher assign 8 grades

            for ($k = 1; $k <= $gradePerUser; $k++) {
                if($gradePerUser != 1){
                    $gradeIdMultiple = $faker->numberBetween(1, $gradeLimit);
                    echo 'User '.$i.' ->>> Grade '.$gradeIdMultiple.' .' . PHP_EOL.PHP_EOL;
                    \DB::table('grade_user')->insert([
                        'grade_id' => $gradeIdMultiple,
                        'user_id' => $i
                    ]);
                }else{
                    echo 'User '.$i.' ->>> Grade '.$gradeId.' .' . PHP_EOL.PHP_EOL;
                    \DB::table('grade_user')->insert([
                        'grade_id' => $gradeId,
                        'user_id' => $i
                    ]);
                }
            }

            $gradeId++;

            if($gradeId > $gradeLimit){
                $gradeId = 1;
            }

        }
    }
}