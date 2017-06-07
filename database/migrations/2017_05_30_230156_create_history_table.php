<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('User id from table users.');
            $table->string('name');
            $table->string('lastName');
            $table->string('email');
            $table->string('title');
            $table->boolean('status')->default('0')->comment('Task status. 1=done, 0=not completed.');
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
        Schema::dropIfExists('data_history');
    }
}
