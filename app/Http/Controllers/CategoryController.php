<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
    /**
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.categories.create');
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $categories = new Category;
        $categories->name = $request->name;
        $categories->save();
        return redirect()->back();
    }
    /**
     *
     * @param \App\Models\Admin\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect('categories');
    }

    /**
     *
     * @param \App\Models\Admin\Category $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
}
