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
        Schema::create('booking_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->decimal('amount', 10, 2);
            $table->decimal('discount', 10, 2)->default(0.00);
            $table->decimal('amount_to_pay', 10, 2);
            $table->decimal('paid_amount', 10, 2)->default(0.00);
            $table->string('payment_mode')->nullable();
            $table->string('transaction_no')->nullable();
            $table->unsignedBigInteger('collect_by')->nullable()->comment('user id from users table');
            $table->enum('status', ['paid', 'unpaid', 'partial-paid'])->default('unpaid');
            $table->boolean('is_submitted_to_admin')->default(false);
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_invoices');
    }
};
