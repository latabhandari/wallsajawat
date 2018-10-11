<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    public function about()
     {
     	 return view('pages.cms.about');
     }

    public function contact()
     {
     	 return view('pages.cms.contact');
     }

    public function contactpost()
     {
     	 request()->validate(['name'  => 'required', 'email' => 'required|email', 'msg' => 'required', 'phone' => 'required']);

     	 $params = $request->all();

     	 $data['name']   		= 	$params['name'];
         $data['email']         =   $params['email'];
     	 $data['phone']  		= 	$params['phone'];
     	 $data['msg']    		= 	$params['msg'];
     	 $data['ip']     		= 	$request->ip();
     	 $data['user_agent']    = 	$request->header('User-Agent');
     	 $data['timestamp']     = 	time(); 

         //Contact::insert($data);  

         return redirect()->route('contact')->with('success','success'); 

     }

    public function terms()
     {
     	 return view('pages.cms.terms');
     }

    public function policy()
     {
     	 return view('pages.cms.policy');
     }

    public function range()
     {
     	 return view('pages.cms.range');
     }

    public function installer()
     {
     	 return view('pages.cms.installer');
     }

    public function measure()
     {
     	 return view('pages.cms.measure');
     }

    public function offers()
     {
     	 return view('pages.cms.offers');
     }
}
