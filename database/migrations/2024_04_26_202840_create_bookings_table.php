<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Use a try-catch block to catch any exceptions
        try {
            Schema::create('bookings', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('user_id');
                $table->integer('room_number');
                $table->date('check_in_date');
                $table->date('check_out_date');
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
            });
        } catch (\Exception $e) {
            // If an exception occurs, throw a new exception with a custom error message
            throw new \Exception('Failed to create bookings table: ' . $e->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
}

