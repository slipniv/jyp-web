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
        Schema::create('overdue', function (Blueprint $table) {
            $table->id();
            $table->integer('deliver_id');
            $table->integer('driver_id');
            $table->integer('destination_id');
            $table->integer('status_id');
            $table->date('overdate');
            $table->time('overtime');
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
        //
    }
};
