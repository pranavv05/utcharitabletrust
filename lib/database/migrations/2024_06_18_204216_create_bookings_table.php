<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('orderNo')->unique();
            $table->date('issueDate');
            $table->date('endDate');
            $table->date('returnDate')->nullable();
            $table->string('penaltyAmount')->nullable();
            $table->text('penaltyReason')->nullable();
            $table->uuid('customer_id')->nullable();
            $table->string('ref_orderNo')->nullable();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')->nullOnDelete();
            $table->enum('status', ['active', 'issue', 'lost', 'inactive', 'return', 'new', 'partial_return'])->default('active');
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
