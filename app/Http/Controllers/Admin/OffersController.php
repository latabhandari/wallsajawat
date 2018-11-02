<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Offer as Offers;
use Route;

class OffersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $offers = Offers::get();
        return view('admin.pages.offers.index', compact('offers'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //
         request()->validate(['coupon' => 'required|string||string|max:255|unique:offers,coupon', 'type' => 'required', 'discount' => 'required|numeric', 'start_date' => 'required', 'end_date' => 'required']);
 
         $params                            =    $request->all();

         $fields['coupon']                  =    $params['coupon'];
         $fields['type']                    =    $params['type'];
         $fields['discount']                =    $params['discount'];
         list($m, $d, $y)                   =    explode('/', $params['start_date']);

         $fields['start_date']              =    mktime(0, 0, 0, $m, $d, $y);


         list($m, $d, $y)                   =    explode('/', $params['end_date']);
         $fields['end_date']                =    mktime(23, 59, 59, $m, $d, $y);

         $fields['status']                  =    $params['status'];
                 
         $fields['unix_timestamp']          =    time();

         Offers::create($fields);

         return redirect()->route('offers.index')->with('success','Coupon added successfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $offers  = Offers::findOrFail($id);
        return view('admin.pages.offers.edit',compact('offers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         request()->validate(['coupon' => 'required|string|max:255', 'type' => 'required', 'discount' => 'required', 'start_date' => 'required', 'end_date' => 'required']);
 
         $params                            =    $request->all();

         $fields['coupon']                  =    $params['coupon'];
         $fields['type']                    =    $params['type'];
         $fields['discount']                =    $params['discount'];
         list($m, $d, $y)                   =    explode('/', $params['start_date']);

         $fields['start_date']              =    mktime(0, 0, 0, $m, $d, $y);

         list($m, $d, $y)                   =    explode('/', $params['end_date']);
         $fields['end_date']                =    mktime(23, 59, 59, $m, $d, $y);
         $fields['status']                  =    $params['status'];

         Offers::find($id)->update($fields);

         return redirect()->route('offers.index')->with('success','Coupon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $id = Offers::find( $id );
        $id->delete();
        return redirect()->route('offers.index')->with('success','Coupon deleted successfully');
    }
}
