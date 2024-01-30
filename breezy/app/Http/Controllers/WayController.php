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
        $payment->update(['status' => 'Selesai']);
        return redirect()->back()->with('success', 'Pengiriman selesai!');
    }
}
