<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $featuredProducts = $this->productRepo->getFeaturedProducts();

        $newProducts = $this->productRepo->getNewProducts();

        return view('store.index')->with(compact('featuredProducts', 'newProducts'));
    }
}
