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
        Schema::create('truck_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('truck_id');
            $table->string('rc')->nullable();
            $table->string('rc_no')->nullable();
            $table->string('pollution')->nullable();
            $table->string('pollution_no')->nullable();
            $table->string('insurance')->nullable();
            $table->string('insurance_no')->nullable();
            $table->string('fitness_certificate')->nullable();
            $table->string('fitness_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truck_documents');
    }
};
