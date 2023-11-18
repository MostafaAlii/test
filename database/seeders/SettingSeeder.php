<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('settings')->truncate();
        Setting::create([
            'name'=> fake()->name(),
            'phone' => fake()->phoneNumber(),
            'whatsapp' => fake()->phoneNumber(),
            'email' => fake()->unique()->email(),
            'facebook' => fake()->unique()->url(),
            'twitter' => fake()->unique()->url(),
            'instagram' => fake()->unique()->url(),
            'notes'=> fake()->paragraph(),
            'notes1'=> null,
            'notes2'=> null,
            'notes3'=> null,
            'notes4'=> null,
            'notes5'=> null,
            'notes6'=> null,
            'notes7'=> null,
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
