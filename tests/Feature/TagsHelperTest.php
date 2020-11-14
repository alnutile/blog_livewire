<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Tag;
use App\Traits\TagsHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagsHelperTest extends TestCase
{
    use RefreshDatabase;
    use TagsHelper;

    public function testNewTags()
    {
        $post = Post::factory()->create();

        $this->handleTags($post, "foo, bar");

        $this->assertDatabaseHas('tags', ['name' => 'foo']);
    }

    public function testOkWithNull()
    {
        $post = Post::factory()->create();

        $this->handleTags($post, null);

        $this->assertDatabaseCount('tags', 0);
    }

    public function testWillSync()
    {
        $post = Post::factory()->create();

        Tag::factory()->create(['name' => "bar"]);

        $this->handleTags($post, "foo, bar");

        $this->assertCount(2, $post->refresh()->tags);

        $this->handleTags($post, "foo");

        $this->assertCount(1, $post->refresh()->tags);
    }

    public function testWillNotRepeat()
    {
        $post = Post::factory()->create();

        Tag::factory()->create(['name' => "bar"]);

        $this->handleTags($post, "foo, bar");

        $this->assertDatabaseCount('tags', 2);
    }
}
