<?php

use Illuminate\Database\Seeder;
use App\CourseUserModel;


class CourseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $userLimit = 500;

        for($i=1; $i<= $userLimit ; $i++){

            $user = \App\UserModel::with('grades')->find($i);

            foreach($user->grades()->get() as $grade){
                $gradeIdOfUser = $grade['id'];
                $allCourses = \App\CourseModel::where('id','>',0)->where('grade_id','=',$gradeIdOfUser)->get();

                foreach($allCourses as $course){
                    if($user->hasRole('Teacher') &&
                       $faker->randomElement([0,0,0,0,0,0,0,1]) == 0){ // Teacher only teaches certain course in every grade he/she is associated with
                        continue;
                    }
                    echo 'User '.$i.' ->>> Course '.$course['id'].' .' . PHP_EOL.PHP_EOL;
                    CourseUserModel::create([
                        'course_id' => $course['id'],
                        'user_id' => ($i),
                        'name' => $faker->randomDigit+1,
                    ]);
                }
            }



        }
    }
}
