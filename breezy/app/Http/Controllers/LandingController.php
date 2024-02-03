<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
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
    
        $query = Product::query();
    
        // Apply search filter
        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }
    
        // Apply category filter
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }
    
        // Retrieve paginated products
        $products = $query->paginate(4);
    
        $reviews = Review::all();
        $sosmeds = Sosmed::all();
        $carousels = Carousel::orderBy('created_at', 'desc')->paginate(1);
        $categories = Category::all();
    
        return view('landing', compact('products', 'reviews', 'carousels', 'sosmeds', 'categories'));
    }
    
}
