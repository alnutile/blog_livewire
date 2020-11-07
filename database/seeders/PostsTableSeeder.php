<?php

namespace Database\Seeder;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Post::class, 22)->create();

        $posts = \App\Models\Project::all();

        $tags = \App\Models\Tag::all()->get('id');

        foreach ($posts as $post) {
            $post->tags()->attach($tags);
        }
    }
}
