<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        if (empty($posts)) {
            return response()->json(['message' => 'No posts found'], 404);
        } else {
            return response()->json($posts, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('title') && $request->has('body') && $request->has('user_id') && $request->has('category_id')) {
            $post = new Post;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->image = $request->image;
            $post->user_id = $request->user_id;
            $post->category_id = $request->category_id;
            $post->save();
            return response()->json($post, 201);
        } else {
            return response()->json(['message' => 'Please fill all required fields'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            return response()->json(['message' => 'Post not found'], 404);
        } else {
            return response()->json($post, 200);
        }
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
        $post = Post::find($id);
        if (empty($post)) {
            return response()->json(['message' => 'Post not found'], 404);
        } else {
            $post->title = $request->title ? $request->title : $post->title;
            $post->body = $request->body ? $request->body : $post->body;
            $post->category_id = $request->category_id ? $request->category_id : $post->category_id;
            $post->image = $request->image ? $request->image : $post->image;
            $post->save();
            return response()->json($post, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            return response()->json(['message' => 'Post not found'], 404);
        } else {
            $post->delete();
            return response()->json(['message' => 'Post deleted successfully'], 200);
        }
    }
}
