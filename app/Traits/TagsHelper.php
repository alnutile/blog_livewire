<?php


namespace App\Traits;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait TagsHelper
{

    public function handleTags(Model $model, string $tags = null)
    {
        if ($tags != null) {
            $tagsToAttach = [];
            $tagsArray = explode(",", $tags);
            foreach ($tagsArray as $tag) {
                $tagsToAttach[] = Tag::firstOrCreate(
                    ['name' => trim($tag)]
                )->id;
            }
            $model->tags()->sync($tagsToAttach);
        }
    }
}
