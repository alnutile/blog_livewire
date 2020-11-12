<?php

namespace Tests\Feature;

use App\Http\Livewire\PostCreate;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PostCreateTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate()
    {
        $this->actingAs(User::factory()->create());
        Livewire::test(PostCreate::class)->set("title", "foo")
            ->set("body", "bar")->call("save");
        $this->assertTrue(Post::whereTitle("foo")->exists());
    }
}
