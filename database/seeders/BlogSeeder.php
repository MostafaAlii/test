<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('blogs')->truncate();
        for ($i = 0; $i < 2; $i++) {
            Blog::create([
                'section_id' => Section::all()->random()->id,
                'name' => fake()->name(),
                'notes' => fake()->paragraph(),
                'status' => true,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}