<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(5)->create();

        User::factory(10)->create()->each(function ($user) use ($categories) {
            Post::factory(rand(1,5))->create([
                'user_id' => $user->id,
                'category_id' => ($categories->random(1)->first())->id
            ])->each(function ($post) {
                Comment::factory(rand(1,3))->create([
                    'post_id' => $post->id,
                ]);
            });
        });
    }
}
