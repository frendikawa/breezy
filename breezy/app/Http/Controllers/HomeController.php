<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = Product::where('name','LIKE','%'.$request->search.'%')->paginate(8);
        $categories = Category::all();
        $carousels = Carousel::orderBy('created_at', 'desc')->paginate(1);
        return view('home', compact('products', 'categories','carousels'));
    }
}
