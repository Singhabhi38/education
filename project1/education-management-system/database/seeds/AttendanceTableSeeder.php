<?php

use Illuminate\Database\Seeder;
use App\Product\DAO\AttendanceDAO;

class AttendanceTableSeeder extends Seeder{



    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $attendanceDAO;

    public function __construct(AttendanceDAO $attendanceDAO){
        $this->attendanceDAO = $attendanceDAO;
    }
    public function run(){
//        $faker = Faker\Factory::create();
//        $limit = 500;
//
//        $date = '2016-07-25 10:01:01';
//        $endDate = '2016-09-01 10:01:01';
//
//        while (strtotime($date) <= strtotime($endDate)) {
//            for ($i = 1; $i <= $limit; $i++) {
//                AttendanceModel::create([
//                    'user_id' => $i,
//                    'in_or_out' => $faker->randomElement(array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,0)),
//                    'created_at' => $date,
//                ]);
//            }
//            $date = date ("Y-m-d H:i:s", strtotime("+1 day", strtotime($date)));
//        }

        $faker = Faker\Factory::create();

        $limit = 100;



        for ($i = 1; $i < $limit; $i++) {
            $attendance=([
                'user_id' =>$i,
                'year_np' => $faker->randomElement(array('2016','2015','2014')),
                'month_np' => $faker->randomElement(array('1','2','3','4','5')),
                'day_np' => $faker->randomElement(array('1','2','3','4')),
                'in_or_out' => $faker->randomElement(array('in','out')),
                'comment' => $faker->randomElement(array('good','bad')),
            ]);

            $this->attendanceDAO->create($attendance);
        }
    }
}