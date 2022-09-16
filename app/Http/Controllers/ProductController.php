<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin/products/products', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin/products/create', compact('categories'));
    }


    public function store(CreateProductRequest $request)
    {
        $data = $request->validated();
        $data['thumbnail'] = 'https://via.placeholder.com/640x480.png/00cc66?text=aut';
       Product::create($data);

       return redirect()->route('admin.products.index')->with('success', 'Product successfully added');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin/products/edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', "The product {$product->title} was successfully updated!");
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', "The product {$product->title} was successfully deleted!");
    }
}
