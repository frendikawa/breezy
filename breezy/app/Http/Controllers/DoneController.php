<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class DoneController extends Controller
{
    public function index()
    {
        $done = Payment::query()->with('detailPayments')->whereHas('detailPayments')->where('status', 'Selesai')->latest()->paginate(5);
        return view('admin.done', compact('done'));
    }
}
