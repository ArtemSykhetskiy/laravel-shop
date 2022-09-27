<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $notifications = auth()->user()->unreadNotifications;
        $products = Product::take(10)->orderBy('created_at', 'desc')->get();
        $categories = Category::take(10)->orderBy('created_at', 'desc')->withCount('products')->get();
        $orders = Order::take(10)->orderBy('created_at', 'desc')->get();

        return view('admin/dashboard/index', compact('notifications', 'products', 'categories', 'orders' ));
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request){
               return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return redirect()->back();
    }
}
