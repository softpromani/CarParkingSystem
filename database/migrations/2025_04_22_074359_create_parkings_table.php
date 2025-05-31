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
        Schema::create('parkings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->string('car_count')->nullable();
            $table->string('motorcycle_count')->nullable();
            $table->string('totalspace_count')->nullable();
            $table->decimal('car_price',10,2)->nullable();
            $table->decimal('motorcycle_price',10,2)->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
             $table->decimal('charge_unit',10,2)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('created_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkings');
    }
};
