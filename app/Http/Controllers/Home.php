<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Models\User;
use App\Models\Category;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Area;
use App\Models\Item;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Address;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Auth;
use Session;
use Carbon\Carbon;

class Home extends Controller
{
    public function index(Request $request){
        if(User::where([['id',Auth::id()],['isAdmin',1]])->exists()){
            return redirect()->route('adminDashboard');
        }
        elseif(User::where([['id',Auth::id()],['isPartner',1]])->exists()){
            return redirect()->route('partnerDashboard');
        }
        $data = [
            'categories'=>Category::all(),
            'banners'=>Banner::all(),
            'products'=>Item::all(),
        ];
        return view('home', $data);
    }

    public function new_login(Request $request){
        return view('new_login');
    }

    public function partner_login(Request $request){
        return view('partner_login');
    }

    public function partner_register(Request $request){
        $user  = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->isPartner = 1;
        $user->save();
        return redirect()->route('partner_details_page',$user->id);
    }

    public function partner_details_page($id){
        $data = [
            'country'=>Country::all(),
            'state'=>State::all(),
            'district'=>District::all(),
            'area'=>Area::all(),
            'user'=>User::find($id),
            // 'sponsars'=>Partner::with('children')->whereNull('parent_id')->get(),
            'sponsars'=>Partner::all(),
        ];
        return view('partner_detail',$data);
    }

    public function partner_details(Request $request){
        $admin = User::where('isAdmin',1)->first();
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

    public function product_detail(Request $request, $id){
        $item = Item::where(array(['id', $id]))->firstOrFail();
        $area = $request->input('area');
        $data = [
            'cakes'=>Item::find($id),
            'upgrade'=>Item::where('id', '!=', $item->id)->where('title', $item->title)->get(),
            'area'=>Area::where('pincode',$area)->first(),
            'related'=> Item::where('category_id', '=', $item->category->id)->where('id', '!=', $item->id)->with('children')->whereNull('parent_id')->get(),
        ];
        return view('product_detail',$data);
    }
    public function search_area(Request $request, $id){
        $item = Item::where(array(['id', $id]))->firstOrFail();
        $area = $request->input('area');
        $search = Area::where('pincode',$area)->get();
        $data = [
            'cakes'=>Item::find($id),
            'upgrade'=>Item::where('id', '!=', $item->id)->where('title', $item->title)->get(),
            'area'=>Area::where('pincode',$area)->first(),
            'related'=> Item::where('category_id', '=', $item->category->id)->where('id', '!=', $item->id)->with('children')->whereNull('parent_id')->get(),
        ];
        return view('product_detail',$data);

    }

    public function check_partner(Request $request){
        $id = $request->input('id');
        $partner = Partner::where('id',$id)->firstOrFail();
        $data = [
            'partner'=>$partner,
        ];
        return view('partner_checkout',$data);
        
    }
    public function search(Request $r){
        if ($r->search == ""){
            $search = $r->input('searching');
            $cakes = Item::query()->where('title', 'like', "%{$search}%")->orWhere('category_id', 'like', "%{$search}%")
                ->orderBy('created_at', 'desc')->get();
            $data = [
                'categories'=>Category::all(),
                'cakes'=>$cakes,
                'area'=>null,
                
            ];
            return view('search',$data);
        }
        else{
            $search = $r->input('searching');
            $cakes = Item::query()->where('title', 'like', "%{$search}%")->orWhere('category_id', 'like', "%{$search}%")
                ->orderBy('created_at', 'desc')->get();
            $data = [
                'categories'=>Category::all(),
                'cakes'=>$cakes,
                'area'=>Area::where('pincode',$search)->first(),
                
            ];
            return view('search',$data);
        }
    }

    public function getAddToCart(Request $request, $id){
        $product = Item::find($id);
        $oldcart = Session::has('order_items') ? Session::get('order_items'): null;

        $cart = new Cart($oldcart);
        $cart->add($product,$product->id);

        $request->session()->put('order_items',$cart);
        
        return redirect()->route('carts')->with('success', 'Product added to cart successfully!');
    }

    public function carts(Request $r){
        
        if(Auth::check()){
            $search = $r->input('search');
            $user_id = Auth::id();    
            $order = Order::where([['user_id',$user_id],['ordered',0]])->first();
            $orders = Order::where([['user_id',$user_id],['ordered',0]])->doesntExist();
            if ($orders){
                return redirect()->route('home');
            }
            $data = [
                "categories"=>Category::all(),
                "orderitem"=>Order::find($order->id)->orderitem,
                "coupon"=>Order::find($order->id),
                'area'=>Area::where('pincode',$search)->first(),
            ];
            return view('add_to_cart',$data);
        }
        else{
            if(Session::has('order_items')){
                $oldcart = Session::get('order_items');
                $cart = new Cart($oldcart);
                return view('add_to_cart',['products' => $cart->items,'totalPrice' => $cart->totalPrice]);
            }
        }
    }

    public function add_to_cart(Request $request,$cake_id){
        $user_id = Auth::id();
        $area = request('area');
        $order = Order::firstOrCreate([
            'user_id'=>$user_id,
            'ordered'=>0,
        ]);
        $order->area = $area;
        $order->save();
        $oi = OrderItem::where(array(['order_id',$order->id],['item_id',$cake_id]))->first();
        if($oi){
            $qty=$oi->qty+1;
            $oi->qty=$qty;
            $oi->save();
        }
        else{
            $orderItem = new OrderItem();
            $orderItem->order_id=$order->id;
            $orderItem->user_id=$user_id;
            $orderItem->ordered=0;
            $orderItem->item_id=$cake_id;
            $orderItem->qty=1;
            $orderItem->save();
        } 
        return redirect()->route('carts')->with('success','Item added successfully !!');
    }

    public function add_to_cart_details($cake_id){

        $user_id = Auth::id();
        $order = Order::firstOrCreate([
            'user_id'=>$user_id,
            'ordered'=>0,
        ]);
        $oi = OrderItem::where(array(['order_id',$order->id],['item_id',$cake_id]))->first();
        if($oi){
            $qty=$oi->qty+1;
            $oi->qty=$qty;
            $oi->save();
        }
        else{
            $orderItem = new OrderItem();
            $orderItem->order_id=$order->id;
            $orderItem->user_id=$user_id;
            $orderItem->ordered=0;
            $orderItem->item_id=$cake_id;
            $orderItem->qty=1;
            $orderItem->save();
        } 
        return redirect()->route('carts')->with('success','Item added successfully !!');
    }

    public function remove_Cart(Request $req,$cake_id){
        $user_id = Auth::id();    
        $cake = Item::find($cake_id);
        if($cake){
            $order = Order::where([['user_id',$user_id],['ordered',false]])->first();
            if($order){
               
                $oi= OrderItem::where([['user_id',$user_id],['ordered',false],["item_id",$cake->id]])->first();
                if($oi){
                    if($oi->qty > 1){
                        $qty=$oi->qty-1;
                        $oi->qty=$qty;
                        $oi->save();
                    }
                    else{
                        return redirect()->route('removeitem',['id'=>$cake_id]);
                    }
                }
            }
            return redirect('carts')->with(['success' => 'Course removed successfully from your cart','alert'=>'alert-danger']);
        }
        else{
           return redirect()->back();
        }
    }

    public function removeitem($cake_id){
        $user_id = Auth::id(); 
        $cake = Item::find($cake_id);
        if($cake){
            $order = Order::where([['user_id',$user_id],['ordered',false]])->first();
            if($order){
                $orderItem = OrderItem::where([['user_id',$user_id],['ordered',false],["item_id",$cake->id]])->first();
                if($orderItem){
                    $orderItem->delete();
                }
            }   
            return redirect('carts')->with(['success' => 'Cake removed successfully from your cart','alert'=>'alert-danger']);
        }
        else {
            return redirect()->back();   
        }
    }

    public function apply_coupon(){
        $user_id = Auth::id(); 
        $couponCode = request('coupon_code');
        $couponData = Coupon::where('code', $couponCode)->first();

        if($couponData) {
            $order = Order::where(array(['ordered',0],['user_id',$user_id]))->first();
            $order->coupon_id = $couponData->id;
            $order->save();
            return redirect()->back()->with('success','coupon applied');
        }
        else{
            return back()->with('error','Coupon Does not Exist!');
        }
    }

    public function remove_coupon(){
        $user_id = Auth::id(); 
        
        $order = Order::where(array(['ordered',0],['user_id',$user_id]))->first();
        $order->coupon_id = null;
        $order->save();
        return redirect()->route('carts')->with('success','coupon removed');
    }

    public function checkout(Request $r){
            $user = Auth::id();
            $order = Order::where(array(['ordered',0],['user_id',$user]))->first();
            $data = [
                'country'=>Country::all(),
                'state'=>State::all(),
                'district'=>District::all(),
                'areas'=>Area::all(),
                "categories"=>Category::all(),
                'address'=>Address::where('user_id',$user)->get(),
                "orderitem"=>Order::find($order->id)->orderitem,
                "coupon"=>Order::find($order->id),
                'delivery_charge'=> Area::where('pincode',$order->area)->first(),
            ];
            return view('checkout',$data);
    }

    public function insert_address(Request $req){
        $req->validate([
            'name' => 'required',
            'contact' => 'required',
            'street' => 'required',
            'area_id' => 'required',
            'district_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
        ]);
        $user = Auth::id();
        $address = Address::Create([
         'name' => $req->name,
         'contact' => $req->contact,
         'contact2' => $req->contact2,
         'street' => $req->street,
         'area_id' => $req->area_id,
         'district_id' => $req->district_id,
         'state_id' => $req->state_id,
         'country_id' => $req->country_id,
         'user_id' => $user,
        ]);
        return redirect()->back();
    }

    public function order(Request $request){
        $user_id = Auth::id();
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
        return redirect()->route('place_order',$order->id);
    }

    public function place_order(Request $r,$order_id){
        $order = Order::find($order_id);
        $data = [
            'order'=>$order,
            "orderitem"=>Order::find($order->id)->orderitem,
            'categories'=>Category::All(),
        ];
        return view('place_order',$data);
    }

    public function confirm(Request $r){
        $date = Carbon::now();
        $user_id = Auth::id();
        $order = Order::where(array(['ordered',0],['user_id',$user_id]))->first();
        $orderItem = Order::find($order->id)->orderitem;
        $order->ordered = True;
        $order->isPending  = 1;
        $order->order_date = $date->toDateString();
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

}
