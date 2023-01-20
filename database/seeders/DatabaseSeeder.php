<?php

namespace Database\Seeders;

use App\Models\Category;
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
        Category::truncate();
        Post::truncate();
        User::truncate();
        

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        $hobby =Category::create([
            'name' => 'Hobby',
            'slug' => 'hobby',
        ]);

          
        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My First Post',
            'slug' => 'my-first-post',
            'excerpt' => '<p>Lorem ipsum.</p>',
            'body' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda ut rem qui, id error delectus inventore dolorem veritatis quia voluptas. Dolorem dolorum voluptate adipisci in nisi veniam maxime voluptatibus dolor?</p>"
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>Lorem ipsum.</p>',
            'body' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda ut rem qui, id error delectus inventore dolorem veritatis quia voluptas. Dolorem dolorum voluptate adipisci in nisi veniam maxime voluptatibus dolor?</p>"
        ]);

    }
}
// 