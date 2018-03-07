<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $random_products = 8;
        $products = Product::where('featured', true)->take($random_products)->inRandomOrder()->get();

        return view('home', compact('products'));
    }
}
