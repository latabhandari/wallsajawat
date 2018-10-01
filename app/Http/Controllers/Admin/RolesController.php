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

         request()->validate(['name'  => 'required']);

         $params    =  $request->all();

         $fields['name']                    =    $params['name'];

         if (isset($params['view_categories']))
         $permission['view_categories']       =    $params['view_categories'];
            else
         $permission['view_categories']       =    0;

         if (isset($params['add_category']))
         $permission['add_category']        =    $params['add_category'];
            else
         $permission['add_category']        =    0;

         if (isset($params['edit_category']))
         $permission['edit_category']       =    $params['edit_category'];
            else
         $permission['edit_category']       =    0;

         if (isset($params['destroy_category']))
         $permission['destroy_category']       =    $params['destroy_category'];
            else
         $permission['destroy_category']       =    0;

        // Product

        if (isset($params['view_products']))
         $permission['view_products']           =    $params['view_products'];
            else
         $permission['view_products']           =    0;

         if (isset($params['add_product']))
         $permission['add_product']             =    $params['add_product'];
            else
         $permission['add_product']             =    0;

         if (isset($params['edit_product']))
         $permission['edit_product']            =    $params['edit_product'];
            else
         $permission['edit_product']            =    0;

         if (isset($params['destroy_product']))
         $permission['destroy_product']            =    $params['destroy_product'];
            else
         $permission['destroy_product']            =    0;


        // Roles

         if (isset($params['view_roles']))
         $permission['view_roles']               =    $params['view_roles'];
            else
         $permission['view_roles']               =    0;

         if (isset($params['add_role']))
         $permission['add_role']                 =    $params['add_role'];
            else
         $permission['add_role']                 =    0;

         if (isset($params['edit_role']))
         $permission['edit_role']               =    $params['edit_role'];
            else
         $permission['edit_role']               =    0;

         if (isset($params['destroy_role']))
         $permission['destroy_role']             =    $params['destroy_role'];
            else
         $permission['destroy_role']             =    0;

         // close


         // Roles

         if (isset($params['view_users']))
         $permission['view_users']               =    $params['view_users'];
            else
         $permission['view_users']               =    0;

         if (isset($params['add_user']))
         $permission['add_user']                 =    $params['add_user'];
            else
         $permission['add_user']                 =    0;

         if (isset($params['edit_user']))
         $permission['edit_user']                =    $params['edit_user'];
            else
         $permission['edit_user']                =    0;

         if (isset($params['destroy_user']))
         $permission['destroy_user']             =    $params['destroy_user'];
            else
         $permission['destroy_user']             =    0;

         // close


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
         
         request()->validate(['name'  => 'required']);

         $params    =  $request->all();
     
         $fields['name']                    =    $params['name'];

         if (isset($params['view_categories']))
         $permission['view_categories']       =    $params['view_categories'];
            else
         $permission['view_categories']       =    0;

         if (isset($params['add_category']))
         $permission['add_category']        =    $params['add_category'];
            else
         $permission['add_category']        =    0;

         if (isset($params['edit_category']))
         $permission['edit_category']       =    $params['edit_category'];
            else
         $permission['edit_category']       =    0;

         if (isset($params['destroy_category']))
         $permission['destroy_category']       =    $params['destroy_category'];
            else
         $permission['destroy_category']       =    0;

        // Product

        if (isset($params['view_products']))
         $permission['view_products']           =    $params['view_products'];
            else
         $permission['view_products']           =    0;

         if (isset($params['add_product']))
         $permission['add_product']             =    $params['add_product'];
            else
         $permission['add_product']             =    0;

         if (isset($params['edit_product']))
         $permission['edit_product']            =    $params['edit_product'];
            else
         $permission['edit_product']            =    0;

         if (isset($params['destroy_product']))
         $permission['destroy_product']            =    $params['destroy_product'];
            else
         $permission['destroy_product']            =    0;


        // Roles

         if (isset($params['view_roles']))
         $permission['view_roles']               =    $params['view_roles'];
            else
         $permission['view_roles']               =    0;

         if (isset($params['add_role']))
         $permission['add_role']                 =    $params['add_role'];
            else
         $permission['add_role']                 =    0;

         if (isset($params['edit_role']))
         $permission['edit_role']               =    $params['edit_role'];
            else
         $permission['edit_role']               =    0;

         if (isset($params['destroy_role']))
         $permission['destroy_role']             =    $params['destroy_role'];
            else
         $permission['destroy_role']             =    0;

         // close


         // Roles

         if (isset($params['view_users']))
         $permission['view_users']               =    $params['view_users'];
            else
         $permission['view_users']               =    0;

         if (isset($params['add_user']))
         $permission['add_user']                 =    $params['add_user'];
            else
         $permission['add_user']                 =    0;

         if (isset($params['edit_user']))
         $permission['edit_user']                =    $params['edit_user'];
            else
         $permission['edit_user']                =    0;

         if (isset($params['destroy_user']))
         $permission['destroy_user']             =    $params['destroy_user'];
            else
         $permission['destroy_user']             =    0;

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
