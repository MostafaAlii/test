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
        Schema::table('buttons', function (Blueprint $table) {
            $table->string('url')->nullable();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('website')->nullable();
        });
        Schema::table('services', function (Blueprint $table) {
            $table->string('url')->nullable();
        });
        Schema::table('slides', function (Blueprint $table) {
            $table->string('url')->nullable();
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
        Schema::table('buttons', function (Blueprint $table) {
            $table->dropColumn('url');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('url');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('website');
        });

        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('url');
            $table->dropColumn('note1');
            $table->dropColumn('note2');
            $table->dropColumn('note3');
            $table->dropColumn('note4');
            $table->dropColumn('note5');
        });
    }
};