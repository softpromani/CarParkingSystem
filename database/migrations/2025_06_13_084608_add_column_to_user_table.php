<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('otp')->nullable()->after('status');
            $table->timestamp('otp_expires_at')->nullable()->after('otp');
        });
        Schema::table('parkings', function (Blueprint $table) {
            $table->string('heavy_vehicle_count')->nullable()->after('motorcycle_price');
            $table->timestamp('heavy_vehicle_price')->nullable()->after('heavy_vehicle_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('otp');
            $table->dropColumn('otp_expires_at');
        });
        Schema::table('parkings', function (Blueprint $table) {
            $table->dropColumn('heavy_vehicle_count');
            $table->dropColumn('heavy_vehicle_price');
        });
    }
};
