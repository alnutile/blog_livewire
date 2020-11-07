<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'created_at', 'updated_at'];
    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(\App\Models\Post::class);
    }

    public function projects()
    {
        return $this->belongsToMany(\App\Models\Project::class);
    }
}
