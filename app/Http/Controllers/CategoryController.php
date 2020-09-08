<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category_id = Category::where('slug', $slug)->value('id');

        $category_name = Category::getCurrentUrl();

        $latests = Post::orderBy('created_at', 'desc')->take(3)->get(['name', 'slug', 'image']);

        if ($category_id) {
            $posts = Post::published()->where('parent_id', $category_id)->get();

            return view('pages/posts', [
                'posts' => $posts,
                'categoty_name' => $category_name,
                'latests' => $latests
            ]);
        }
    }
}
