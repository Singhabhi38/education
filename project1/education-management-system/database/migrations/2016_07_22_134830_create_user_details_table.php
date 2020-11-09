<?php

use App\Product\Database\CustomBluePrint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // Create column to store foreign key first
			$table->foreign('user_id')
                ->references('id')
                ->on('users');
			$table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->text('gender');
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
        Schema::drop('user_details');
    }
}
