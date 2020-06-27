<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id')->default(0);
            $table->string('code',255)->default(null); // tùy biến mã khuyến mãi
            $table->string('type',255)->default(null); // lựa chọn kiểu giảm giá
            $table->integer('discount')->default(0); // Được giảm bao nhiêu 
            $table->integer('is_active')->default(1);
            $table->date('expiry_date',255); // ngày hết hạn mã
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
        Schema::dropIfExists('coupons');
    }
}
