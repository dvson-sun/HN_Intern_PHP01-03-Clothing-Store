<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use App\Slug\Slug;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected const PAGINATION_NUMBER = 15;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function findCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    public function index()
    {
        $categories =Category::orderBy('id', 'ASC')->paginate(self::PAGINATION_NUMBER);

        return view('admin.categories.listcategory')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::where('parent', 0)->get();
        
        return view('admin.categories.addcategory')->with(compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => Slug::getSlug($request->name),
            'parent' => $request->parent,
        ]);

        return redirect()->route('admin.categories.index')->with('success', __('Add success'));
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
        $cat = $this->findCategoryById($id);
        $category_id = $cat->parent;

        dd($cat->parent);
        $parentCategories = Category::where('parent', 0)->get();
        
        return view('admin.categories.editcategory')->with(compact('cat', 'category_id', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        $category = $this->findCategoryById($id);
        $category->update([
            'name' => $request->name,
            'slug' => Slug::getSlug($request->name),
            'parent' => $request->parent,
        ]);

        return redirect()->route('admin.categories.index')->with('success', __('Edit success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->findCategoryById($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Delete success');
    }
}
