<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categories as Categories;
use App\Product as Product;
use Cart;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $wallpaper_images      = Categories::orderBy('id', 'asc')->limit(5)->get();
            $best_selling_products = Product::get();
            return view('pages.home', compact('wallpaper_images', 'best_selling_products'));
        }

    public function search(Request $request)
      {          
          $params       = $request->all();
          $search_param = $params['search']; 
          $products     = DB::table('products')
                            ->select('products.id', 'products.name', 'products.slug', 'products.price')
                            ->where('name', 'like', '%'.$search_param.'%')
                            ->get();
          return view('pages.category.product', compact('products'));
      }
}
