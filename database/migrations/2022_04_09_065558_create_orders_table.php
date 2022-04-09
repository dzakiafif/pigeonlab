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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('driver_id')->index();
            $table->decimal('lat_from', 11, 8)->nullable();
            $table->decimal('lng_from', 11, 8)->nullable();
            $table->decimal('lat_to', 11, 8)->nullable();
            $table->decimal('lng_to', 11, 8)->nullable();
            $table->enum('status', [0, 1, 2])->index();
            $table->dateTime('accepted_at')->nullable();
            $table->dateTime('rejected_at')->nullable();
            $table->dateTime('estimation_at');
            $table->unsignedInteger('estimation_cost');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('driver_id')->references('id')->on('drivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
