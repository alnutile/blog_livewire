<?php

namespace Tests\Unit;

use App\Models\Project;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @coversDefaultClass \App\Models\Project
 */
class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function testFactory()
    {
        $project = Project::factory()->create();
        $this->assertDatabaseHas('projects', $project->toArray());
    }

    /**
     * @covers ::tags
     */
    public function testTags()
    {
        $project = Project::factory()
            ->hasAttached(
                Tag::factory()->count(3)
            )->create();

        $this->assertNotEmpty($project->tags());
        $this->assertCount(3, $project->tags->toArray());
    }
}
