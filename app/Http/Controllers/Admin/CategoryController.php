<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategoryForm()
    {

        return view('admin.category');
    }

    public function saveCategory(Request $request)
    {

        Category::create($request->all());

        return redirect()->route('all.categories')->with('message', 'Category has beeen added');
    }

    public function destroy($id)
    {
        $cat = Category::findOrFail($id);

        $cat->delete();

        return redirect()->back()->with('message', 'Category has beeen deleted');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin/edit_cat', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $cat = Category::findOrFail($id);

        $data = $request->all();

        $data['published'] = isset($data['published']) ? 1 : 0;

        $cat->update($data);

        return redirect()->route('all.categories')->with('message', 'Category has beeen uploaded');
    }
}
