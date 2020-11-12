<?php

namespace App\Repositories;

use App\Http\Livewire\PostCreate;
use App\Models\Post;
use Illuminate\Support\Arr;

class PostCreateRepo
{

  public function handle(PostCreate $payload)
  {
    $post = new Post();
    $post->active = $payload->active;
    $post->title = $payload->title;
    $post->body = $payload->body;
    $post->rendered_body = $payload->body;
    $post->save();
    //render the body
    //check the schedule
    //deal with tags
    //return $post;
    return $post;
  }
}
