<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::fetchAll();
        return view('sub-categories.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('sub-categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:sub_categories,slug',
            'description' => 'required',
        ]);
        SubCategory::storeSubCategory($request->all());
        return redirect()->route('sub-category.index');
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('sub-categories.edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        //validate the request
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:sub_categories,slug,' . $subCategory->id,
            'description' => 'required',
        ]);
        SubCategory::updateSubCategory($request->all(), $subCategory->id);
        return redirect()->route('sub-category.index');
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect()->route('sub-category.index');
    }

}
