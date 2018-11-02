<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order as Order;
use App\City as City;
use App\State as State;

class OrderController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('unix_timestamp', 'desc')->get();
        return view('admin.pages.orders.index', compact('orders'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = Order::findOrFail($id);
		$ship_info                         =    json_decode($order->shipping_address);
		$cityobj                           =    City::select('name')->where('id', $ship_info->city)->first();
		$stateobj                          =    State::select('name')->where('id', $ship_info->state)->first();
		$shipping_address                  =    $ship_info->name . ', ' . $ship_info->address  . ', ' .  $cityobj->name  . ', ' .  $stateobj->name  . ', ' .  $ship_info->pin;
        return view('admin.pages.orders.show',compact('order', 'shipping_address'));
    }

}
