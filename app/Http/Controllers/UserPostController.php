<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts->load('comments');
        $now = Carbon::now();
        return view('user_posts.index')
            ->with('posts', $posts)
            ->with('now', $now);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
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
        //
    }
}
