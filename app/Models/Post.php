<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Comment;

class Post extends Model
{
    protected $fillable = array('user_id', 'title', 'body');

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Comment()
    {
        return $this->hasMany(Comment::class);
    }
}
