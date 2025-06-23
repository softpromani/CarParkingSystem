<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_no')->unique();
            $table->unsignedBigInteger('parking_id');
            $table->unsignedBigInteger('slot_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('vehicle_owner_id')->comment('id from user table');
            $table->unsignedBigInteger('booked_by')->comment('id from user table');
            $table->timestamp('booking_from_time');
            $table->timestamp('booking_to_time')->nullable();
            $table->timestamp('park_in')->nullable();
            $table->timestamp('park_out')->nullable();
            $table->unsignedBigInteger('park_in_by')->nullable();
            $table->unsignedBigInteger('park_out_by')->nullable();
            $table->bigInteger('total_parked_time')->default(0)->comment('in minute');
            $table->decimal('total_charge', 10, 2)->default(0.00);
            $table->json('price_breakup')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
