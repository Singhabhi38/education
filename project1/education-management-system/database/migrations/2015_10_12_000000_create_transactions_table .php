<?php

use App\Product\Database\CustomBluePrint;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (BluePrint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // Create column to store foreign 
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // Setting Up Foreign key
            $table->string('name');
            $table->string('type');
            $table->string('bill_no');
            $table->string('remarks');
            $table->string('amount');
            $table->integer('created_by')->unsigned(); // Create column to store foreign
            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // Setting Up Foreign key
            $table->integer('updated_by')->unsigned(); // Create column to store foreign
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
        Schema::drop('transactions');
    }
}