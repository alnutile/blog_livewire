<?php

namespace Tests\Feature;

use App\Http\Livewire\ShowProjects;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowProjectsTest extends TestCase
{
    use RefreshDatabase;

    public function testShowProjects()
    {
        Project::factory()->count(5)->create(['title' => "bar"]);
        Livewire::test(ShowProjects::class)->assertSee("bar");
    }
}
