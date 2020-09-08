<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $slides = Content::published()->where('slidshow', 1)->get();

        $rows = Content::published()->where('slidshow', 0)->get();

        $latests = Post::orderBy('created_at', 'desc')->take(3)->get(['name', 'slug', 'image']);

        return view('layouts/home', [
            'slides' => $slides,
            'rows' => $rows,
            'latests' => $latests
        ]);
    }

    public function posts()
    {
        $posts = Post::orderBy('created_at', 'desc')->published()->get();

        $category = Category::get(['name', 'slug']);

        $latests = Post::orderBy('created_at', 'desc')->take(3)->get(['name', 'slug', 'image']);

        return view('pages/posts', [
            'posts' => $posts,
            'category' => $category,
            'latests' => $latests
        ]);
    }

    public function show($slug)
    {
        $post = Post::published()->whereSlug($slug)->firstOrFail();
        $latests = Post::orderBy('created_at', 'desc')->take(3)->get(['name', 'slug', 'image']);
        return view('pages/post', [
            'post' => $post,
            'latests' => $latests
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');

        $posts = Post::where('name', 'LIKE', '%' . $keyword . '%')->paginate();


        return view('pages/posts', [
            'posts' => $posts,
            'result' => 'Search Results'
        ]);
    }

    public function more($slug)
    {
        $post = Content::whereSlug($slug)->firstOrFail();



        return view('pages/post', [
            'post' => $post
        ]);
    }
}
