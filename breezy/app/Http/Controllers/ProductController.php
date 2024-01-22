<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('product', compact('products', 'categories'));
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
    public function store(ProductRequest $request)
    {


        $file = Storage::put('photo', $request->file('photo'));

        $data = [
            'name' => $request->name,
            'photo' => $file,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
        ];

        Product::create($data);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
        ]);

        // Periksa apakah ada file foto yang diunggah
        if ($request->hasFile('photo')) {
            // Jika ada file baru, simpan foto baru dan hapus foto lama
            $file = Storage::put('photo', $request->file('photo'));
            Storage::disk('public')->delete($product->photo);
        } else {
            // Jika tidak ada file baru, gunakan foto lama
            $file = $product->photo;
        }

        $data = [
            'name' => $request->name,
            'photo' => $file,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
        ];

        $product->update($data);
        return redirect()->back()->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus produk');
    }
}
