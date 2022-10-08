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
        Schema::create('saipans', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('slug');
            $table->string('sub_title');
            $table->longText('description');
            $table->integer('from');
            $table->text('google_map')->nullable();
            $table->text('features')->nullable();
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
        Schema::dropIfExists('saipans');
    }
};
