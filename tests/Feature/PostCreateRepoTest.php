<?php

namespace Tests\Feature;

use App\Http\Livewire\PostCreate;
use App\Models\Post;
use Facades\App\Repositories\PostCreateRepo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCreateRepoTest extends TestCase
{
    use RefreshDatabase;

    public function testPostCreateActive()
    {
        $payload = new PostCreate();
        $payload->title = "foo bar";
        $payload->body = "## Foo \n baz";
        $payload->active = true;

        $results = PostCreateRepo::handle($payload);

        $this->assertInstanceOf(Post::class, $results);
        $this->assertEquals("foo bar", $results->title);
        $this->assertEquals("## Foo \n baz", $results->body);
        $this->assertEquals(1, $results->active);
        $this->assertNotNull($results->rendered_body);
    }

    public function testPostCreateMarkdown()
    {
    }

    public function testPostCreateNotActive()
    {
    }

    public function testPostCreateScheduled()
    {
    }
}
