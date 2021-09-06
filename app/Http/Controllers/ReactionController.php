<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public function storeLike($post_id) {
        $post = Post::find($post_id);
        if($post -> reaction == null) {
            $post -> likes_count++;
            $post -> reaction = 1;
        }
        else if($post -> reaction == 1){
            $post -> likes_count--;
            $post -> reaction = null;
        }
        else if($post -> reaction == 0){
            $post -> dislikes_count--;
            $post -> likes_count++;
            $post -> reaction = 1;
        }

        $post->save();
        return redirect()->back();
    }

    public function storeDislike($post_id) {
        $post = Post::find($post_id);
        if($post -> reaction == null) {
            $post -> dislikes_count++;
            $post -> reaction = 0;
        }
        else if($post -> reaction == 0){
            $post -> dislikes_count--;
            $post -> reaction = null;
        }
        else if($post -> reaction == 1){
            $post -> likes_count--;
            $post -> dislikes_count++;
            $post -> reaction = 0;
        }

        $post->save();
        return redirect()->back();
    }
}
