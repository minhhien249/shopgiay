<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->index()->collation('utf8_unicode_ci');
            $table->string('image',255)->collation('utf8_unicode_ci')->nullable();
            $table->integer('position')->default(0);
            $table->integer('is_active')->default(1);
            $table->integer('product_id')->default(0);
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
        Schema::dropIfExists('products_image');
    }
}
