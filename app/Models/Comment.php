<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Post;

class Comment extends Model
{
    protected $fillable = array('title', 'body', 'user_id', 'post_id');

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
}
