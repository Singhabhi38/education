<?php

use App\Product\Database\CustomBluePrint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (BluePrint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('grade_id')->unsigned()->nullable(); // Create column to store foreign key first
            $table->foreign('grade_id')->references('id')->on('grades'); // Setting Up Foreign key

            $table->integer('course_id')->unsigned()->nullable(); // Create column to store foreign key first
            $table->foreign('course_id')->references('id')->on('courses'); // Setting Up Foreign key

            $table->integer('room_id')->unsigned()->nullable(); // Create column to store foreign key first
            $table->foreign('room_id')->references('id')->on('rooms'); // Setting Up Foreign key

            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users');

            $table->string('remarks');
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
        Schema::drop('examinations');
    }
}
