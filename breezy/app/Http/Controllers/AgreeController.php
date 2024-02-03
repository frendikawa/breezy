<?php

namespace App\Http\Controllers;

use App\Models\Payment;

class AgreeController extends Controller
{
    public function index()
    {
        $agrees = Payment::query()->with('detailPayments')->whereHas('detailPayments')->where('status', 'diterima')->latest()->paginate(5);
        return view('admin.agree', compact('agrees'));
    }

    public function update($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(['status' => 'Dalam perjalanan']);
        return redirect()->back()->with('success', 'Berhasil memeperbarui status.');
    }
}
