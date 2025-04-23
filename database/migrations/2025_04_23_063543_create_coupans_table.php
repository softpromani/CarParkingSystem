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
        Schema::create('coupans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('discount_type');
            $table->string('discount');
            $table->string('image')->nullable();
            $table->string('code');
            $table->string('coupan_type');
            $table->unsignedBigInteger('parking_id')->nullable();
            $table->longText('user_id')->nullable();
            $table->dateTime('validity');
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupans');
    }
};
