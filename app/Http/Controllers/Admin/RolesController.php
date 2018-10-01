<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Roles as Roles;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Roles::latest()->paginate(10);
        return view('admin.pages.role.index', compact('roles'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.role.create');
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

        $params    =  $request->all();
              
         $validator = Validator::make($params, [
                'name' => 'required',
         ]);

         if ($validator->fails())
         return redirect()->back()->withErrors($validator)->withInput();

         $fields['name']                    =    $params['name'];

         if (isset($params['view_category']))
         $permission['view_category']       =    $params['view_category'];
            else
         $permission['view_category']       =    0;

         if (isset($params['add_category']))
         $permission['add_category']        =    $params['add_category'];
            else
         $permission['add_category']        =    0;

         if (isset($params['edit_category']))
         $permission['edit_category']       =    $params['edit_category'];
            else
         $permission['edit_category']       =    0;

         if (isset($params['delete_category']))
         $permission['delete_category']       =    $params['delete_category'];
            else
         $permission['delete_category']       =    0;


        // Loan

        if (isset($params['view_loan_category']))
         $permission['view_loan_category']       =    $params['view_loan_category'];
            else
         $permission['view_loan_category']       =    0;

         if (isset($params['add_loan_category']))
         $permission['add_loan_category']        =    $params['add_loan_category'];
            else
         $permission['add_loan_category']        =    0;

         if (isset($params['edit_loan_category']))
         $permission['edit_loan_category']            =    $params['edit_loan_category'];
            else
         $permission['edit_loan_category']            =    0;

         if (isset($params['delete_loan_category']))
         $permission['delete_loan_category']            =    $params['delete_loan_category'];
            else
         $permission['delete_loan_category']            =    0;


        // Roles

         if (isset($params['view_roles']))
         $permission['view_roles']               =    $params['view_roles'];
            else
         $permission['view_roles']               =    0;

         if (isset($params['add_roles']))
         $permission['add_roles']                =    $params['add_roles'];
            else
         $permission['add_roles']                =    0;

         if (isset($params['edit_roles']))
         $permission['edit_roles']               =    $params['edit_roles'];
            else
         $permission['edit_roles']               =    0;

         if (isset($params['delete_roles']))
         $permission['delete_roles']             =    $params['delete_roles'];
            else
         $permission['delete_roles']             =    0;


         // close


         // Roles

         if (isset($params['view_users']))
         $permission['view_users']               =    $params['view_users'];
            else
         $permission['view_users']               =    0;

         if (isset($params['add_users']))
         $permission['add_users']                =    $params['add_users'];
            else
         $permission['add_users']                =    0;

         if (isset($params['edit_users']))
         $permission['edit_users']               =    $params['edit_users'];
            else
         $permission['edit_users']               =    0;

         if (isset($params['delete_users']))
         $permission['delete_users']             =    $params['delete_users'];
            else
         $permission['delete_users']             =    0;


         // close


         $permission_array['permission']         =    $permission;

         $fields['permission']                   =    json_encode($permission_array);

         $fields['created_at_timestamp']         =    time();

         Roles::create($fields);

         return redirect()->route('roles.index')->with('success','Role created successfully');

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
        $roles  = Roles::findOrFail($id);
        return view('admin.pages.role.edit',compact('roles'));
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

        $params    =  $request->all();
         
         $validator =  Validator::make($params, [
                'name' => 'required',
         ]);

         if ($validator->fails())
         return redirect()->back()->withErrors($validator)->withInput();
     
         $fields['name']                    =    $params['name'];

         if (isset($params['view_category']))
         $permission['view_category']       =    $params['view_category'];
            else
         $permission['view_category']       =    0;

         if (isset($params['add_category']))
         $permission['add_category']        =    $params['add_category'];
            else
         $permission['add_category']        =    0;

         if (isset($params['edit_category']))
         $permission['edit_category']       =    $params['edit_category'];
            else
         $permission['edit_category']       =    0;

         if (isset($params['delete_category']))
         $permission['delete_category']       =    $params['delete_category'];
            else
         $permission['delete_category']       =    0;

        // Loan

        if (isset($params['view_loan_category']))
         $permission['view_loan_category']       =    $params['view_loan_category'];
            else
         $permission['view_loan_category']       =    0;

         if (isset($params['add_loan_category']))
         $permission['add_loan_category']        =    $params['add_loan_category'];
            else
         $permission['add_loan_category']        =    0;

         if (isset($params['edit_loan_category']))
         $permission['edit_loan_category']       =    $params['edit_loan_category'];
            else
         $permission['edit_loan_category']       =    0;

         if (isset($params['delete_loan_category']))
         $permission['delete_loan_category']            =    $params['delete_loan_category'];
            else
         $permission['delete_loan_category']            =    0;


        // Roles

         if (isset($params['view_roles']))
         $permission['view_roles']               =    $params['view_roles'];
            else
         $permission['view_roles']               =    0;

         if (isset($params['add_roles']))
         $permission['add_roles']                =    $params['add_roles'];
            else
         $permission['add_roles']                =    0;

         if (isset($params['edit_roles']))
         $permission['edit_roles']               =    $params['edit_roles'];
            else
         $permission['edit_roles']               =    0;

         if (isset($params['delete_roles']))
         $permission['delete_roles']             =    $params['delete_roles'];
            else
         $permission['delete_roles']             =    0;

         // close


         // Roles

         if (isset($params['view_users']))
         $permission['view_users']               =    $params['view_users'];
            else
         $permission['view_users']               =    0;

         if (isset($params['add_users']))
         $permission['add_users']                =    $params['add_users'];
            else
         $permission['add_users']                =    0;

         if (isset($params['edit_users']))
         $permission['edit_users']               =    $params['edit_users'];
            else
         $permission['edit_users']               =    0;

         if (isset($params['delete_users']))
         $permission['delete_users']             =    $params['delete_users'];
            else
         $permission['delete_users']             =    0;

         // close


         $permission_array['permission']    =    $permission;

         $fields['permission']              =    json_encode($permission_array);

         $fields['updated_at_timestamp']    =    time();

         Roles::find($id)->update($fields);

         return redirect()->route('roles.index')->with('success','Role updated successfully');

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
    }
}
