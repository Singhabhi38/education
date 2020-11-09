<?php

use App\Product\Database\CustomBluePrint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (BluePrint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            // Storing Attendance for specific course i.e course-wise attendance
            $table->integer('course_id')->unsigned()->nullable();
            $table->foreign('course_id')
                ->references('id')
                ->on('courses');

            // Storing who inserted the Record
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            // Storing Attendance for specific grade i.e grade-wise attendance
            $table->integer('grade_id')->unsigned()->nullable();
            $table->foreign('grade_id')
                ->references('id')
                ->on('grades');

            // Storing Attendance for specific examinations i.e examination-wise attendance
            $table->integer('examination_id')->unsigned()->nullable();
            $table->foreign('examination_id')
                ->references('id')
                ->on('examinations');

            $table->string('year_np');
            $table->string('month_np');
            $table->string('month_name_np');
            $table->string('day_np');
            $table->string('in_or_out')->nullable();
            $table->string('comment');
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
        Schema::drop('attendance');
    }
}
