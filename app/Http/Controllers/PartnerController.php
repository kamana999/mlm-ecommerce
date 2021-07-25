<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Order;
use App\Models\Address;
use App\Models\Area;
use Auth;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        $user = Auth::id();
        $partner = Partner::where('user_id', '=', $user)->first();
        $data = [
            'category'=>Category::all()->count(),
            'order'=>Order::where('user_id',$user)->count(),
            'orders'=>Order::where('user_id',$user)->get(),
            'partner'=>Partner::where('parent_id', '=', $partner->id)->count(),
            'partners'=>Partner::where('parent_id', '=', $partner->id)->get(),
            'product'=>Item::all()->count(),
            'products'=>Item::all(),
        ];
        return view('partner.home',$data);
    }

    public function ecommerce(){
        $data = [
            'categories'=>Category::all(),
            'banners'=>Banner::all(),
            'products'=>Item::all(),
        ];
        return view('home', $data);
    }

    public function check_partner(Request $request){
        $user = Auth::id();
        $id = $request->input('id');
        $partner = Partner::where('id',$id)->firstOrFail();
        $add = $partner->user_id;
        $order = Order::where(array(['ordered',0],['user_id',$user]))->first();
        $data = [
            'partner'=>$partner,
            "orderitem"=>Order::find($order->id)->orderitem,
            "coupon"=>Order::find($order->id),
            'address'=>Address::where('user_id',$add)->get(),
            'country'=>Country::all(),
            'state'=>State::all(),
            'district'=>District::all(),
            'areas'=>Area::all(),
            'delivery_charge'=> Area::where('pincode',$order->area)->first(),
        ];
        return view('partner.partner_checkout',$data);
        
    }

    public function insert_partner_address(Request $req ,$id ){
        $req->validate([
            'name' => 'required',
            'contact' => 'required',
            'street' => 'required',
            'area_id' => 'required',
            'district_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
        ]);
        $partner = Partner::where('id',$id)->firstOrFail();
        $add = $partner->user_id;
        $address = Address::Create([
         'name' => $req->name,
         'contact' => $req->contact,
         'contact2' => $req->contact2,
         'street' => $req->street,
         'area_id' => $req->area_id,
         'district_id' => $req->district_id,
         'state_id' => $req->state_id,
         'country_id' => $req->country_id,
         'user_id' => $add,
        ]);
        return redirect()->back();
    }

    public function partner_order(Request $r,$id){
        $user_id = Auth::id();
        $partner = Partner::where('id',$id)->first();
        $address_id = request('address');
        $delivery_type = request('delivery');
        $address = Address::where('id',$address_id)->first();
        $order = Order::where(array(['ordered',0],['user_id',$user_id]))->first();

        $order->address_id = $address->id;
        $order->delivery_type = $delivery_type;
        if($delivery_type == "Economy Delivery"){
            $delivery_charge= Area::where('pincode',$order->area)->first();
            $order->delivery_charge = $delivery_charge->delivery_charge;
        }
        elseif($delivery_type == "Standard Delivery"){
            $order->delivery_charge = 00;
        }
        $order->save();
        return redirect()->route('partner_place_order', ['id'=>$partner->id, 'order_id'=>$order->id]);
    }

    public function partner_place_order(Request $r,$id,$order_id){
        $order = Order::find($order_id);
        $partner = Partner::where('id',$id)->first();
        $data = [
            'order'=>$order,
            'partner'=>$partner,
            "orderitem"=>Order::find($order->id)->orderitem,
            'categories'=>Category::All(),
        ];
        return view('partner.partner_place_order',$data);
    }

    public function confirm_partner_order(Request $r,$id){
        $date = Carbon::now();
        $user_id = Auth::id();
        $partner = Partner::where('id',$id)->first();
        $order = Order::where(array(['ordered',0],['user_id',$user_id]))->first();
        $orderItem = Order::find($order->id)->orderitem;
        $order->ordered = True;
        $order->isPending  = 1;
        $order->order_date = $date->toDateString();
        $order->user_id = $partner->user_id;
        $orderItem->map(function ($oi){
            $oi->ordered = True;
            $oi->save();
        });
        $order->save();

        $data = [
            'categories'=>Category::All(),
        ];
        return view('confirm_order',$data);
    }

    public function partner_network(Request $request){
        $user = Auth::id();
        $data = [
            // 'sponsr' => Partner::where('parent_id', '=', null)->get(),
            'sponsr' => Partner::where('user_id', '=', $user)->get(),
            'sponsrs'=>Partner::pluck('first_name','id')->all(),
            'sponsrss'=>Partner::all(),
            'user'=>$user,
        ];
        return view('partner.network',$data);
    }

    public function register_downline(){
        return view('partner.register_downline');
    }

    public function submit_downline(Request $request){
        $user  = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->isPartner = 1;
        $user->save();
        return redirect()->route('downline_details_page',$user->id);
    }

    public function downline_details_page($id){
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
        return view('partner.downline_detail',$data);
    }

    public function partner_details(Request $request){
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

    public function member_list(){
        $user = Auth::id();
        $data = [
            'sponsr' => Partner::where('user_id', '=', $user)->get(),
        ]; 
        return view('partner.member_list',$data);
    }
}
