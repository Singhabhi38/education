<?php

use App\Product\Database\CustomBluePrint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (BluePrint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('from');
            $table->dateTime('to');
            $table->string('except_date_csv');
            // Schedule for Course, Examinations, Holiday etc
            $table->string('for_entity');
            $table->string('for_entity_id');
            $table->boolean('sun');
            $table->boolean('mon');
            $table->boolean('tue');
            $table->boolean('wed');
            $table->boolean('thu');
            $table->boolean('fri');
            $table->boolean('sat');
            $table->integer('created_by')->unsigned()->nullable(); // Create column to store foreign
            $table->foreign('created_by')
                ->references('id')
                ->on('users');
            $table->integer('updated_by')->unsigned()->nullable(); // Create column to store foreign
            $table->foreign('updated_by')
                ->references('id')
                ->on('users');
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
        Schema::drop('schedules');
    }
}
