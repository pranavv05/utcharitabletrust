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
        Schema::create('booking_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('orderNo')->nullable();
            $table->uuid('booking_id')->nullable();
            $table
                ->foreign('booking_id')
                ->references('id')
                ->on('bookings')->nullOnDelete();
            $table->uuid('book_id')->nullable();
            $table
                ->foreign('book_id')
                ->references('id')
                ->on('book_lists')->nullOnDelete();
            $table->enum('status', ['active', 'inactive', 'deleted'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_items');
    }
};
