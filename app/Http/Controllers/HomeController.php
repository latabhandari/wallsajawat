<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categories as Categories;
use App\Product as Product;
use Cart;

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
            $wallpaper_images      = Categories::where('wallpaper_pos', '!=', 0)->orderBy('wallpaper_pos', 'asc')->limit(5)->get();
            $best_selling_products = Product::get();
            return view('pages.home', compact('wallpaper_images', 'best_selling_products'));
        }
}
