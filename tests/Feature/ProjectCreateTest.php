<?php

namespace Tests\Feature;

use App\Http\Livewire\ProjectCreate;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectCreateTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate()
    {
        $this->actingAs(User::factory()->create());
        Livewire::test(ProjectCreate::class)->set("title", "foo")
            ->set("body", "bar")->call("save");
        $this->assertTrue(Project::whereTitle("foo")->exists());
    }
}
