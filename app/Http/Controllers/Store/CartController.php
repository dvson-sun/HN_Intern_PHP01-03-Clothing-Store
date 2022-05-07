<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\PaymentRequest;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Double;

class CartController extends Controller
{
    public function cart()
    {
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        $data['priceTotal'] = Cart::priceTotal();

        return view('store.cart.cart', $data);
    }
    
    public function addToCart(AddToCartRequest $request)
    {
        $qty = $request->quantity ? $request->quantity : 1;
        $size = $request->size;
        $product = Product::findorFail($request->id);

        $prd_size = Size::where('product_id', $product->id)
            ->where('size', $size)
            ->first();

        if ($qty > $prd_size->quantity) {
            return redirect()
                ->back()
                ->with('messages', __('The quantity of products in size :size is only :quantity', [
                    'size' => strtoupper($size),
                    'quantity' => $prd_size->quantity
                ]));
        }

        $image = Image::where('product_id', $request->id)->first();
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $qty,
            'weight' => 0,
            'options' => [
                'code' => $product->code,
                'size' => $size,
                'image' => $image->name,
            ],
        ]);
        
        return redirect()->route('cart.showCart');
    }

    public function update($rowId, $qty)
    {
        if ($qty > config('app.qty.max') || $qty < config('app.qty.min')) {
            return config('app.updateCart.fail');
        }
        Cart::update($rowId, $qty);

        return config('app.updateCart.success');
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);

        return redirect()->route('cart.showCart');
    }

    public function checkout()
    {
        $data['cart'] = Cart::content();
        $data['priceTotal'] = Cart::priceTotal();

        foreach ($data['cart'] as $item) {
            $product = Product::where('id', $item->id)->first();
            $size = Size::where('product_id', $item->id)
                ->where('size', $item->options->size)
                ->first();
            if ($size->quantity < $item->qty) {
                $item->qty = $size->quantity;

                return redirect()
                    ->back()
                    ->with('messages', __('The quantity of product :product is only :quantity', [
                        'product' => $product->name,
                        'quantity' => $size->quantity
                    ])) ;
            }
        }

        return view('store.cart.checkout', $data);
    }

    public function payment(PaymentRequest $request)
    {
        $total = str_replace(',', '', Cart::priceTotal());
        Order::create([
            'user_id' => Auth::user()->id,
            'total_price' => $total,
            'address' => $request->address,
            'status' => config('app.orderStatus.pending'),
            'phone' => $request->phone,
            'note' => $request->note,
        ]);

        $order = Order::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->first();

        foreach (Cart::content() as $cart) {
            OrderProduct::create([
                'product_id' => $cart->id,
                'order_id' => $order->id,
                'quantity' => $cart->qty,
                'size' => $cart->options->size,
            ]);

            $size = Size::where('product_id', $cart->id)
                ->where('size', $cart->options->size)
                ->first();
            $qty = $size->quantity - $cart->qty;
            
            $size->update([
                'quantity' => $qty,
            ]);
        }

        return redirect()->route('cart.complete', $order->id);
    }

    public function complete($id)
    {
        $order = Order::with('user')->where('id', $id)->first();
        $order_products = OrderProduct::where('order_id', $order->id)
            ->get();
        $products = $order->products;
        Cart::destroy();

        return view("store.cart.complete")->with(compact('order', 'order_products', 'products'));
    }
}
