<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;
use App\Models\AllocatedSlot;
use Auth;
use Redirect;
class TimeSlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getSLots = TimeSlot::with('allocated_slot')->get();
        return view('time_slot.hours_list',compact('getSLots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        //echo "<pre>"; print_r($input); exit;
        $input['create_by'] = Auth::user()->id;
        $this->validate($request, [
            'first_name' => 'required',
            'phone_no' => 'required|min:10'
         ]);
        AllocatedSlot::create($input);
        return Redirect::to('time_slots');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allocatedSoltes = AllocatedSlot::where('slot_id',$id)->first();
        if(isset($allocatedSoltes) && $allocatedSoltes->edit_attempt == '5'){
            return Redirect::back();
        }
        return view('time_slot.create',compact('id','allocatedSoltes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = AllocatedSlot::where('id',$id)->first();
        $input['edit_attempt'] = $data->edit_attempt + 1;
        //echo "<pre>"; print_r($input); exit;
        $this->validate($request, [
            'first_name' => 'required',
            'phone_no' => 'required|min:10'
         ]);
        $data->update($input);
        return Redirect::to('time_slots');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function deleteAllSlot()
    {
        AllocatedSlot::truncate();
        return Redirect::back();
    }
}
