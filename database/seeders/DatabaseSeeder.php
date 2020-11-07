<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Tag;
use Database\Seeder\PostsTableSeeder;
use Database\Seeder\UserSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class, PostsTableSeeder::class]);

        Tag::factory()->count(5)->create();

        Project::factory()->count(30)->create();

        $projects = \App\Models\Project::all();

        $tags = \App\Models\Tag::all()->get('id');

        foreach ($projects as $project) {
            $project->tags()->attach($tags);
        }
    }
}
