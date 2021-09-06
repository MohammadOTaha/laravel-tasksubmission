<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user_id) {
        $user_posts = Post::all()->where('user_id', '=', $user_id);
        $name = User::find($user_id)->name;
        $profile_desc = User::find($user_id)->profile_desc;
        return view('profile',
        [
            'posts' => $user_posts,
            'name' => $name,
            'desc' => $profile_desc,
            'user_id' => $user_id
        ]);
    }
}
