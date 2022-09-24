<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('products')->get();

        $products = QueryBuilder::for(Product::class)
            ->allowedSorts('title', 'price')
            ->paginate(12)
            ->appends(request()->query());

        if($request->has('from') || $request->has('to')){

            $min_value = $request->input('from');
            $max_value = $request->input('to');

            if( $min_value === null){
                $min_value = 0;
            }

            if($max_value === null){
                $max_value = Product::max('price');
            }

            $products = Product::whereBetween('price', [$min_value, $max_value])->paginate(15);
        }


        return view('site/layouts/shop', compact('products', 'categories', 'request'));
    }

    public function show(Product $product)
    {
        $products = Product::all()->take(5);

        return view('site/layouts/single_product', compact('product', 'products'));
    }

}
