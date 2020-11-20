<?php

namespace App\Http\Livewire;

use Facades\App\Repositories\PostRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends PostBase
{


    public $message = "Post Created";

    public function render()
    {
        return view('livewire.post-form');
    }
}
