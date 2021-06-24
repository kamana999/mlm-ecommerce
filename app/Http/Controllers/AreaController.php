<?php

namespace App\Http\Controllers;
use App\Models\District;
use App\Models\Area;
use Auth;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            
            'districts' => District::all(),
            'areas' => Area::all(),
            
        ];
        return view('admin.area',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            
            'districts' => District::all(),
            
        ];
        return view('admin.add_area',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'name'=>'required',
        ];

            foreach($request->delivery_time as $name){
                $data[] = $name;
            }

        $area = new Area();
        $area->name = $request->name;
        $area->pincode = $request->pincode;
        $area->district_id = $request->district_id;
        $area->delivery_time =json_encode($data);
        $area->delivery_charge = $request->delivery_charge;
        $area->save();
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
    public function edit(Area $area)
    {
        $data = [
            'edits'=>$area,
            'districts' => District::all(),
            
        ];
        return view('admin.edit_area',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        foreach($request->delivery_time as $name){
            $data[] = $name;
        }
        
        $input = $request->except('delivery_time');
        $input['delivery_time'] = $time;

        $area = $area;
        $area->name = $request->name;
        $area->pincode = $request->pincode;
        $area->district_id = $request->district_id;
        $area->delivery_time = $data;
        $area->delivery_charge = $request->delivery_charge;
        $area->save();
        return redirect()->route('areas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->back();
    }
}
