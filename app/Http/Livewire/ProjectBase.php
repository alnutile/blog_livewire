<?php

namespace App\Http\Livewire;

use Facades\App\Repositories\ProjectRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProjectBase extends Component
{

    /**
     * @var Post $post
     */
    public $post = null;
    public $title = "";
    public $body = "";
    public $tags = "";

    protected $rules = [
        'title' => 'required',
        'body' => 'required',
    ];

    public function save()
    {
        $this->validate([
            'photo_file_name' => 'image',
        ]);


        $post = ProjectRepo::handle($this);

        $url = sprintf("<a href=\"/projects/%s\">here</a>", $post->id);

        session()->flash("message", sprintf("%s %s %s", $this->message, $post->title, $url));

        return redirect()->to("/");
    }
}
