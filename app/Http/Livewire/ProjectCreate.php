<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProjectCreate extends ProjectBase
{
    public $message = "Project Created";

    public function render()
    {
        return view('livewire.project-form');
    }
}
