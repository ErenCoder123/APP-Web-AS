<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = 'images/'.$imageName;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect('products')->with('success', 'Product created successfully.');
    }
    
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
     
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity; 

        if(!is_null($request)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = 'images/'.$imageName;
        }
        
        $product->save();
        return redirect('products')->with('success', 'Product updated successfully.');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('products')->with('success', 'Product deleted successfully.');
    }
}
