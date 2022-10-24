<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ongoing', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id');
            $table->integer('destination_id');
            $table->integer('status_id');
            $table->date('startingDate');
            $table->date('arrivalDate');
            $table->rememberToken();
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
        Schema::dropIfExists('ongoing');
    }
};
