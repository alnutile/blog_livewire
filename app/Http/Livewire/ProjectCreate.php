<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectCreate extends ProjectBase
{
    use WithFileUploads;

    public $photo_file_name;

    public $message = "Project Created";

    public function render()
    {
        return view('livewire.project-form');
    }
}
