<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $categoryId = null)
    {
        if ($categoryId != null) {
            $posts = Post::where('category_id', $categoryId)->orderBy('created_at', 'desc')->paginate(5);
        }else{
            $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        }
        
        $categories = Category::all();
        $comments = Comment::all()->count();

        return view('posts.index', compact('posts', 'categories', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();
        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    /**
     * Research the request string in all posts title.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::where('title', 'like', "%".$search."%")->orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();
        $comments = Comment::all()->count();

        return view('posts.index', compact('posts', 'categories', 'comments'));
    }

    /**
     * Save a comment in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        $comment = new Comment();
        $comment->post_id = $request->input('post_id');
        $comment->author = $request->input('author');
        $comment->comment = nl2br($request->input('comment'));
        $comment->save();

        return redirect()->route('posts.show', $comment->post_id);
    }

    /**
     * Add like to database.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function like(int $id)
    {
        $post = Post::find($id);
        $post->update(['likes' => $post->likes + 1]);

        return redirect()->route('posts.show', $post);
    }
}
