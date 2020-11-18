<?php

namespace App\Repositories;

use App\Http\Livewire\ProjectBase;
use App\Models\Project;
use App\Traits\MarkdownToHtml;
use App\Traits\TagsHelper;

class ProjectRepo
{
    use MarkdownToHtml;
    use TagsHelper;

    public function handle(ProjectBase $payload)
    {
        /** $id is reserved so I had trouble checking for that */
        $model = Project::updateOrCreate(
            ['id' => optional($payload->post)->id],
            [
                'title' => $payload->title,
                'body' => $payload->body,
                'rendered_body' => $this->transform($payload->body)
            ]
        );

        $this->handleTags($model, $payload->tags);
        return $model->refresh();
    }
}
