<?php

namespace Tests\Feature;

use Facades\App\Repositories\PostCreateRepo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCreateRepoTest extends TestCase
{
    use RefreshDatabase;

    public function testPostCreateActive()
    {
        $payload = [
            'title' => "foo bar",
            'body' => "## Foo \n baz",
            'active' => true
        ];
        $results = PostCreateRepo::handle($payload);

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
