<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchPosts;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchPostsTest extends TestCase
{
    use RefreshDatabase;

    public function testResults()
    {
        Post::factory()->count(3)->create();
        Post::factory()->create(['title' => "FooBar"]);
        Livewire::test(SearchPosts::class)->assertSee("FooBar");
    }
}
