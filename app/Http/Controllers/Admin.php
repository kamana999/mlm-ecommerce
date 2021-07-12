<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Partner;
use App\Models\Order;
use App\Models\Area;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index(Request $request){
        if(User::where([['id',Auth::id()],['isAdmin',1]])->exists()){
            $data = [
            ];
            return view('admin.home');
        }
        elseif(User::where([['id',Auth::id()],['isPartner',1]])->exists()){
            return redirect()->route('partnerDashboard');
        }
        return redirect()->route('home');
    }

    public function network(Request $request){
   
        $data = [
            'sponsr' => Partner::where('parent_id', '=', null)->get(),
            'sponsrs'=>Partner::pluck('first_name','id')->all(),
            'sponsrss'=>Partner::all(),
        ];
        return view('admin.network',$data);
    }

    public function orders(Request $request){
        $order = Order::where(array(['ordered',1],['isPending',1]))->get();
        $data = [
            'categories'=>Category::all()->count(),  
            'orderitem'=>Order::where(array(['isPending',1],['ordered',1]))->get(),
        ];
        return view('admin.order',$data);
    }
    public function area_orders(Request $request){
        $date = Carbon::now();
        $todayDate = $date->toDateString();
        $order = Order::where(array(['ordered',1],['isPending',1],))->get();
        $data = [
            'area'=>Area::all(),
            'categories'=>Category::all()->count(),  
            'orderitem'=>Order::where(array(['isPending',1],['ordered',1],['order_date',$todayDate]))->get(),
        ];
        return view('admin.area_order',$data);
    }
}
