<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index() {
        $histories = Payment::query()->with('detailPayments')->whereHas('detailPayments')->where('user_id', Auth()->user()->id)->latest()->paginate(5);
        return view('history',compact('histories'));
    }
}
