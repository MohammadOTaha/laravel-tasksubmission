<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return string
     */
    public function index()
    {
        $posts = Post::all();
        return view('post', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        Post::create([
            'description' => $request->description,
            'user_id' => 1
        ]);

        return redirect()->back();
    }
}
