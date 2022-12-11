<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getBodyHtmlAttribute()
    {
        return Str::markdown($this->body);
    }
}
