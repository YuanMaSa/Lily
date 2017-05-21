<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotodetailPestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photodetail_pest', function (Blueprint $table) {
            $table->integer('photodetail_id')->unsigned();;
            $table->integer('pest_id')->unsigned();;
            $table->primary(['photodetail_id','pest_id']);
            $table->foreign('photodetail_id')->references('id')->on('photodetails')->onDelete('cascade');//role-id is from role table and ondelete
            $table->foreign('pest_id')->references('id')->on('pests')->onDelete('cascade');//role-id is from role table and ondelete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photodetail_pest');
    }
}
