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
    public function testShowPosts() {

        Post::factory()->count(5)->make();
        Livewire::test(ShowPosts::class)->render()->assertSee(Post::first()->title);
    }

    public function testPagination() {

    }
}
