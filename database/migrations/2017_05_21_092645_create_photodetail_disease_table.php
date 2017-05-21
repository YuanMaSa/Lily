<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotodetailDiseaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photodetail_disease', function (Blueprint $table) {
            $table->integer('photodetail_id')->unsigned();;
            $table->integer('disease_id')->unsigned();;
            $table->primary(['photodetail_id','disease_id']);
            $table->foreign('photodetail_id')->references('id')->on('photodetails')->onDelete('cascade');//role-id is from role table and ondelete
            $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('cascade');//role-id is from role table and ondelete
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
        Schema::dropIfExists('photodetail_disease');
    }
}
