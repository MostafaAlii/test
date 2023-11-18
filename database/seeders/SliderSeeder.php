<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('sliders')->truncate();
        for ($i = 0; $i < 2; $i++) {
            Slider::create([
                'name' => fake()->name(),
                'notes' => fake()->paragraph(),
                'status' => fake()->boolean(),
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
