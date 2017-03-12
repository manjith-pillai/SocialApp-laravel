<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function getDashboard()
	{
        $posts = Post::orderBy('created_at','desc')->get();
		return view('dashboard',compact('posts'));
	}
	public function postCreatePost(Request $request)
	{
		$this->validate($request, [
			'body' => 'required|max:1000'
		]);
		$post = new Post();
    	$post->body = $request['body'];
    	$request->user()->posts()->save($post);
    	return redirect()->route('dashboard');
	}
    
    public function getDeletePost($post_id)
    {
    	$post = Post::where('id', $post_id)->first();
    	if(Auth::user() != $post->user)
    	{
    		return redirect()->back();
    	}
    	$post->delete();
    	return redirect()->route('dashboard');
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $post = Post::find($request['postId']);
            if(Auth::user() != $post->user)
            {
               return redirect()->back();
            }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body'=> $post->body],200);

    }
}
