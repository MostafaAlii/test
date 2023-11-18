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
        Schema::create('free_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('free_order_id')->constrained('free_orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('order_service_id')->nullable();
            $table->integer('price_offer')->nullable();
            $table->integer('photo_count');
            $table->decimal('total', 8, 2);
            $table->unsignedTinyInteger('order_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('free_order_details');
    }
};