<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

use App\Helpers\MyHelper as MyHelper;
use Auth;

use App\User as User;
use App\Ads as Ads;
use App\Categories as Category;
use App\State as State;
use App\City as City;
use App\Newsletter as Newsletter;
use App\Contact as Contact;
use App\Product as Product;
use App\Order as Order;

class DashboardController extends Controller
{
    //
    public function dashboard()
        {
            /* dashboard */
            $start_time              =  mktime(0, 0, 0, date('m'), 1, date('Y'));
            $end_time                =  mktime(23, 59, 59, date('m'), date('d'), date('Y'));

            $total_products_month    =  Product::where('created_timestamp', '>=', $start_time)->where('created_timestamp', '<=', $end_time)->count();
            $total_products          =  Product::count();

            $new_users               =  User::where('role_id', 0)->where('unix_timestamp', '>=', $start_time)->where('unix_timestamp', '<=', $end_time)->count();
            $total_users             =  User::where('role_id', 0)->count();

            $total_orders_month      =  Order::where('unix_timestamp', '>=', $start_time)->where('unix_timestamp', '<=', $end_time)->count();
            $total_orders            =  Order::count();

            $total_category          =  Category::where('parent_id', '=', 0)->count();

            for ($i = 11; $i >= 0; $i--)
                 {
                    $strtotime   = strtotime("-$i months");
                    $month       = date('n', $strtotime);
                    $year        = date('Y', $strtotime);
                    $date_start  = mktime(0, 0, 0, $month, 1, $year);
                    $date_end    = mktime(23, 59, 59, $month, date("t", $strtotime), $year);

                    $order_month =  Order::where('unix_timestamp', '>=', $date_start)->where('unix_timestamp', '<=', $date_end)->count();
                    $sale        =  Order::where('unix_timestamp', '>=', $date_start)->where('unix_timestamp', '<=', $date_end)->sum('payable_amount');

                    $mname       =  date("M'y", $date_start);
                    $order['name']      = $mname;
                    $order['y']         = $order_month;
                    $order['sale']      = $sale;
                    $order['drilldown'] = 'sfsdfsd';
                    $order_array[]      = $order;
                 }

            return view('admin.pages.dashboard.home', compact('total_products_month', 'total_products', 'total_users', 'new_users', 'total_category', 'total_orders_month', 'total_orders', 'order_array'));
        }
        
    public function subscribes()
     {
         $subscribe_users = Newsletter::select('id', 'email', 'ip_address', 'timestamp')->get();
         return view('admin.pages.newsletter.index', compact('subscribe_users'))->with('i', 1);
     }

    public function destroy($id)
     {
         Newsletter::where('id', $id)->delete();
         return redirect()->route('admin.subscribes')->with('delete','Deleted successfully');
     }

    public function contactUsUsers()
     {
         $results = Contact::select('id', 'name', 'email', 'msg', 'ip', 'timestamp', 'phone', 'user_agent')->get();
         return view('admin.pages.contactus.index', compact('results'))->with('i', 1);
     }

    public function destroyContactUs($id)
     {
         Contact::where('id', $id)->delete();
         return back()->with('delete','Deleted successfully');
     }

    public function logout()
        {
            Auth::logout();
            return redirect()->route('admin.get.login');
        }
}
