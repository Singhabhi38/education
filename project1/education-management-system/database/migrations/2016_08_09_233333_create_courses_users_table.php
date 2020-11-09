<?php

use App\Product\Database\CustomBluePrint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_user', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned(); // Create column to store foreign key first
            $table->foreign('course_id')
                ->references('id')
                ->on('courses'); // Setting Up Foreign key

            $table->integer('user_id')->unsigned(); // Create column to store foreign key first
            $table->foreign('user_id')
                ->references('id')
                ->on('users'); // Setting Up Foreign key

            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('course_user');
    }
}
