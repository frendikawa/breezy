<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Search by product name
        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Paginate the results
        $products = $query->paginate(4);
        $categories = Category::all();

        // Check user role and return the appropriate view
        if (auth()->user()->role == 'admin') {
            return view('admin.product', compact('products', 'categories'));
        } else if (auth()->user()->role == 'user') {
            return view('product', compact('products', 'categories'));
        }
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
    public function store(ProductStoreRequest $request)
    {
        $data = $request->all();
        $photo = $request->file('photo');
        $data['photo'] = Str::random(20) . '.' . $photo->getClientOriginalExtension();
        Storage::disk('public')->put($data['photo'], file_get_contents($photo));
        Product::create($data);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $data['photo'] = Str::random(20) . '.' . $photo->getClientOriginalExtension();
            Storage::disk('public')->put($data['photo'], file_get_contents($photo));
            Storage::disk('public')->delete($product->photo);
        } else {
            $data['photo'] = $product->photo;
        }

        $product->update($data);
        return redirect()->back()->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        Storage::disk('public')->delete($product->photo);
        $product->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus produk');
    }
}
