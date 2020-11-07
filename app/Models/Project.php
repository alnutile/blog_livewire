<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    use HasFactory;

    protected $fillable = ['title', 'body', 'created_at', 'updated_at', 'photo_file_name', 'rendered_body'];

    public static $rules = [];

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }
}
