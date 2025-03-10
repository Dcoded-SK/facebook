<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    //

    protected $fillable = ['reaction_type', 'user_id', 'post_id'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getPost()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
