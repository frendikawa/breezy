<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class RejectController extends Controller
{
    public function index()
    {
        $rejects = Payment::query()->with('detailPayments')->whereHas('detailPayments')->where('status', 'ditolak')->latest()->paginate(5);
        return view('admin.reject', compact('rejects'));
    }
}
