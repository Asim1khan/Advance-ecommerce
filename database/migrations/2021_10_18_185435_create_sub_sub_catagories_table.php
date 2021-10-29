<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubCatagoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sub_catagories', function (Blueprint $table) {
            $table->id();
            $table->integer('catagory_id');
            $table->integer('subcatagory_id');
            $table->string('subsubcatagory_name_eng');
            $table->string('subsubcatagory_name_urdu');
            $table->string('subsubcatagory_slug_eng');
            $table->string('subsubcatagory_slug_urdu');
            $table->foreign('catagory_id')->references('id')->on('catagories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subcatagory_id')->references('id')->on('sub_catagories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sub_sub_catagories');
    }
}
