<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Confirmation;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $this->reduceProductStock($payment->cart->product, $payment->cart->quantity);

        return redirect()->back()->with('success', 'Payment status updated.');
    }

    private function reduceProductStock($product, $quantity)
    {
        if ($product->stock >= $quantity) {
            $product->decrement('stock', $quantity);
        } else {
            // Handle insufficient stock (you can add logging or other actions)
            // You might want to throw an exception or handle this case based on your application logic
            // Example: throw new \Exception('Insufficient stock for product: ' . $product->name);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
