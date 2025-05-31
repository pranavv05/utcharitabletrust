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
        Schema::create('book_lists', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('bookName');
            $table->string('author');
            $table->string('class');
            $table->string('bookImage')->nullable();
            $table->integer('utbn');
            $table->enum('status', ['active', 'issue', 'lost', 'inactive', 'return'])->default('active');
            $table->timestamp('addedDate')->useCurrent();
            $table->uuid('customer_id')->nullable();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_lists');
    }
};
