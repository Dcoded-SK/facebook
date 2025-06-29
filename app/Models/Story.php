<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Story extends Model
{
    //

    protected $fillable = ['story', 'user_id'];


    public function getStoryReaction()
    {
        return $this->hasMany(Story_reaction::class, 'story_id', 'id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, foreignKey: 'user_id', ownerKey: 'id');
    }

}