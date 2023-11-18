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
        Schema::create('free_orders', function (Blueprint $table) {
            $table->id();
            $table->json('order_service_id')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->enum('type', ['waiting', 'progress', 'completed'])->nullable();
            $table->boolean('show')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('free_orders');
    }
};