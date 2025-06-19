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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->unsignedBigInteger('owner_id')->nullable()->comment('came from users table');
            $table->unsignedBigInteger('driver_id')->nullable()->comment('came from users table');
            $table->unsignedBigInteger('model_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('color')->nullable();
            $table->integer('tyre')->default(2);
            $table->enum('type', ['bike', 'car', 'heavy-vehicle']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
