<?php

namespace Tests\Feature;

use App\Http\Livewire\PostEdit;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PostEditTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate()
    {
        $this->actingAs(User::factory()->create());
        $post = Post::factory()->create(
            [
                'title' => "bar",
                'body' => "baz"
            ]
        );
        Livewire::test(PostEdit::class)->set("title", "foo")
            ->set("body", "boo")->assertSee("foo")->call("save")->assertStatus(200);
        $this->assertTrue(Post::whereTitle("foo")->exists());
    }
}
