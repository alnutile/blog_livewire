<?php

namespace Tests\Feature;

use App\Http\Livewire\ProjectCreate;
use Facades\App\Repositories\ProjectRepo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;
use Carbon\Carbon;

class ProjectRepoTest extends TestCase
{
    use RefreshDatabase;

    public function testProjectCreate()
    {
        $payload = new ProjectCreate();
        $payload->title = "Foo Bar";
        $payload->body = "## Foo \n baz";

        $results = ProjectRepo::handle($payload);
        $this->assertInstanceOf(Project::class, $results);
        $this->assertEquals("Foo Bar", $results->title);
        $this->assertEquals("## Foo \n baz", $results->body);
        $this->assertNotNull($results->rendered_body);
    }

    public function testProjectCreateMarkdown()
    {
        $payload = new ProjectCreate();
        $payload->title = "foo bar";
        $payload->body = "## Foo \n baz";
        $payload->active = true;

        $results = ProjectRepo::handle($payload);

        $this->assertEquals("<h2>Foo</h2>\n<p>baz</p>\n", $results->rendered_body);
    }

    public function testProjectCreateTags()
    {
        $payload = new ProjectCreate();
        $payload->title = "foo bar";
        $payload->tags = "foo,bar";
        $payload->body = "## Foo \n baz";
        $results = ProjectRepo::handle($payload);
        $this->assertCount(2, $results->refresh()->tags);
    }
}
