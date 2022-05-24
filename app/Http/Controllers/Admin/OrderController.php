<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderProduct\OrderProductRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepo;

    public function __construct(
        OrderRepositoryInterface $orderRepo,
        OrderProductRepositoryInterface $orderProductRepo
    ) {
        $this->orderRepo = $orderRepo;
        $this->orderProductRepo = $orderProductRepo;
    }

    public function index()
    {
        $orders = $this->orderRepo->getAllWithUsers();

        return view('admin.orders.order')->with(compact('orders'));
    }

    public function show($id)
    {
        $order = $this->orderRepo->getOrderWithUser($id);
        $order_products = $this->orderProductRepo->getOrderProduct($id);
        $products = $order->products;

        return view('admin.orders.detailorder')->with(compact('order', 'order_products', 'products'));
    }

    public function update(Request $request)
    {
        $order = $this->orderRepo->getOrderById($request->id);
        $order->status = $request->status;
        $order->update();

        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Update success');
    }
}
