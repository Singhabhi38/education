<?php

use Illuminate\Database\Seeder;
use App\Product\DAO\AddressDAO;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $addressDAO;

    public function __construct(AddressDAO $addressDAO){
        $this->addressDAO = $addressDAO;
    }

    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 500;

        for ($i = 1; $i <= $limit; $i++) {
            $address=([
                'address' => $faker->randomElement(array('A','B','C')),
                'zone' => $faker->randomElement(array('Bagmati','Seti','Mahakali','Gandaki','Karnali','Koshi','Rapti')),
                'district' => $faker->randomElement(array('kathmandu','Bhaktapur','Lalitpur','Dhangadi')),
            ]);
            $this->addressDAO->create($address);
        }
    }
}
