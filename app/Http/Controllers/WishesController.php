<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishesController extends Controller
{
    public function index()
    {
        return view('site/wishes/wishes');
    }

    public function add(Product $product)
    {
        auth()->user()->addToWish($product);
        return redirect()->back()->with('success', "Product {$product->title} successfully added to wishlist");
    }

    public function delete(Product $product)
    {
        auth()->user()->removeFromWish($product);
        return redirect()->route('wishlist')->with('success', 'Product was removed from wish list');
    }

}
