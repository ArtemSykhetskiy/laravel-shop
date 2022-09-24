<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);

        return view('admin/orders/orders', compact('orders'));
    }

    public function edit(Order $order)
    {
        return view('admin/orders/edit', compact('order'));

    }

    public function update(Order $order, OrderUpdateRequest $request)
    {
        $order->update($request->validated());

        return redirect()->route('admin.orders')->with('success', 'Order successfully updated');
    }

    public function search(Request $request){

        $search = $request->input('search');

        $orders = Order::query()
            ->where('surname', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('phone', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('admin/orders/orders', compact('orders'));
    }

}
