<?php

namespace App\Http\Controllers\afterlogin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    //

    public function create(Request $request)
    {
        $request->validate(
            [
                'story' => 'required|mimes:jpg,png,webp',
            ]
        );

        if ($request->has('story')) {
            $story = $request->file('story')->store('story', 'public');
        }

        if ($story) {
            $story = Story::create([
                'story' => $story
            ]);

        }

        return response()->json(['data' => $story]);


    }
}