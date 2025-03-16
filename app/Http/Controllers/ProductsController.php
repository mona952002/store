<?php

namespace App\Http\Controllers;


use App\Models\products;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $products = Products::with('category')->get();
        return view('admin.products.index', compact('products'));
    }
    /**
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $products = new Products;

        $products->name = $request->name;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->category_id = $request->category;
        $products->description = $request->description;

        $products->save();

        return redirect()->back();
    }
    /**
     *
     * @param \App\Models\Admin\Products $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products) {}
    /**
     *
     * @param \App\Models\Admin\Products $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $products = Products::find($id);
        $categories = Category::all();
        $category_name = Category::find($products->category_id);
        return view('admin.products.edit', compact('products', 'categories', 'category_name'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Products $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $products = Products::find($id);

        $products->name = $request->name;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->category_id = $request->category;
        $products->description = $request->description;

        $products->save();

        return redirect('products');
    }
    /**
     *
     * @param \App\Models\Admin\Products $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $products = Products::find($id)->delete();
        return redirect()->back();
    }
}
