<?php

namespace Tests\Feature;

use App\Http\Livewire\ShowPosts;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowPostsTest extends TestCase
{
    use RefreshDatabase;

    public function testShowPosts()
    {

        Post::factory()->count(5)->create(['title' => "bar"]);
        Livewire::test(ShowPosts::class)->assertSee("bar");
    }

    public function testSearch()
    {
        Post::factory()->count(5)->create(['title' => "bar"]);
        Livewire::test(ShowPosts::class)->set('search', 'foo')->assertDontSee("foo");
        Livewire::test(ShowPosts::class)->set('search', 'bar')->assertSee("bar");
    }
}
