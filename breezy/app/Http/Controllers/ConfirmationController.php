<?php

namespace App\Http\Controllers;

use App\Models\Payment;

class ConfirmationController extends Controller
{
    public function index()
    {
        $confirms = Payment::where('status', 'Menunggu konfirmasi')->latest()->paginate(5);
        return view('admin.confirmation', compact('confirms'));
    }

    public function tolak(Payment $payment)
    {
        $payment->update(['status' => 'ditolak']);
        return redirect()->back()->with('success', 'Berhasil menolak pesanan.');
    }

    public function terima($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(['status' => 'diterima']);
        return redirect()->back()->with('success', 'Berhasil menerima pesanan.');
    }
}
