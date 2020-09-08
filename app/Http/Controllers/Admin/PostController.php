<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $cat = Category::all();

        return view('admin/dashboard', compact('cat'));
    }

    public function categoryName($id)
    {
        return Category::where('id', $id)->value('name');
    }

    public function showById($id)
    {
        $rows = Post::where('parent_id', $id)->get();

        return view('admin/pages', [
            'rows' => $rows,
            'category_name' => $this->categoryName($id)
        ]);
    }

    public function showPageForm()
    {

        $categories = Category::all();

        return view('admin/page', compact('categories'));
    }

    public function savePost(Request $request)
    {
        $data = $request->all();

        if (isset($data['image'])) {
            $path = $request->file('image')->store('photos');
            $data['image'] = $path;
        }

        Post::create($data);

        return redirect()->route('all.pages', $data['parent_id'])->with('message', 'Post has beeen added');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        Storage::delete($post->image);

        return redirect()->back()->with('message', 'Post has beeen deleted');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);

        return view('admin/edit', [
            'categories' => $categories,
            'post' => $post,
            'category_name' => $this->categoryName($post->parent_id)
        ]);
    }

    public function update(Request $request, $id)
    {

        $post = Post::findOrFail($id);
        $oldImage = $post->image;

        $data = $request->all();

        if (isset($data['image'])) {
            $path = $request->file('image')->store('photos');
            $data['image'] = $path;
        }

        $data['published'] = isset($data['published']) ? 1 : 0;
        $data['premium'] = isset($data['premium']) ? 1 : 0;

        $post->update($data);

        if (isset($data['image'])) {
            Storage::delete($oldImage);
        }

        return redirect()->route('all.pages', $post->parent_id)->with('message', 'Post has beeen uploaded');
    }
}
