<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trolis = Cart::where('user_id', Auth()->id())->where('status', 'simpan')->get();
        return view('troli', compact('trolis'));
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
    public function store(Request $request)
{
    // Cek apakah produk sudah ada di keranjang pengguna
    $existingCart = Cart::where('user_id', Auth()->id())
        ->where('product_id', $request->product_id)
        ->where('status', 'simpan')
        ->first();

    // Dapatkan informasi produk
    $product = Product::findOrFail($request->product_id);
    $requestedQuantity = $request->quantity;

    // Validasi stok produk
    if ($existingCart) {
        $availableStock = $product->stock - $existingCart->quantity;

        if ($availableStock >= $requestedQuantity) {
            // Jika produk sudah ada, tambahkan kuantitas
            $existingCart->update([
                'quantity' => $existingCart->quantity + $requestedQuantity,
            ]);

            return redirect()->back()->with('success', 'Kuantitas produk di keranjang diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi.');
        }
    } else {
        if ($product->stock >= $requestedQuantity) {
            // Jika produk belum ada, tambahkan ke keranjang
            Cart::create([
                'user_id' => Auth()->id(),
                'product_id' => $request->product_id,
                'quantity' => $requestedQuantity,
                'status' => 'simpan',
            ]);

            return redirect()->back()->with('success', 'Produk ditambahkan ke dalam troli.');
        } else {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi.');
        }
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
    }
    
    public function updateMultiple(Request $request){
        foreach ($request->cart_ids as $id) {
            Cart::where('id', $id)->update(['status' => 'beli']);
        }
        $file=$request->file('proof');
        $bukti = Str::random(20) . '.' . $file->getClientOriginalExtension();
        foreach ($request->cart_ids as $cartId) {
            Payment::create([
                'cart_id' => $cartId,
                'total'=>$request->total,
                'proof'=>$bukti,
                'address'=>$request->address
            ]);
        }
        Storage::disk('public')->put($bukti, file_get_contents($file));
        
        return redirect()->back()->with('success', 'Pemesanan berhasil, silahkan tunggu konfirmasi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {   

        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus dari troli anda.');
    }
}
