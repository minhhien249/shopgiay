<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->collation('utf8_unicode_ci');// tiêu đề bài viết
            $table->string('image',255)->nullable()->default(null);// ảnh bài viết
            $table->string('user_id')->nullable()->default(null);// tác giả
            $table->string('url')->nullable()->default(null); // link url tùy chỉnh
            $table->integer('position')->default(0); // vi trí
            $table->integer('is_active')->default(1); // trạng thái
            $table->text('description')->collation('utf8mb4_unicode_ci')->nullable(); // chi tiết bài viết
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
        Schema::dropIfExists('blogs');
    }
}
