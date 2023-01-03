<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use App\Models\AllocatedSlot;

use Illuminate\Http\Request;

class TimeSlotsController extends Controller
{
    public function allSlots(){
        $data = TimeSlot::with('allocated_slot')->get();
        return response()->json(['status' => 100, 'data'=>$data, 'message'=>"Slots Details"]);
    }
    public function addUserDetails(Request $request){
        $input = $request->all();
        if(isset($input) && !empty($input) && AllocatedSlot::create($input)){
            return response()->json(['status' => 100, 'message'=>"Data inserted successfully"]);
        }else{
            return response()->json(['status' => 101, 'message'=>"Somthing went wrong"]);
        }
    }
    public function updateUserDetails(Request $request){
        $input = $request->all();
        $data = AllocatedSlot::where('id',$request->id)->first();
        if(isset($data)){
            $input['edit_attempt'] = $data->edit_attempt + 1;
            if($data->update($input)){
                return response()->json(['status' => 100, 'message'=>"Data updated successfully"]);
            }else{
                return response()->json(['status' => 101, 'message'=>"Somthing went wrong"]);
            }
            return response()->json(['status' => 101, 'message'=>"Data not found"]);
        }
    }
}
