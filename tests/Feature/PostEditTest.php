<?php

namespace Tests\Feature;

use App\Http\Livewire\PostEdit;
use App\Models\Post;
use App\Models\Tag;
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
        Livewire::test(PostEdit::class, ['post' => $post])->set("title", "foo")
            ->set("body", "boo")->assertSee("foo")->call("save")->assertStatus(200);
        $this->assertDatabaseHas('posts', ['title' => "foo"]);
        $this->assertDatabaseMissing('posts', ['title' => "bar"]);
    }

    public function testTags()
    {
        $this->actingAs(User::factory()->create());
        $post = Post::factory()->create(
            [
                'title' => "bar",
                'body' => "baz"
            ]
        );
        $tag1 = Tag::factory()->create(['name' => "tag1Foo"]);
        $tag2 = Tag::factory()->create(['name' => "tag2Foo"]);
        $post->tags()->attach([
            $tag1->id,
            $tag2->id
        ]);
        Livewire::test(PostEdit::class, ['post' => $post])->assertStatus(200)->assertSee("tag1Foo")->assertSee("tag2Foo");
    }
}
