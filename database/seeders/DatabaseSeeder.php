<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Button;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        Button::create([
            'name' => "paypal",
            'type' => 'payment',
            'status' => true,
            'typePaymernts' => "paypal",
        ]);

        Button::create([
            'name' => "paypal",
            'type' => 'payment',
            'status' => true,
            'typePaymernts' => "later",
        ]);

        Button::create([
            'name' => "paypal",
            'type' => 'payment',
            'status' => false,
            'typePaymernts' => "checkout",
        ]);




        // $this->call([
        //     UserTableSeeder::class,
        //     AdminTableSeeder::class,
        //     SettingSeeder::class,
        //     SliderSeeder::class,
        //     SectionSeeder::class,
        //     BlogSeeder::class,
        //     ServiceSeeder::class,
        //     PackageSeeder::class,
        //     ImgExtensionSeeder::class,
        //     OrderServiceTimesSeeder::class,
        // ]);
    }
}