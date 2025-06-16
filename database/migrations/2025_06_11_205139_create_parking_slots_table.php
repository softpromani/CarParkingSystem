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
        Schema::create('parking_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parking_id'); // Reference to the parent parking area
            $table->string('type');                   // car, bike, heavy, road-horizontal, road-vertical, entry, exit
            $table->string('label')->nullable();
            $table->integer('x')->default(0);
            $table->integer('y')->default(0);
            $table->integer('width')->default(100);
            $table->integer('height')->default(60);
            $table->integer('rotation')->default(0);
            $table->enum('status', ['available', 'booked', 'reserved'])->default('available');
            $table->timestamps();

            $table->foreign('parking_id')->references('id')->on('parkings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_slots');
    }
};
