<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        
        $data = compact('posts');

        return view('post')->with( $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:20|max:100',
                'body' => 'required|min:50'
            ]
        );

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()->route('admin.posts')->with('status', 'Post create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find( $id );

        $data = compact('post', 'id');

        return view('post.edit')->with( $data );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|min:20|max:100',
                'body' => 'required|min:50'
            ]
        );
        
        $post = Post::find( $id );

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->back()->with('status', 'Post Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find( $id );

        if( is_null($post) ){
            return redirect()->route('admin.posts')->with('status', 'Post not found');
        }

        $post->delete();

        return redirect()->route('admin.posts')->with('status', 'Post deleted.');

    }
}
