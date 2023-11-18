<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB, Schema};
class OrderServiceTimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('order_service_times')->truncate();
        DB::table('order_service_times')->insert([
            [
                'name' => 'Time 1 $10',
                'notes' => 'Notes for Time 1',
                'status' => true,
            ],
            [
                'name' => 'Time 2',
                'notes' => 'Notes for Time 2',
                'status' => true,
            ],
            [
                'name' => 'Time 3',
                'notes' => 'Notes for Time 3',
                'status' => true,
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}