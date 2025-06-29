<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story_reaction extends Model
{
    //

    protected $fillable = [
        'user_id',
        'story_id',
        'reaction_type'
    ];
}