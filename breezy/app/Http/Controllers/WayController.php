<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class WayController extends Controller
{
    public function index()
    {
        $ways = Payment::query()->with('detailPayments')->whereHas('detailPayments')->where('status', 'Dalam perjalanan')->latest()->paginate(5);
        return view('admin.way', compact('ways'));
    }

    public function update($id)
    {
        $ways = Payment::query()->with('detailPayments')->whereHas('detailPayments')->where('status', 'Dalam perjalanan')->latest()->find($id);
        foreach ($ways->detailPayments as $detailPayment) {
            $product=$detailPayment->cart->product;
            $quantity=$detailPayment->cart->quantity;
            if ($product->stock >= $quantity) {
                $product->decrement('stock', $quantity);
            } else {
                return redirect()->back()->with('error', 'Stok produk tidak mencukupi untuk pengurangan.');
            }
            $detailPayment->payment->update(['status' => 'Selesai']);
        }
        return redirect()->back()->with('success', 'Pengiriman selesai! Stok produk diperbarui.');
        // dd($payment);
        // $payment = Payment::findOrFail($id);

        // // Perbarui status pembayaran
        // $payment->update(['status' => 'Selesai']);
        // Kurangi stok produk
        // $product = $detailPayment->cart->product;
        // $quantity = $detailPayment->cart->quantity;


    }
}
