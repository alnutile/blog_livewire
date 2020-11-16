<?php

namespace App\Repositories;

use App\Http\Livewire\PostBase;
use App\Models\Post;
use App\Traits\MarkdownToHtml;
use App\Traits\TagsHelper;
use Carbon\Carbon;

class PostRepo
{
    use MarkdownToHtml;
    use TagsHelper;

    public function handle(PostBase $payload)
    {
        $post = Post::firstOrCreate(
            ['id' => $payload->id],
            [
                'active' => $payload->active,
                'title' => $payload->title,
                'body' => $payload->body,
                'scheduled' => ($payload->scheduled) ? Carbon::parse($payload->scheduled) : null,
                'rendered_body' => $this->transform($payload->body)
            ]
        );

        $this->handleTags($post, $payload->tags);
        return $post->refresh();
    }
}
