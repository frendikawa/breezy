<?php

namespace App\Http\Controllers;

use App\Charts\ProductChart;
use App\Models\Carousel;
use App\Models\Sosmed;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $sosmeds=Sosmed::all();
        $carousels=Carousel::all();
        return view('admin.dashboard',compact('sosmeds','carousels'));
    }
}
