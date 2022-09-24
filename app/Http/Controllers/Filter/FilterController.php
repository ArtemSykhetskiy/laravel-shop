<?php

namespace App\Http\Controllers\Filter;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class FilterController extends Controller
{
    public function price(Request $request)
    {

        $min_value = $request->input('from');
        $max_value = $request->input('to');
//
        if( $min_value === null){
            $min_value = 0;
        }

        if($max_value === null){
            $max_value = Product::max('price');
        }

        $products = Product::whereBetween('price', [$min_value, $max_value])->paginate(15);

        $products = QueryBuilder::for(Product::class)
            ->allowedFilters(['price'])
            ->whereBetween('price', [$min_value, $max_value])
            ->paginate(12);

        dd($products);

        $categories = Category::all();

        return view('site/layouts/shop', compact('products', 'categories'));
    }

    public function sortAsc(Request $request)
    {

    }
}
