<?php

namespace Tests\Feature;

use App\Http\Livewire\ProjectCreate;
use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectCreateTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate()
    {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('foo.png');


        $this->actingAs(User::factory()->create());

        Livewire::test(ProjectCreate::class)
            ->set('photo_file_name', $file)
            ->set("title", "foo")
            ->set("body", "bar")->call("save");
        $this->assertTrue(Project::whereTitle("foo")->exists());
        $this->assertTrue(Project::where(
            "photo_file_name",
            "foo.png"
        )->exists());
        Storage::disk("public")->assertExists('foo.png');
    }
}
