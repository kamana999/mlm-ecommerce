<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories'=>Category::all(),
            'cakes'=>Product::all(),
            'cake'=>Product::with('children')->whereNull('parent_id')->get(),
        ];
        return view('admin.product',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'cakes'=>Product::with('children')->whereNull('parent_id')->get(),
            'categories'=>Category::all(),
            
        ];
        return view('admin.add_product', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        if($request->hasFile('images')){
            foreach($request->file('images')as $image){
                $name = $image->getClientOriginalName();
                $image->move(public_path('upload'),$name);
                $data[] = $name;
            }
        }
        $filename1 = time(). "." . $request->image->extension();
        $request->image->move(public_path("upload"), $filename1);
        $cake = new Product();
        $cake->category_id = $request->category_id;
        $cake->title = $request->title;
        $cake->price = $request->price;
        $cake->discount_price = $request->discount_price;
        $cake->weight_type = $request->weight_type;
        $cake->weight = $request->weight;
        $cake->unit = $request->unit;
        $cake->description = $request->description;
        
        $cake->parent_id = $request->parent_id;
        $cake->image = $filename1;
        $cake->images = json_encode($data);
        $cake->save();
        return redirect()->back();
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
    public function edit(Product $product)
    {
        $data= [
            'cakes'=>Product::with('children')->whereNull('parent_id')->get(),
            'categories'=>Category::all(),
            'edits'=>$product,
        ];
        return view('admin.edit_product', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        if($request->image){
            $filename1 = time(). "." . $request->image->extension();
            $request->image->move(public_path("upload"), $filename);
            $cake->image = $filename1;
        }
        elseif($request->hasFile('images')){
            foreach($request->file('images')as $image){
                $name = $image->getClientOriginalName();
                $image->move(public_path('upload'),$name);
                $data[] = $name;
            }
            $cake->images = json_encode($data);
        }
        else{
            $request->image == null;
            $request->images == null;
        }
        
        $cake = $product;
        $cake->category_id = $request->category_id;
        $cake->title = $request->title;
        $cake->price = $request->price;
        $cake->discount_price = $request->discount_price;
        $cake->weight_type = $request->weight_type;
        $cake->weight = $request->weight;
        $cake->unit = $request->unit;
        $cake->description = $request->description;
        $cake->delivired = $request->delivired;
        $cake->parent_id = $request->parent_id;
       
        $cake->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
