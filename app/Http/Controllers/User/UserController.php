<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = $user->orders;
        return view('site/user/profile', compact('user', 'orders'));
    }

    public function show(Order $order)
    {
        return view('site/user/order_details', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
       $order->update(['status_id' => 4]);

       return redirect()->back()->with('success', 'Order successfully canceled');
    }
}
