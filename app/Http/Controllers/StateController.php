<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\State;
use Auth;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
           
            'countries' => Country::all(),
            'states' => State::all(),

        ];
        return view('admin.state',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [

            'countries' => Country::all(),
            'states' => State::all(),
            
        ];
        return view('admin.add_state',$data);
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
        $state = new State();
        $state->name = $request->name;
        $state->country_id = $request->country_id;
        $state->save();
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
    public function edit(State $state)
    {
        $data = [

            'edits'=>$state,
            'countries' => Country::all(),
            'states' => State::all(),
            
        ];
        return view('admin.edit_state',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $state = $state;
        $state->name = $request->name;
        $state->country_id = $request->country_id;
        $state->save();
        return redirect()->route('states.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->back();
    }
}
