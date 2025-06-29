<?php

namespace App\Http\Controllers\afterlogin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Auth;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

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
                'story' => $story,
                'user_id' => Auth()->user()->id
            ]);

        }

        return response()->json(['data' => $story]);


    }


    public function view(Request $request)
    {

        return $this->viewStories($request);
    }
    private function viewStories(Request $request)
    {


        $stories = Story::with(["getUser"])->where("id", $request->id)->latest()->paginate(20);
        return view('afterlogin.story.view', compact('stories'));
    }
}