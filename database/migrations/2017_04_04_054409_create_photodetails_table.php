<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotodetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photodetails', function (Blueprint $table) {
            $table->increments('id');
            $table->double('water');
            $table->double('take_time');
            $table->double('L_value');
            $table->double('a_value');
            $table->double('b_value');
            $table->string('photo_url');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('process_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('process_id')->references('id')->on('processes')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photodetails');
    }
}
