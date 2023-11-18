<?php
namespace Database\Seeders;
use App\Models\ImgExtension;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB,Schema};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class ImgExtensionSeeder extends Seeder {
    public function run(): void {
        Schema::disableForeignKeyConstraints();
        DB::table('img_extensions')->truncate();
        $extensions = [
            ['ext' => 'jpg', 'description' => 'JPEG Image'],
            ['ext' => 'png', 'description' => 'PNG Image'],
        ];
        foreach ($extensions as $extension) {
            ImgExtension::create($extension);
        }
        Schema::enableForeignKeyConstraints();
    }
}