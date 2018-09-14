<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Measurement as Measurement;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $measurement = Measurement::orderBy('display_order', 'ASC')->get();
        return view('admin.pages.measurement.index', compact('measurement'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.measurement.create');
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
         request()->validate(['name' => 'required', 'square_feet_value' => 'required', 'display_order' => 'required']);

         $params                            =    $request->all();

         $fields['name']                    =    $params['name'];
         $fields['square_feet_value']       =    $params['square_feet_value'];
         $fields['display_order']           =    $params['display_order'];
         $fields['status']                  =    $params['status'];
                 
         Measurement::create($fields);

         return redirect()->route('measurement.index')->with('success','Measurement created successfully');
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
        $measurement  = Measurement::findOrFail($id);
        return view('admin.pages.measurement.edit',compact('measurement'));
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
        request()->validate(['name' => 'required', 'square_feet_value' => 'required', 'display_order' => 'required']);

        $params                            =    $request->all();
        $fields['name']                    =    $params['name'];
        $fields['square_feet_value']       =    $params['square_feet_value'];
        $fields['display_order']           =    $params['display_order'];
        $fields['status']                  =    $params['status'];

        Measurement::find($id)->update($fields);

        return redirect()->route('measurement.index')->with('success','Measurement updated successfully');
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
         $id = Measurement::find( $id );
         $id->delete();
         return redirect()->route('measurement.index')->with('success','Measurement deleted successfully');
    }
}
