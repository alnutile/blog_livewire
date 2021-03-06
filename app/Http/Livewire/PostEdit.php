<?php

namespace App\Http\Livewire;

use App\Models\Post;

class PostEdit extends PostBase
{

    public $message = "Post Updated";

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->active = $post->active;
        $this->tags = collect($post->tags->toArray())->implode("name", ",");
        $this->scheduled = $post->scheduled;
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}
