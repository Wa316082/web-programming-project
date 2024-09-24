<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::fetchAll();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        //validate request
        $data = $request->validate([
            'name' => ['required', 'string'],
            'slug'=> ['required', 'unique:categories,slug'],
            'description' => ['required', 'string']
        ]);
        Category::storeCategory($data);
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::fetchById($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        //validate request
        $data = $request->validate([
            'name' => 'required|string',
            'slug'=> 'required|max:255|unique:categories,slug,'.$category->id,
            'description' => 'required|string'
        ]);
        Category::updateCategory($data, $category->id);
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        Category::deleteCategory($id);
        return redirect()->route('category.index');
    }

}
