<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

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
}
