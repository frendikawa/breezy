<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
            Category::create($request->all());
            return to_route('category.index')->with('success', "Berhasil menambahkan kategori $request->name!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get();
        return view('category_product', compact('category','products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return to_route('category.index')->with('success', 'Berhasil menyimpan perubahan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Category $category)
    {
        try {
            $category->delete();
            return redirect()->back()->with('success','Berhasil menghapus kategori');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error','Kategory gagal dihapus karena masih terikat dengan table lain');
        }
    }
}
