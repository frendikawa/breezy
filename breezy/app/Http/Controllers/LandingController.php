<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        $products = Product::latest()->get();
        $reviews = Review::latest()->get();
        return view('landing', compact('products','reviews'));
    }
}
