<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Partner;
use App\Models\Order;
use App\Models\Area;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Item;
use App\Models\Delivery_Person;
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

    public function product_order(){
        $date = Carbon::now();
        $todayDate = $date->toDateString();
        $order = Order::where(array(['ordered',1],['isPending',1],['order_date',$todayDate]))->get();
        $data = [
            'product' => Item::all(),
            'orderitem'=>Order::where(array(['isPending',1],['ordered',1],['order_date',$todayDate]))->get(),
        ];
        return view('admin.product_order', $data);

    }

    public function order_confirm(){
        $order = Order::where(array(['isConfirm',1],['ordered',1]))->get();
        $data = [
            'categories'=>Category::all()->count(),
            'orderitem'=>Order::where(array(['isConfirm',1],['ordered',1]))->get(),
        ];
        return view('admin.order_confirm',$data);
    }
    public function out_for_delivery(){
        $order = Order::where(array(['outForDelivery',1],['ordered',1]))->get();
        $data = [
            'categories'=>Category::all()->count(),
            'orderitem'=>Order::where(array(['outForDelivery',1],['ordered',1]))->get(),
        ];
        return view('admin.out_for_delivery', $data);   
    }
    public function order_completed(){
        $order = Order::where(array(['orderCompleted',1],['ordered',1]))->first();
        $data = [
            'categories'=>Category::all()->count(),
            'orderitem'=>Order::where(array(['orderCompleted',1],['ordered',1]))->get(),
        ];
        return view('admin.order_completed', $data);   
    }
    public function cancle(){
        $data = [
            'categories'=>Category::all()->count(),
            'orderitem'=>Order::where(array(['isCancle',1],['ordered',1]))->get(),
        ];
        return view('admin.cancle_order', $data);
    }
    public function assign_delivery_boy($order_id){
        $order = Order::find($order_id);
        $user = Auth::id();
        $delivery_boy = Delivery_Person::where(array(['status','active']))->get();
        $data = [
            'delivery'=>$delivery_boy,  
            'categories'=>Category::all()->count(),
            'order'=>$order,

        ];
        return view('admin.assign_delivery',$data);
    }
    public function submit_delivery_boy($order_id){
        $order = Order::find($order_id);
        $delivery = request('delivery');
        $delivery_boy = Delivery_Person::where('id',$delivery)->first();
        $d = Delivery_Person::find($delivery_boy->id);
        $order->delivery_boy_id = $delivery_boy->id;
        $order->outForDelivery = 1;
        $order->isConfirm = 0;
        $order->save();
        $d->status = "inactive";
        $d->save();
        return redirect()->route('out_for_delivery');
    }
    public function cancle_order($order_id){
        $order = Order::find($order_id);
        $order->isPending = 0;
        $order->isCancle = 1;
        
        $order->save();
        $data = [
            'categories'=>Category::all()->count(),
            'orderitem'=>Order::where(array(['isCancle',1],['ordered',1]))->get(),
        ];
        return view('admin.cancle_order', $data);
    }
    public function show_orders($order_id){
    
        $order = Order::find($order_id);
        $data = [
            'categories'=>Category::all()->count(),
            'orders'=>$order,
        ];
        return view('admin.show_orders',$data);
    }
}
