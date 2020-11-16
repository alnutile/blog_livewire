<?php

namespace Tests\Feature;

use App\Http\Livewire\PostCreate;
use App\Models\Post;
use Carbon\Carbon;
use Facades\App\Repositories\PostRepo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostRepoTest extends TestCase
{
    use RefreshDatabase;

    public function testPostCreateActive()
    {
        $payload = new PostCreate();
        $payload->title = "foo bar";
        $payload->body = "## Foo \n baz";
        $payload->active = true;

        $results = PostRepo::handle($payload);

        $this->assertInstanceOf(Post::class, $results);
        $this->assertEquals("foo bar", $results->title);
        $this->assertEquals("## Foo \n baz", $results->body);
        $this->assertEquals(1, $results->active);
        $this->assertNotNull($results->rendered_body);
    }

    public function testPostCreateMarkdown()
    {
        $payload = new PostCreate();
        $payload->title = "foo bar";
        $payload->body = "## Foo \n baz";
        $payload->active = true;

        $results = PostRepo::handle($payload);

        $this->assertEquals("<h2>Foo</h2>\n<p>baz</p>\n", $results->rendered_body);
    }

    public function testPostCreateTags()
    {
        $payload = new PostCreate();
        $payload->title = "foo bar";
        $payload->tags = "foo,bar";
        $payload->scheduled = Carbon::now();
        $payload->body = "## Foo \n baz";
        $payload->active = true;
        $results = PostRepo::handle($payload);
        $this->assertCount(2, $results->refresh()->tags);
    }

    public function testPostCreateScheduled()
    {
        $payload = new PostCreate();
        $payload->title = "foo bar";
        $payload->scheduled = Carbon::now();
        $payload->body = "## Foo \n baz";
        $payload->active = true;
        $results = PostRepo::handle($payload);
        $this->assertNotNull($results->scheduled);
        $this->assertInstanceOf(Carbon::class, $results->scheduled);
    }
}
