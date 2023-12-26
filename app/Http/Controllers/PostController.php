<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts->load('comments');
        $now = Carbon::now();
        return view('pages.posts.index')
            ->with('posts', $posts)
            ->with('now', $now);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:225'],
            'description' => ['required', 'string']
        ]);

        $image = $request->image;
        $imageNameToStore = null;
        if ($image) {
            //get ext using laravel:
            $extension = $image->getClientOriginalExtension();
            //file to store:
            $imageNameToStore = 'image' . auth()->user()->id . '_' . time() . '.' . $extension;
            $directory = '/posts_images';
            //upload image:
            $image->storeAs('public/' . $directory, $imageNameToStore);
        }

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
            'image' => $imageNameToStore,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $now = Carbon::now();
        $comments = $post->comments->load('user');
        return view('pages.posts.show')
            ->with('comments', $comments)
            ->with('now', $now)
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        if (auth()->user()->isAdmin()) {
            return redirect()->route('dashboard.index')->with('success', 'Post Deleted Successfully');
        }
        return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully');
    }
}
