<?php

use Illuminate\Database\Seeder;
use App\Product\DAO\ExaminationDAO;

class ExaminationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $examinationDAO;

    public function __construct(ExaminationDAO $examinationDAO){
        $this->examinationDAO = $examinationDAO;
    }
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 100;

        $building = ['A','B','C'];

        for ($i = 0; $i < $limit; $i++) {
           $examination=([
                'name' => $faker->firstName,


            ]);
        $this->examinationDAO->create($examination);
        }
    }
}
