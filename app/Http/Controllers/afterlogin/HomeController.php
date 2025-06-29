<?php

namespace App\Http\Controllers\afterlogin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\Story;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class HomeController extends Controller
{
    //



    public function home()
    {
        $posts = Post::with([
            'getReaction',
            'getComment' => function ($q) {
                $q->orderBy('id', 'desc');
            },
            'getUser'
        ])
            ->withCount(['getReaction', 'getComment'])

            ->get();



        $userId = auth()->id(); // Get current user's ID

        $stories = Story::with(['getUser'])
            ->orderByRaw("user_id = ? desc", [$userId]) // This puts current user's stories first
            ->orderBy('created_at', 'desc')
            ->get();


        // dd($stories);

        return view('afterlogin.home', compact('posts', 'stories'));
    }
}