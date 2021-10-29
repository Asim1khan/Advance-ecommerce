<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCatagoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_catagories', function (Blueprint $table) {
            $table->id();
            $table->integer('catagory_id');
            $table->string('sub_catagory_name_eng');
            $table->string('sub_catagory_name_urdu');
            $table->string('sub_catagory_slug_eng');
            $table->string('sub_catagory_slug_urdu');
            $table->foreign('catagory_id')->references('id')->on('catagories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sub_catagories');
    }
}
