<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function showAll()
    {

        $rows = Content::all();

        return view('admin/content', [
            'rows' => $rows,
        ]);
    }

    public function showContentForm()
    {
        return view('admin/content_add');
    }

    public function saveContent(Request $request)
    {
        $data = $request->all();

        if (isset($data['image'])) {
            $path = $request->file('image')->store('photos');
            $data['image'] = $path;
        }

        Content::create($data);

        return redirect()->route('all.content')->with('message', 'Row has beeen added');
    }

    public function destroy($id)
    {
        $post = Content::findOrFail($id);

        $post->delete();

        Storage::delete($post->image);

        return redirect()->back()->with('message', 'Row has beeen deleted');
    }

    public function edit($id)
    {
        $post = Content::findOrFail($id);

        return view('admin/content_edit', compact('post'));
    }

    public function update(Request $request, $id)
    {

        $post = Content::findOrFail($id);
        $oldImage = $post->image;

        $data = $request->all();

        if (isset($data['image'])) {
            $path = $request->file('image')->store('photos');
            $data['image'] = $path;
        }

        $data['published'] = isset($data['published']) ? 1 : 0;
        $data['slidshow'] = isset($data['slidshow']) ? 1 : 0;

        $post->update($data);

        if (isset($data['image'])) {
            Storage::delete($oldImage);
        }

        return redirect()->route('all.content')->with('message', 'Row has beeen uploaded');
    }
}
