<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['post_id', 'user_id', 'comment'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getPost()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
