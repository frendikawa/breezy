<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class WayController extends Controller
{
    public function index()
    {
        $ways = Payment::where('status', 'Dalam perjalanan')->latest()->paginate(5);
        return view('admin.way', compact('ways'));
    }

    public function update($id)
    {
        $payment = Payment::findOrFail($id);

        // Perbarui status pembayaran
        $payment->update(['status' => 'Selesai']);

        // Kurangi stok produk
        $product = $payment->cart->product;
        $quantity = $payment->cart->quantity;

        if ($product->stock >= $quantity) {
            $product->decrement('stock', $quantity);
        } else {
            // Handle situasi stok tidak mencukupi (Anda dapat menambahkan log atau tindakan lain)
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi untuk pengurangan.');
        }

        return redirect()->back()->with('success', 'Pengiriman selesai! Stok produk diperbarui.');
    }
}
