<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('packages')->truncate();
        for ($i = 0; $i < 2; $i++) {
            Package::create([
                'service_id'=> Service::all()->random()->id,
                'name' => fake()->name(),
                'notes' => fake()->paragraph(),
                'status' => fake()->boolean(),
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
