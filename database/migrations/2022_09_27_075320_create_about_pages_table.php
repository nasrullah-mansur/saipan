<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_banner_image');
            $table->string('taxi_title');
            $table->longText('taxi_description');
            $table->string('taxi_image');
            $table->string('saipan_title');
            $table->longText('saipan_description');
            $table->string('saipan_image');
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
        Schema::dropIfExists('about_pages');
    }
};
