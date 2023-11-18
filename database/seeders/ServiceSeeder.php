<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('services')->truncate();
        for ($i = 0; $i < 8; $i++) {
            Service::create([
                'price' => fake()->numberBetween(10,60),
                'name' => fake()->name(),
                'notes' => fake()->paragraph(),
                'status' => true,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}