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
        Schema::create('taxis', function (Blueprint $table) {
            $table->id();
            $table->integer('pick_up_id');
            $table->integer('drop_off_id');
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
        Schema::dropIfExists('taxis');
    }
};
