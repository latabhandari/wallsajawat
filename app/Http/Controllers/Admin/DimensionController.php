<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dimenstion as Dimenstion;

class DimensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dimensions = Dimension::get();
        return view('admin.pages.dimension.index', compact('dimensions'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.dimension.create');
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
         request()->validate(['name' => 'required', 'width' => 'required', 'height' => 'required']);

         $params                             =    $request->all();
         $fields['name']                     =    $params['name'];
         $fields['width']                    =    $params['width'];
         $fields['height']                   =    $params['height'];

         $fields['created_at_timestamp']    =    time();

         Dimension::create($fields);

         return redirect()->route('dimensions.index')->with('success','Dimension created successfully');
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
        $dimension  = Dimension::findOrFail($id);
        return view('admin.pages.dimension.edit',compact('dimension'));
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
        request()->validate(['name' => 'required', 'slug' => 'required', 'status']);

        $params                             =    $request->all();
        $fields['name']                     =    $params['name'];
        $fields['width']                    =    $params['width'];
        $fields['height']                   =    $params['height'];

        $fields['updated_at_timestamp']     =    time();

        Dimension::find($id)->update($fields);

        return redirect()->route('dimensions.index')->with('success','Dimension updated successfully');
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
         $id = Dimension::find($id);
         $id->delete();
         return redirect()->route('dimensions.index')->with('success','Dimension deleted successfully');
    }
}
