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
        Schema::create('saipan_orders', function (Blueprint $table) {
            $table->id();
            $table->string('saipan_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('amount')->nullable();
            $table->string('date_and_time');
            $table->string('status');
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
        Schema::dropIfExists('saipan_orders');
    }
};
