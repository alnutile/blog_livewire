<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchableTest extends TestCase
{

    use RefreshDatabase;

    public function testSearch()
    {
        Post::factory()->count(3)->create();
        Post::factory()->create(
            ['title' => "FooBar"]
        );
        $results = Post::search("FooBar")->get();
        $this->assertEquals($results->first()->title, "FooBar");
    }
}
