<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('sections')->truncate();
        for ($i = 0; $i < 2; $i++) {
            Section::create([
                'name' => fake()->name(),
                'notes' => fake()->paragraph(),
                'status' => fake()->boolean(),
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
