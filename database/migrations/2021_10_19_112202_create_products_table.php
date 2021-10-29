<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategor_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_eng');
            $table->string('product_name_urdu');
            $table->string('product_slug_eng');
            $table->string('product_slug_urdu');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tag_eng');
            $table->string('product_tag_urdu');
            $table->string('product_size_eng')->nullable();
            $table->string('product_size_urdu')->nullable();
            $table->string('product_color_eng');
            $table->string('product_color_urdu');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->text('short_descp_eng');
            $table->text('short_descp_urdu');
            $table->text('long_descp_eng');
            $table->text('long_descp_urdu');
            $table->string('product_thambnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
           $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('category_id')->references('id')->on('catagories')->onDelete('cascade')->onUpdate('cascade');
         $table->foreign('subcategor_id')->references('id')->on('sub_catagories')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('subsubcategory_id')->references('id')->on('sub_sub_catagories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('products');
    }
}
