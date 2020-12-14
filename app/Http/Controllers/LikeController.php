<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function store(Post $post, Request $request) {
    // dd($post);
    if (!$post->likedby($request->user())) {
      $post->likes()->create([
        'user_id' => $request->user()->id,
      ]);
      // Code to remove dislike if user wants to like
      if ($post->dislikedby($request->user())) {
        $request->user()->dislikes()->where('post_id', $post->id)->delete();
      }
    }
    // Redirect
    return back();

  }
}
