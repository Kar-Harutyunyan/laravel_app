<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {    $posts = $post->latest()->get()->all();
        return view('posts', compact('posts'));
    }

    public function createPost()
    {
        return view('createPost');
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
        ]);
             
        $post = new Post($data);
        $post->user_id = auth()->user()->id;

        $post->save();
        return redirect()->route('posts')->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, string $id)
    { 
        $post = Post::find($id);
        return view('update', compact('post'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
        'name' => ['required', 'min:3'],
        'description' => ['required', 'min:3'],
        ]);

        $post = Post::find($id);

       if (!$post) {
        return redirect()->route('posts')->with('error', 'Post not found.');
       }
        
        if($post->user_id !== auth()->user()->id){
            return redirect()->route('posts')->with('error','You are not allowed update this post');
        };     
        

        $post->update($data);
        return redirect()->route('posts')->with('success','Post created successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect()->route("posts")->with("success","Post deleted successfully");
    }
}
