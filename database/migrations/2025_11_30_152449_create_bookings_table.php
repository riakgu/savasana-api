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
            $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('client_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('service_id')->constrained()->onDelete('restrict');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->decimal('total_price', 10, 2);
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->enum('payment_method', ['cash', 'transfer'])->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
