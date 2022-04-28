<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    protected function findProductById($id)
    {
        return $this->product->findOrFail($id);
    }

    public function index()
    {
        $featuredProducts = $this->product::with('images')
            ->orderBy('id', 'DESC')
            ->where('is_Featured', 1)
            ->limit(config('app.limit.featured'))
            ->get();

        $newProducts = $this->product::with('images')
            ->orderBy('id', 'DESC')
            ->limit(config('app.limit.new'))
            ->get();

        return view('store.index')->with(compact('featuredProducts','newProducts'));
    }
}
