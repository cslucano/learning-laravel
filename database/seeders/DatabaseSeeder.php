<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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
        $user = User::factory()->create([
            'name' => 'Carlos Salvatierra',
            'username' => 'cslucano',
            'email' => 'cslucano@hotmail.com',
            'password' => '12345678',
        ]);

        $posts = Post::factory(5)->create([
            'user_id' => $user->id,
        ]);
        Post::factory(5)->create();

        foreach ($posts as $post) {
            $comments = Comment::factory(5)->create([
                'post_id' => $post->id,
                'user_id' => $post->user_id,
            ]);
        }
    }
}
//
