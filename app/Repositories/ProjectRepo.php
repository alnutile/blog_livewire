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
        $name = optional($payload->photo_file_name)->getClientOriginalName();
        optional($payload->photo_file_name)->storeAs('/', $name, 'public');
        /** $id is reserved so I had trouble checking for that */
        $model = Project::updateOrCreate(
            ['id' => optional($payload->post)->id],
            [
                'title' => $payload->title,
                'photo_file_name' => $name,
                'body' => $payload->body,
                'rendered_body' => $this->transform($payload->body)
            ]
        );

        $this->handleTags($model, $payload->tags);
        return $model->refresh();
    }
}
