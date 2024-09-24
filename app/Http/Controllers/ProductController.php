<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::fetchAll();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $subCategories = SubCategory::all();
        return view('products.create', compact('subCategories'));
    }

    public function store(Request $request)
    {
        // Validate the request...
        $data = $request->validate([
            'sub_category_id' => 'required',
            'name' => 'required|unique:products|max:255',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);
        Product::storeProduct($data);
        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        $subCategories = SubCategory::all();
        return view('products.edit', compact('product', 'subCategories'));
    }

    public function update(Request $request, Product $product)
    {
        // Validate the request...
        $request->validate([
            'sub_category_id' => 'required',
            'name' => 'required|max:255|unique:products,name,'.$product->id,
            'price' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);
        Product::updateProduct($request->all(), $product->id);
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
