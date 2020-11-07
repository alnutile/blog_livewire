<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @coversDefaultClass \App\Models\Post
 */
class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testFactory()
    {
        $posts = Post::factory()->create();
        $this->assertDatabaseHas('posts', $posts->toArray());
    }

    /**
     * @covers ::tags
     */
    public function testTags()
    {
        $model = Post::factory()
            ->hasAttached(
                Tag::factory()->count(3)
            )->create();

        $this->assertNotEmpty($model->tags());
        $this->assertCount(3, $model->tags->toArray());
    }
}
