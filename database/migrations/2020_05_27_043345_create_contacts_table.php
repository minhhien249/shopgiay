<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255)->collation('utf8_unicode_ci')->nullable()->default(null);
            $table->integer('contact')->collation('utf8_unicode_ci')->nullable()->default(null);
            $table->string('address',255)->collation('utf8_unicode_ci')->nullable()->default(null);
            $table->string('description',255)->collation('utf8_unicode_ci')->nullable()->default(null);
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
        Schema::dropIfExists('contacts');
    }
}
