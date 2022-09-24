<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

        if (!empty($data['thumbnail'])) {
            $filename = time() . '.' . $data['thumbnail']->getClientOriginalName();

            $data['thumbnail']->move(public_path('/image/products/origin/'), $filename);
            $data['thumbnail'] = $filename;
        }

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
        if (!empty($data['thumbnail'])) {
            $filename = time() . '.' . $data['thumbnail']->getClientOriginalName();

            $data['thumbnail']->move(public_path('/image/products/origin/'), $filename);
            $data['thumbnail'] = $filename;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', "The product {$product->title} was successfully updated!");
    }

    public function destroy(Product $product)
    {
        unlink(public_path('/image/products/origin/'.$product->thumbnail));
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', "The product {$product->title} was successfully deleted!");
    }
}
