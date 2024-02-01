<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMultipleRequest;
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
        $trolis = Cart::where('user_id', Auth::id())->where('status', 'simpan')->get();
        return view('troli', compact('trolis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the product is already in the user's cart
        $existingCart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->where('status', 'simpan')
            ->first();

        // Get product information
        $product = Product::findOrFail($request->product_id);
        $requestedQuantity = $request->quantity;

        // Validate product stock
        if ($existingCart) {
            $availableStock = $product->stock - $existingCart->quantity;

            if ($availableStock >= $requestedQuantity) {
                // If the product is already in the cart, update the quantity
                $existingCart->update([
                    'quantity' => $existingCart->quantity + $requestedQuantity,
                ]);

                return redirect()->back()->with('success', 'Cart quantity updated.');
            } else {
                return redirect()->back()->with('error', 'Insufficient product stock.');
            }
        } else {
            if ($product->stock >= $requestedQuantity) {
                // If the product is not in the cart, add it to the cart
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'quantity' => $requestedQuantity,
                    'status' => 'simpan',
                ]);

                return redirect()->back()->with('success', 'Product added to the cart.');
            } else {
                return redirect()->back()->with('error', 'Insufficient product stock.');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        // Update cart details if needed
    }

    /**
     * Update multiple resources in storage.
     */
    public function updateMultiple(UpdateMultipleRequest $request)
    {
        $total = 0;
        foreach ($request->quantities as $index => $quantity) {
            $cart = Cart::find($request->cart_ids[$index]);
            $stock=$cart->product->stock;
            $request->validate([
                'quantities.*'=>'numeric|max:'.$stock
            ],[
                'quantities.*.max'=>'stok tidak cukup'
            ]);
            // Update cart quantity
            $cart->update(['quantity' => $quantity]);
            $total += $quantity * $cart->product->price;

            // Update status to 'beli'
            $cart->update(['status' => 'beli']);

            // Create payment
            $file = $request->file('proof');
            $bukti = Str::random(20) . '.' . $file->getClientOriginalExtension();

            Payment::create([
                'cart_id' => $cart->id,
                'total' => $total,
                'proof' => $bukti,
                'address' => $request->address
            ]);

            // Store payment proof
            Storage::disk('public')->put($bukti, file_get_contents($file));
        }

        return redirect()->back()->with('success', 'Order successful, please wait for confirmation.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Successfully removed from your cart.');
    }
}
