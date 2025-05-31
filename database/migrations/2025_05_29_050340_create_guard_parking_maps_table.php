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
        Schema::create('guard_parking_maps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guard_id')->nullable();
            $table->unsignedBigInteger('parking_id')->nullable();
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guard_parking_maps');
    }
};
