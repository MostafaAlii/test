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
        Schema::table('free_orders', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('website')->unique()->nullable();
            $table->text('note1')->nullable();
            $table->text('note2')->nullable();
            $table->text('note3')->nullable();
            $table->text('note4')->nullable();
            $table->text('note5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('free_orders', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('website');
            $table->dropColumn('phone');
            $table->dropColumn('note1');
            $table->dropColumn('note2');
            $table->dropColumn('note3');
            $table->dropColumn('note4');
            $table->dropColumn('note5');
        });
    }
};