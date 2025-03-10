<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'user_id',
        'caption',
        'location',
        'situation,',
        'tagged_user_id',
        'content',
        'visibility',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getReaction()
    {
        return $this->hasMany(Reaction::class);
    }

    public function getComment()
    {
        return $this->hasMany(Comment::class);
    }
}
