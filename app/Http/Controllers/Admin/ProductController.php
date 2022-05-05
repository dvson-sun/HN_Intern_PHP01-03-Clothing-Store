<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
use App\Slug\Slug;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const PAGINATION_NUMBER = 10;

    protected function findProductById($id)
    {
        return Product::findOrFail($id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('images')
            ->orderBy('id', 'DESC')
            ->paginate(self::PAGINATION_NUMBER);

        return view('admin.products.listproduct')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::where('parent', 0)->get();

        return view('admin.products.addproduct')->with(compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $data = [];
        $files = $request->file('images');
        if ($request->hasFile('images')) {
            Product::create([
                'name' => $request->name,
                'code' => $request->code,
                'slug' => Slug::getSlug($request->name),
                'price' => $request->price,
                'description' => $request->description,
                'is_featured' => $request->is_featured,
                'status' => $request->status,
                'category_id' => $request->category_id,
            ]);

            $product = Product::select('id', 'slug')->where('name', '=', $request->name)->first();

            addSizes($product->id, config('app.size.s'), $request->s);
            addSizes($product->id, config('app.size.m'), $request->m);
            addSizes($product->id, config('app.size.l'), $request->l);
            addSizes($product->id, config('app.size.xl'), $request->xl);
            addSizes($product->id, config('app.size.xxl'), $request->xxl);

            foreach ($files as $key => $file) {
                $imageName = $product->slug . '-' . time() . '.' . $file->extension();
                $file->move(public_path('uploads'), $imageName);
                $data[$key] = [
                    'product_id' => $product->id,
                    'name' => $imageName,
                ];
            }

            Image::insert($data);
        }

        return redirect()->route('admin.products.index')->with('success', __('Add Success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('size')->findOrFail($id);
        $category_id = $product->category_id;
        $parentCategories = Category::where('parent', 0)->get();

        return view('admin.products.editproduct')->with(compact('category_id', 'product', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = [];
        $files = $request->file('images');
        $product->update([
            'name' => $request->name,
            'code' => $request->code,
            'slug' => Slug::getSlug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'is_featured' => $request->is_featured,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);
        
        $size_s = Size::where('product_id', $product->id)
            ->where('size', config('app.size.s'))
            ->first();
        editSizes($size_s, $request->s);

        $size_m = Size::where('product_id', $product->id)
            ->where('size', config('app.size.m'))
            ->first();
        editSizes($size_m, $request->m);

        $size_l = Size::where('product_id', $product->id)
            ->where('size', config('app.size.l'))
            ->first();
        editSizes($size_l, $request->l);

        $size_xl = Size::where('product_id', $product->id)
            ->where('size', config('app.size.xl'))
            ->first();
        editSizes($size_xl, $request->xl);

        $size_xxl = Size::where('product_id', $product->id)
            ->where('size', config('app.size.xxl'))
            ->first();
        editSizes($size_xxl, $request->xxl);

        //Insert Images
        if ($request->hasFile("images")) {
            foreach ($files as $key => $file) {
                $imageName = $product->slug.'-'.time().'.'.$file->extension();
                $file->move(public_path('images'), $imageName);
                $data[$key] = [
                    'product_id' => $product->id,
                    'name' => $imageName,
                ];
            }
            Image::insert($data);
        }

        return redirect()->route('admin.products.index')->with('success', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->findproductById($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Delete success');
    }
}
