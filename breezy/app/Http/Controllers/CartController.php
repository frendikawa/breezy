<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
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
        Cart::create($request->all());

        return redirect()->back()->with('success', 'Produk ditambahkan ke dalam troli.');
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
                'proof'=>$bukti
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
