<?php

use App\Product\Database\CustomBluePrint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (BluePrint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('section')->nullable();
            $table->string('year')->nullable();
            $table->string('semester')->nullable();
            $table->string('trimester')->nullable();
            $table->string('month')->nullable();
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
        Schema::drop('grades');
    }
}
