<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @coversDefaultClass \App\Models\Tag
 */
class TagTest extends TestCase
{

    use RefreshDatabase;

    public function testFactory()
    {
        $tag = Tag::factory()->create();
        $this->assertDatabaseHas('tags', $tag->toArray());
    }

    /**
     * @covers ::posts
     */
    public function testPosts()
    {
        $model = Tag::factory()
            ->hasAttached(
                Post::factory()
            )->create();

        $this->assertNotEmpty($model->posts->toArray());
    }

    /**
     * @covers ::projects
     */
    public function testProjects()
    {
        $model = Tag::factory()
            ->hasAttached(
                Project::factory()
            )->create();

        $this->assertNotEmpty($model->projects->toArray());
    }
}
