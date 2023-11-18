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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('phone')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('email')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('instagram')->nullable();
            $table->text('notes')->nullable();
            $table->text('notes1')->nullable();
            $table->text('notes2')->nullable();
            $table->text('notes3')->nullable();
            $table->text('notes4')->nullable();
            $table->text('notes5')->nullable();
            $table->text('notes6')->nullable();
            $table->text('notes7')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
