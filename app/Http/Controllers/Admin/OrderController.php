<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected const PAGINATION_NUMBER = 10;

    public function index()
    {
        $orders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(self::PAGINATION_NUMBER);

        return view('admin.orders.order')->with(compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        $order_products = OrderProduct::where('order_id', $order->id)->get();
        $products = $order->products;

        return view('admin.orders.detailorder')->with(compact('order', 'order_products', 'products'));
    }

    public function update(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->status = $request->status;
        $order->update();

        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Update success');
    }
}
