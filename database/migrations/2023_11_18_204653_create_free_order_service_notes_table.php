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
        Schema::create('free_order_service_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('free_order_id')->constrained('free_orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('order_service_id')->constrained('order_services')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('free_order_service_notes');
    }
};