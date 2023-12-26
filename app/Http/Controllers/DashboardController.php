<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all()->load('comments');
        $now = Carbon::now();
        return view('pages.dashboard.dashboard')
            ->with('posts', $posts)
            ->with('now', $now);
    }
}
