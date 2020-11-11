<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Arr;

class PostCreateRepo
{

    public function handle($payload)
    {
        $post = new Post();
        $post->active = Arr::get($payload, 'active', 0);
        $post->title = Arr::get($payload, 'title');
        $post->body = Arr::get($payload, 'body');
        $post->rendered_body = Arr::get($payload, 'body');
      //render the body
      //check the schedule
      //deal with tags
      //return $post;
        return $post;
    }
}
