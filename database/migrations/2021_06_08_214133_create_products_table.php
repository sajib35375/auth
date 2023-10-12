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
            $table->integer('subcategory_id');
            $table->integer('sub_subcategory_id');
            $table->string('product_name_eng');
            $table->string('product_name_ban');
            $table->string('product_slug_eng');
            $table->string('product_slug_ban');
            $table->string('product_code');
            $table->integer('product_quantity');
            $table->string('product_tags_eng');
            $table->string('product_tags_ban');
            $table->string('product_size_eng')->nullable();
            $table->string('product_size_ban')->nullable();
            $table->string('product_color_eng');
            $table->string('product_color_ban');
            $table->integer('product_selling_price');
            $table->integer('product_discount_price')->nullable();
            $table->text('product_short_des_eng');
            $table->text('product_short_des_ban');
            $table->longText('product_long_des_eng');
            $table->longText('product_long_des_ban');
            $table->text('product_thumbnail')->nullable();
            $table->text('featured')->nullable();
            $table->integer('hot_deals')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
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
