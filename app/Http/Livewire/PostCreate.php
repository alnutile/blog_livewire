<?php

namespace App\Http\Livewire;

use Facades\App\Repositories\PostCreateRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PostCreate extends Component
{

    public $title;
    public $body;
    public $active = 1;
    public $scheduled = null;
    public $tags;

    protected $rules = [
        'title' => 'required',
        'body' => 'required',
    ];

    public function save()
    {
        $this->validate();

        $post = PostCreateRepo::handle($this);

        $url = sprintf("<a href=\"/posts/%s\">here</a>", $post->id);
        session()->flash("message", sprintf("Post Created %s %s", $post->title, $url));

        return redirect()->to("/");
    }

    public function render()
    {
        return view('livewire.post-create');
    }
}
