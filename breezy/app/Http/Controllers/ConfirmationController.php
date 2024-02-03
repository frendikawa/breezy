<?php

namespace App\Http\Controllers;

use App\Models\DetailPayment;
use App\Models\Payment;

class ConfirmationController extends Controller
{
    public function index()
    {
        $confirms = Payment::query()->with('detailPayments')->whereHas('detailPayments')->where('status', 'Menunggu konfirmasi')->latest()
            ->paginate(5);
        // dd($confirms);
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
