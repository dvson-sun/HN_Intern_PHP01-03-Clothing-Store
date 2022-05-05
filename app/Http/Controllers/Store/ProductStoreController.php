<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\Request;

class ProductStoreController extends Controller
{
    public function shop()
    {
        $parentCategories = Category::where('parent', 0)->get();

        $products = Product::with('images')
                ->orderBy('id', 'desc')
                ->paginate(config('app.limit.shop'));

        return view('store.product.shop')->with(compact('parentCategories', 'products'));
    }
    
    public function filter(Request $request)
    {
        $category_id = $request->category;
        $start = $request->start;
        $end = $request->end;

        $products = Product::with('images')
                ->where('category_id', $category_id)
                ->whereBetween('price', [$start, $end])
                ->orderBy('id', 'DESC')
                ->paginate(config('app.limit.shop'));

        $parentCategories = Category::where('parent', 0)->get();
    
        return view('store.product.shop')->with(compact('products', 'parentCategories'));
    }

    public function detail($slug)
    {
        $detail = Product::with('images')->where('slug', $slug)->first();

        $sizes = Size::where('product_id', $detail->id)
            ->where('quantity', '>', 0)
            ->get();

        $products = Product::with('images')->where('slug', '<>', $slug)
            ->where('category_id', '=', $detail->category_id)
            ->orderBy('id', 'DESC')
            ->limit(config('app.limit.recommend'))
            ->get();

        $comments = Comment::with('user')->where('product_id', $detail->id)
            ->orderBy('created_at', 'desc')
            ->paginate(config('app.comment'));

        return view('store.product.detail')->with(compact('detail', 'products', 'sizes', 'comments'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::with('images')
                ->where('category_id', $category->id)
                ->orderBy('id', 'desc')
                ->paginate(config('app.limit.category'));

        return view('store.product.category')->with(compact('products', 'category'));
    }
}
