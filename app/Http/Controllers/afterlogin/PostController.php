<?php

namespace App\Http\Controllers\afterlogin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function createPost(Request $request)
    {
        $request->validate([
            'content' => 'required|mimes:png,jpg,webp',
        ]);


        // Create a new post in the database
        $content = null;
        if ($request->has('content')) {
            $content = $request->file('content')->store('posts', 'public');
        }
        Post::create([
            'user_id' => Auth::user()->id,
            'tagged_user_id' => json_encode($request->tagged_user),
            'location' => $request->location,
            'situation' => $request->situation,
            'content' => $content,
            'caption' => $request->caption,
            'visibility' => $request->visibility,
        ]);

        return back()->with('success', 'Post created successfully');
    }



    public function setReaction(Request $request)
    {


        $react = Reaction::where("user_id", auth()->user()->id)->where("post_id", $request->postId)->first();

        $reactCount = Reaction::where("post_id", $request->postId)->count();

        if ($react && $react->reaction_type == $request->reaction) {
            $react->delete();
            return response()->json([
                'success' => 'Reaction removed successfully',
                'reaction' => 'defaulticon',
                'reactCount' => $reactCount - 1
            ]);
        } elseif ($react) {
            $react->reaction_type = $request->reaction;
            $react->save();
        } else {

            $react = Reaction::create([
                'post_id' => $request->postId,
                'user_id' => Auth::user()->id,
                'reaction_type' => $request->reaction,
            ]);
            $reactCount++;
        }

        return response()->json(['success' => 'Reaction saved successfully', 'reaction' => $request->reaction, 'reactCount' => $reactCount]);
    }
}
