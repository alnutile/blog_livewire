<?php

namespace App\Repositories;

use App\Http\Livewire\PostCreate;
use App\Models\Post;
use App\Traits\MarkdownToHtml;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class PostCreateRepo
{

  use MarkdownToHtml;

  public function handle(PostCreate $payload)
  {
    $post = new Post();
    $post->active = $payload->active;
    $post->title = $payload->title;
    $post->body = $payload->body;
    $post->scheduled = ($payload->scheduled) ? Carbon::parse($payload->scheduled) : null;
    $post->rendered_body = $this->transform($payload->body);
    $post->save();
    //deal with tags
    return $post;
  }
}
