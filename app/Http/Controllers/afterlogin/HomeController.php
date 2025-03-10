<?php

namespace App\Http\Controllers\afterlogin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home()
    {
        $posts = Post::with(['getReaction', 'getComment', 'getUser'])
            ->withCount(['getReaction', 'getComment'])

            ->get();

        $reactions = Reaction::with('getUser')->get();
        return view('afterlogin.home', compact('posts'));
    }
}
