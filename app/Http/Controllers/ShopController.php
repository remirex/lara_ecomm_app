<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $pagination = 9;
        $categories = Category::all();

        if(request()->category)
        {

            $products = Product::with('categories')->whereHas('categories' , function($query){
                $query->where('slug', request()->category);
            });

            $categoryName = optional($categories->where('slug', request()->category)->first())->name;

        } else {

            $products = Product::where('featured', true);
            $categoryName = 'Featured';

        }

        if(request()->sort == 'low_high')
        {
            $products = $products->orderBy('price')->paginate($pagination);
        }
        elseif(request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        }
        elseif(request()->sort == '0-750') {
            $products = $products->whereBetween('price', [0,75000])->orderBy('price')->paginate($pagination);
        }
        elseif(request()->sort == '750-1500') {
            $products = $products->whereBetween('price', [75000,150000])->orderBy('price')->paginate($pagination);
        }
        elseif(request()->sort == '1500-2500+') {
            $products = $products->where('price', '>=', 150000)->orderBy('price')->paginate($pagination);
        }
        else{
            $products = $products->paginate($pagination);
        }

        return view('pages.shop', compact('categories','products','categoryName'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $prodMayYouLike = Product::where('slug','!=',$slug)->MightAlsoLike()->get();

        return view('pages.product', compact('product','categoryName','prodMayYouLike'));
    }
}
