<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class UserTableSeeder extends Seeder {
    use WithoutModelEvents;
    public function run() {
        $user = User::create([
            'name' => 'Normal User',
            'email' => 'user@app.com',
            'type' => 'user',
            'status' => true,
            'password' => bcrypt('123123'),
        ]);

        $user = User::create([
            'name' => 'General User',
            'email' => 'general@app.com',
            'type' => 'general',
            'status' => true,
            'password' => bcrypt('123123'),
        ]);
    }
}
