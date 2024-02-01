<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Review;
use App\Models\Sosmed;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request) {
        // Check if the user is authenticated
        if(auth()->check()){
            // Check the role of the authenticated user
            if(auth()->user()->role == 'admin'){
                // Redirect admin to the dashboard
                return redirect('dashboard');
            }
        }

        // If not an admin or user is not authenticated, show landing page
        $products = Product::where('name','LIKE','%'.$request->search.'%')->paginate(4);
        $reviews = Review::all();
        $sosmeds = Sosmed::all();
        $carousels = Carousel::orderBy('created_at', 'desc')->paginate(1);
        return view('landing', compact('products','reviews','carousels','sosmeds'));
    }
}
