<?php
use Illuminate\Database\Seeder;
use App\UserDetailModel;
use App\UserModel;


class UsersAndUserDetailsTableSeeder extends Seeder
{

    private $faker ;

    public function  __construct(){
        $this->faker = Faker\Factory::create();
    }

    private $firstNames = array(
            'Priya',
            'Rahul',
            'Tanya',
            'Abhishek',
            'Priyanka',
            'Aditya',
            'Divya',
            'Amit',
            'Tanvi',
            'Mahesh',
            'Ishita',
            'Rohit',
            'Anjali',
            'Ankit',
            'Shreya',
            'Shyam',
            'Riya',
            'Deepak',
            'Sneha',
            'Aryan',
            'Aishwarya',
            'Raj',
            'Gayatri',
            'Arjun',
            'Varsha',
            'Manoj',
            'Ira',
            'Ankur',
            'Sanjana',
            'Akash',
            'Niharika',
            'Karan',
            'Nikita',
            'Rakesh',
            'Natasha',
            'Sam',
            'Neha',
            'Naveen',
            'shivangi',
            'Ashish',
            'Ramya',
            'Vinay',
            'Isha',
            'Parth',
            'Ananya',
            'Mayank',
            'Shivani',
            'Vivek',
            'Sakshi',
            'Aaditya',
            'Aswini',
            'Neeraj',
            'Suhani',
            'Kumar',
            'Abhinav',
            'Pavithra',
            'Soham',
            'Seema',
            'Pranav',
            'Anusha',
            'Rohan',
            'Simran',
            'Ajith',
            'Nishi',
            'Abhi',
            'Anushri',
            'Prateek',
            'Ayushi',
            'Raghav',
            'Radhika',
            'Rishabh',
            'Tanu',
            'Vaibhav',
            'Krithika',
            'Jay',
            'Anisha',
            'Kunal',
            'Akansha',
            'Vishal',
            'Vikas',
            'Nishita',
            'Raju',
            'Diya',
            'Sanjay',
            'Siya',
            'Manish',
            'Abigail',
            'Shivam',
            'Kalyani',
            'Nishant',
            'Rishita',
            'Nitin',
            'Aastha',
            'Krishna',
            'Mary',
            'Krish',
            'Sara',
            'John',
            'Prachi',
            'Anil',
            'Prince',
            'Shrinidhi',
            'Varun',
            'Papuiicolney',
            'Anish',
            'Rhea',
            'Alok',
            'Katherine',
            'Abdul',
            'Rutuja',
            'Sunny',
            'Arti',
            'Siddharth',
            'Vedant',
            'Manu',
            'manisha',
            'MOHIT',
            'Mahima',
            'Arun',
            'Aditi',
            'Ajay',
            'Aashna',
            'Shashank',
            'Tisha',
            'Dhruv',
            'Anirudh',
            'Sam',
            'Ram',
            'Swati',
            'Sanchit',
            'Dia',
            'Gokul',
            'Ria',
            'Anubhav',
            'Anu',
            'Sumit',
            'Neelam',
            'Deepro',
            'Priyanka',
            'Shekhar',
            'Nisha',
            'Anurag',
            'Chandralekha',
            'Akshay',
            'Mitali',
            'Paaus',
            'Dawn',
            'Shaan',
            'Dilmini',
            'Nikhil',
            'Kamalika',
            'Kartik',
            'Khushi',
            'Girish',
            'Anjana',
            'Arya',
            'Prashant',
            'Deepa',
            'Sunil',
            'Juvina',
            'Pratik',
            'Angel',
            'Deep',
            'Anamika',
            'Ramanan',
            'Lavanya',
            'Aniket',
            'Ishika',
            'Jatin',
            'Lily',
            'Dinesh',
            'Archita',
            'Pawan',
            'Rashi',
            'Rajeev',
            'Sarah',
            'Atul',
            'Mayur',
            'Vaishnavi',
            'Tushar',
            'Diksha',
            'Harish',
            'Arusha',
            'Avinash',
            'Niti',
            'Avi',
            'Vidhya',
            'Suresh',
            'Kavya',
            'Ajeet',
            );

    private $lastNames = array(
        'Shrestha',
        'Maharjan',
        'Shakya',
        'Manandhar',
        'Sayami',
        'Bajracharya',
        'Khadgi',
        'Shahi',
        'Prajapati',
        'Awal',
        'Pradhan',
        'Joshi',
        'Suwal',
        'Tuladhar',
        'Dangol',
        'Ranjitkar',
        'Ranjit',
        'Rajbhandari',
        'Rajbhandary',
        'Nakarmi',
        'Thapa',
        'Chhetri',
        'Hamal',
        'Khatri-Chhetri',
        'KC',
        'K.C',
        'Karki',
        'Shahi',
        'Singh-Thakuri',
        'Singh',
        'Bhandari',
        'Bisht',
        'Bista',
        'Giri',
        'Raut',
        'Rawal',
        'Rawat',
        'Malla',
        'Pandey',
        'Pande',
        'Basnet',
        'Basnyat',
        'Khadka',
        'Rana',
        'Chand',
        'Sharma',
        'Pokharel',
        'Pokhrel',
        'Adhikari',
        'Adhikary',
        'Bhattarai',
        'Paudyal',
        'Paudel',
        'Koirala',
        'Ghimire',
        'Joshi',
        'Upadhyaya',
        'Mainali',
        'Neupane',
        'Acharya',
        'Subedi',
        'Gautam',
        'Dahal',
        'Tamang',
        'Lama',
        'Moktan',
        'Yonzon',
        'Pakhrin',
        'Thapa',
        'Rana',
        'Pun',
        'Ale',
        'Gharti',
    );


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $faker = Faker\Factory::create();

        $limit = \Illuminate\Support\Facades\Config::get('client.seed-defaults')['users'];

        $users = array();

        $userDetails = array();

        for ($i = 1; $i <= $limit; $i++) {

            $firstName = $this->getRandomFirstName();
            $lastName = $this->getRandomLastName();

            if($i==1){
                $email = 'teacher@cts.com';
            }else if ($i==2){
                $email = 'student@cts.com';
            }else{
                $email =    $firstName.
                            '.'.
                            $lastName.
                            '.'.
                            $faker->numberBetween(111,999).
                            '@'.
                            $this->faker->randomElement(array('gmail','hotmail','yahoo','outlook','aol')).
                            '.com';
            }

            array_push($users ,
                [
                    'name' => $this->faker->bankAccountNumber,
                    'email' => $email,
                    'password' => bcrypt('abc'),
                    'status' => $this->faker->randomElement(array('REGISTERED','ACTIVE','ACTIVE','ACTIVE','ACTIVE','ACTIVE','ACTIVE','ACTIVE')),
                ]
                );

            array_push($userDetails,
                [
                    'user_id' => $i,
                    'first_name' => $firstName,
                    'last_name' => $lastName
                ]
                );

            echo $i.' Adding User: '.$users[0]['email']. PHP_EOL.PHP_EOL;

            UserModel::insert($users);
            UserDetailModel::insert($userDetails);
            $users = array();
            $userDetails = array();
        }

    }

    private function getRandomFirstName(){
        return $this->faker->randomElement($this->firstNames);
    }

    private function getRandomLastName(){
        return $this->faker->randomElement($this->lastNames);
    }
}