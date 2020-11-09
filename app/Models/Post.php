<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;
use Laravel\Scout\Searchable;

class Post extends BaseModel
{

    use HasFactory;
    use Searchable;

    public $asYouType = true;

    // Add your validation rules here
    public static $rules = [
        'title' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = ['title', 'name', 'body', 'rendered_body', 'created_at', 'updated_at', 'active', 'scheduled'];

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }
}
