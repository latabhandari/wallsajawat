<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order as Order;

class OrderController extends Controller
{
    //

    $orders = Order::all();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();
        return view('admin.pages.order.index', compact('orders'))->with('i', (request()->input('page', 1) - 1) * 10);
    }



}
