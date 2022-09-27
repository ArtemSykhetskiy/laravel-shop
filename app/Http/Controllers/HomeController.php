<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::all()->take(10);
        $categories = Category::all();

        return view('site/index', compact('products', 'categories'));
    }

    public function search(Request $request){

        $search = $request->input('search');
        $categories = Category::all();

        $products = Product::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('site/layouts/shop', compact('products', 'categories'));
    }
}
