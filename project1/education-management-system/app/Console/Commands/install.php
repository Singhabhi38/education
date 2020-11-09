<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product-install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Publishing Vendors...".PHP_EOL);
        Artisan::call("vendor:publish");

//        $this->info("Generating new application key...".PHP_EOL);
//        Artisan::call("key:generate");

        $this->info("Rolling back all migrations...".PHP_EOL);
        Artisan::call("migrate:reset", ['--force' => 'y']); // No Confirmation

        $this->info("Migrating...".PHP_EOL);
        Artisan::call("migrate", ['--force' => 'y']); // No Confirmation

        $this->info("Seeding...".PHP_EOL);

        $this->info("Seeding 'users' & 'user_details' Table...".PHP_EOL);
        Artisan::call("db:seed" , ['--class'=>'UsersAndUserDetailsTableSeeder']);

        $this->info("Seeding 'roles' and 'permissions' Table...".PHP_EOL);
        Artisan::call("db:seed" , ['--class'=>'RolesAndPermissionsTableSeeder']);

        $this->info("Seeding 'role_user' Table...".PHP_EOL);
        Artisan::call("db:seed" , ['--class'=>'RoleUserTableSeeder']);

        $this->info("Seeding 'rooms' Table...".PHP_EOL);
        Artisan::call("db:seed" , ['--class'=>'RoomsTableSeeder']);

        $this->info("Seeding 'grades' Table...".PHP_EOL); // Grade should be seeded before Course
        Artisan::call("db:seed" , ['--class'=>'GradesTableSeeder']);

        $this->info("Seeding 'courses' Table...".PHP_EOL); // Grade should be seeded before Course!!!
        Artisan::call("db:seed" , ['--class'=>'CoursesTableSeeder']);

        $this->info("Seeding 'grade_user' Table...".PHP_EOL);
        Artisan::call("db:seed" , ['--class'=>'GradeUserTableSeeder']);

        $this->info("Seeding 'course_user' Table...".PHP_EOL);
        Artisan::call("db:seed" , ['--class'=>'CourseUserTableSeeder']);

        $this->info("Seeding 'schedules' Table...".PHP_EOL);
        Artisan::call("db:seed" , ['--class'=>'SchedulesTableSeeder']);

        $this->info("Seeding 'addresses' Table...".PHP_EOL);
        Artisan::call("db:seed" , ['--class'=>'AddressesTableSeeder']);

        $this->info("Clearing Cache...".PHP_EOL);
        Artisan::call("cache:clear");

        $this->info("Optimizing Class Loader...".PHP_EOL);
        Artisan::call("optimize");

        $this->info("Installation Complete!!!");
    }

}
