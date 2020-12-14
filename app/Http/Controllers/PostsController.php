<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
  // Allows only logged in users to acces this page
  // public function __construct()
  // {
  //   $this->middleware('auth');
  // }
  public function index() {
    // dd(auth()->user());
    // Grab Data to paa to view
    $posts = Post::latest()->with(['user', 'likes', 'dislikes'])->paginate(4);
    return view('posts.index', ['posts' => $posts]);
  }
  public function store(Request $request) {
    // Validation
    $this->validate($request, [
      'body' => 'required',
    ]);
    // Store Post
    // 1st way to do it, but we need to add a fillable to Post model
    // Post::create([
    //   'user_id' => auth()->id(),
    //   'body' => $request->body
    // ]);
    // 2nd way to do it setting up relationship on the User model
    $request->user()->posts()->create($request->only('body'));
    // dd(auth()->user());
    // Redirect
    return back();
  }
  public function destroy(Post $post) {
    $this->authorize('delete', $post);
    $post->delete();
    // Redirect
    return back();
  }
}
