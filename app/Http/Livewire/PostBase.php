<?php

namespace App\Http\Livewire;

use Facades\App\Repositories\PostRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PostBase extends Component
{

  /**
   * @var Post $post
   */
    public $post = null;
    public $title = "";
    public $body = "";
    public $active = 1;
    public $scheduled = null;
    public $tags = "";

    protected $rules = [
    'title' => 'required',
    'body' => 'required',
    ];

    public function save()
    {
        $this->validate();

        $post = PostRepo::handle($this);

        $url = sprintf("<a href=\"/posts/%s\">here</a>", $post->id);

        session()->flash("message", sprintf("%s %s %s", $this->message, $post->title, $url));

        return redirect()->to("/");
    }
}
