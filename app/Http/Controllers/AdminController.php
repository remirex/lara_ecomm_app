<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();

        $products_per_page = 10;
        $products = Product::paginate($products_per_page);

        return view('admin.partials.index', compact('admin','products'));
    }

    public function addProduct()
    {
        $categories = Category::all();

        $products_per_page = 10;
        $products = Product::paginate($products_per_page);

        return view('admin.partials.addProduct', compact('categories','products'));
    }

    public function saveProduct(Request $request)
    {
        $name = $request->input('name');
        $slug = $request->input('slug');
        $details = $request->input('details');
        $price = $request->input('price');
        $description = $request->input('description');
        $category_id = $request->input('categories');

        $validator = Validator::make($request->all(),[
            'categories' => 'required|numeric',
            'name' => 'required',
            'slug' => 'required',
            'details' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect('admin/add_product')->withErrors($validator);
        }

        Product::create([
            'name' => $name,
            'slug' => $slug,
            'details' => $details,
            'price' => $price,
            'description' => $description
        ])->categories()->attach($category_id);

        Session::flash('message','Poduct successfully added');

        return redirect('admin/add_product');
    }

    public function editProduct($pro_id, Request $request)
    {
        $name = $request->input('name');
        $slug = $request->input('slug');
        $details = $request->input('details');
        $price = $request->input('price');
        $description = $request->input('description');

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required',
            'details' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect('admin/edit_product/'.$pro_id)->withErrors($validator);
        }

        Product::where('id', $pro_id)->update([
            'name' => $name,
            'slug' => $slug,
            'details' => $details,
            'price' => $price,
            'description' => $description
        ]);



        return redirect('admin/edit_product/'.$pro_id);
    }

    public function saveCoupon(Request $request)
    {
        $code = $request->input('code');
        $type = $request->input('type');
        $value = $request->input('value');
        $percent_off = $request->input('percent_off');

        $validator = Validator::make($request->all(),[
            'code' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
            'percent_off' => 'required|numeric'
        ]);

        if($validator->fails())
        {
            return redirect('/admin')->withErrors($validator);
        }

        DB::table('coupons')->insert([
            'code' => $code,
            'type' => $type,
            'value' => $value,
            'percent_off' => $percent_off
        ]);

        Session::flash('message','Coupon successfully added');

        return redirect('/admin');
    }

    public function addCategory()
    {
        $categories = Category::all();
        return view('admin.partials.addCategory', compact('categories'));
    }

    public function saveCategory(Request $request)
    {
        $name = $request->input('name');
        $slug = $request->input('slug');

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required'
        ]);

        if($validator->fails()){
            return redirect('admin/add_category')->withErrors($validator);
        }

        Category::create([
            'name' => $name,
            'slug' => $slug
        ]);

        Session::flash('message','Category successfully added');

        return redirect('admin/add_category');
    }

    public function editCategory($cat_id, Request $request)
    {
        $name = $request->input('name');
        $slug = $request->input('slug');

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required'
        ]);

        if($validator->fails()){
            return redirect('admin/edit_category/'.$cat_id)->withErrors($validator);
        }

        Category::where('id',$cat_id)->update([
            'name' => $name,
            'slug'=> $slug
        ]);

        Session::flash('message','Category successfully updated');

        return redirect('admin/edit_category/'.$cat_id);

    }
}
