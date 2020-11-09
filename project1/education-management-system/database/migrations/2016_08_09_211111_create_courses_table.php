<?php

use App\Product\Database\CustomBluePrint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (BluePrint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('schedule_ids_csv');

            $table->integer('room_id')->unsigned()->nullable(); // Create column to store foreign key first
            $table->foreign('room_id')->references('id')->on('rooms'); // Setting Up Foreign key

            $table->integer('grade_id')->unsigned()->nullable();
            $table->foreign('grade_id')->references('id')->on('grades');

            $table->boolean('practical');
            $table->boolean('theory');

            $table->integer('theory_marks');
            $table->integer('practical_marks');

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
        Schema::drop('courses');
    }
}
