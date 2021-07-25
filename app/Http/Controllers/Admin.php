<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Partner;
use App\Models\Order;
use App\Models\Area;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Item;
use App\Models\Delivery_Person;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class Admin extends Controller
{
    public function index(Request $request){
        if(User::where([['id',Auth::id()],['isAdmin',1]])->exists()){
            $data = [
                'category'=>Category::all()->count(),
                'order'=>Order::all()->count(),
                'orders'=>Order::all(),
                'partner'=>Partner::all()->count(),
                'partners'=>Partner::all(),
                'product'=>Item::all()->count(),
                'products'=>Item::all(),
            ];
            return view('admin.home', $data);
        }
        elseif(User::where([['id',Auth::id()],['isPartner',1]])->exists()){
            return redirect()->route('partnerDashboard');
        }
        return redirect()->route('home');
    }

    public function network(Request $request){
   
        $data = [
            'sponsr' => Partner::where('parent_id', '=', null)->get(),
            
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

    public function print_orders(Request $request){
        $order = Order::where(array(['ordered',1],['isPending',1]))->get();
        $data = [
            'categories'=>Category::all()->count(),  
            'orderitem'=>Order::where(array(['isPending',1],['ordered',1]))->get(),
        ];
        return view('admin.print_order',$data);
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

    public function print_area_order($id){
        $date = Carbon::now();
        $todayDate = $date->toDateString();
        $area=Area::find($id);
        $data = [
            'categories'=>Category::all()->count(),  
            'orderitem'=>Order::where(array(['isPending',1],['ordered',1],['order_date',$todayDate],['area',$area->pincode]))->get(),
        ];
        return view('admin.print_area_order',$data);

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

    public function register_downline_admin(){
        return view('admin.register_downline');
    }

    public function submit_downline_admin(Request $request){
        $user  = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->isPartner = 1;
        $user->save();
        return redirect()->route('downline_details_page_admin',$user->id);
    }

    public function downline_details_page_admin($id){
        $user = Auth::id();
        $data = [
            'country'=>Country::all(),
            'state'=>State::all(),
            'district'=>District::all(),
            'area'=>Area::all(),
            'user'=>User::find($id),
            // 'sponsars'=>Partner::with('children')->whereNull('parent_id')->get(),
            'sponsars'=>Partner::all(),
            'partner'=>Partner::where('user_id',$user)->first(),
        ];
        return view('admin.downline_detail',$data);
    }

    public function partner_details_admin(Request $request){
        $admin = User::where('isAdmin',1)->first();
        $user = Auth::id();
        $partner = Partner::where('user_id',$user)->first();
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'street'=>'required',
            'dob'=>'required',
            'contact'=>'required|numeric|min:10',
            'street'=>'required|string',
            'country_id'=>'required',
            'state_id'=>'required',
            'area_id'=>'required',
            'district_id'=>'required',
            'user_id'=>'required',
        ]);

        $filename = time(). "." . $request->image->extension();
        $request->image->move(public_path("upload"), $filename);

        $vendor = new Partner();
        $vendor->first_name = $request->input('first_name');
        $vendor->last_name = $request->input('last_name');
        $vendor->contact = $request->input('contact');
        $vendor->dob = $request->input('dob');
        $vendor->optional_contact= $request->input('optional_contact');
        $vendor->street = $request->input('street');
        $vendor->country_id = $request->input('country_id');
        $vendor->state_id = $request->input('state_id');
        $vendor->district_id = $request->input('district_id');
        $vendor->area_id = $request->input('area_id');
        $vendor->user_id =$request->user_id;
        // if($request->parent_id == null){
        //     $vendor->parent_id = $admin;
        // }
        $vendor->parent_id = $request->parent_id;
        $vendor->position = $request->position;
        $vendor->image = $filename;
        $vendor->save();      
        return redirect()->route('home');
    }
}
