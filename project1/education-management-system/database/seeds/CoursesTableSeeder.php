<?php

use Illuminate\Database\Seeder;

use App\CourseModel;
use App\Product\DAO\CourseDAO;

class CoursesTableSeeder extends Seeder
{

    private $courseDAO;

    public function __construct(CourseDAO $courseDAO){
        $this->courseDAO = $courseDAO;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $subjectList =  array('Math',
            'Science',
            'English',
            'Music',
            'Dance',
            'Social Studies',
            'Health and Physical Education',
            'Nepali',
            'Population and Environment Education',
            'Optional Math',
            'Computer Science',
            'Accounting',
            'Civics',
            'Economics',
        );

        $allGrades = \App\GradeModel::where('id','>',0)->get();
        $gradeLimit = sizeof($allGrades);

        $gradeLimit = $gradeLimit - 1;
        for ($i = 0; $i < ( sizeof($subjectList)); $i++) {
            for($gradeId = 1; $gradeId <=$gradeLimit; $gradeId++){
                $grade = $allGrades[$gradeId];
                $course = array(
                    'name' =>  $faker->randomElement($subjectList),
                    'room_id' => $faker->numberBetween(1,100),
                    'grade_id' => $grade['id'],
                );
                echo 'Adding Course "'.$course['name'].'" in Grade '.$grade['short_name'].' Section '.$grade['section'].PHP_EOL.PHP_EOL;
                $this->courseDAO->create($course);
            }
        }
    }
}
