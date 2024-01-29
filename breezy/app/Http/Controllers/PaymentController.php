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

        



        $file=$request->proof;
        dd($file);
        foreach ($request->cart_ids as $cartId) {
            Payment::create([
                'cart_id' => $cartId,
                'total'=>$request->total,
                'proof'=>'wkwk'
            ]);
        }
        return redirect()->back()->with('success', 'Pembayaran berhasil');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
