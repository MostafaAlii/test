<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{User,Service, Blog};
class CommentFactory extends Factory {
    public function definition(): array {
        $activeUsers = User::active()->pluck('id')->toArray();
        $activeServices = Service::active()->pluck('id')->toArray();
        $activeBlogs = Blog::active()->pluck('id')->toArray();

        $user_id = $activeUsers[array_rand($activeUsers)];
        $commentable_type = rand(0, 1) ? 'App\Models\Service' : 'App\Models\Blog';
        $commentable_id = $commentable_type === 'Service' ?
            $activeServices[array_rand($activeServices)] :
            $activeBlogs[array_rand($activeBlogs)];

        return [
            'user_id' => $user_id,
            'body' => $this->faker->paragraph,
            'status' => 1,
            'commentable_type' => $commentable_type,
            'commentable_id' => $commentable_id,
        ];
    }
}
