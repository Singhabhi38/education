<?php

use Illuminate\Database\Seeder;
use App\Product\DAO\ScheduleDAO;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $scheduleDAO;

    public function __construct(ScheduleDAO $scheduleDAO){
        $this->scheduleDAO = $scheduleDAO;
    }

    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 500;



        for ($i = 0; $i <= $limit; $i++) {
            break; // Not doing all these now
            $schedule=([
                'name' => $faker->words(),
                'from' => \Carbon\Carbon::get,
                'to' => 'a',
                'except_date_time_csv' => $faker->randomElement(array(1,2,3)),
                'sun' => $faker->randomElement(array(0,1)),
                'mon' => $faker->randomElement(array(0,1)),
                'tue' => $faker->randomElement(array(0,1)),
                'wed' => $faker->randomElement(array(0,1)),
                'fri' => $faker->randomElement(array(0,1)),
                'sat' => $faker->randomElement(array(0,1)),
            ]);

            $this->scheduleDAO->create($schedule);
        }
    }
}
