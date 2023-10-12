<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function allDivision(){
        $div = Division::latest()->get();
       return view('admin.shipping.division.division',compact('div'));
    }
    public function DivisionStore(Request $request){
        $this->validate($request,[
            'division_name' => 'required'
        ]);
        Division::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'alert_type' => 'success',
            'message' => 'Division inserted successfully'
        );
        return redirect()->route('all.division')->with($notification);
    }
    public function DivisionEdit($id){
        $all_data = Division::find($id);
        return view('admin.shipping.division.division_edit',compact('all_data'));
    }
    public function DivisionUpdate(Request $request,$id){
        $update_data = Division::find($id);
        $update_data->division_name = $request->division_name;
        $update_data->update();

        $notification = array(
            'alert_type' => 'success',
            'message' => 'Division updated successfully'
        );
        return redirect()->route('all.division')->with($notification);
    }
    public function DivisionDelete($id){
        $delete_data = Division::find($id);
        $delete_data->delete();

        $notification = array(
            'alert_type' => 'warning',
            'message' => 'Division deleted successfully'
        );
        return redirect()->route('all.division')->with($notification);
    }
//    for all district
    public function allDistrict(){
        $district = District::with('division')->latest()->get();
        $division = Division::latest()->get();
        return view('admin.shipping.district.district_view',compact('district','division'));
    }
    public function DistrictStore(Request $request){
        $this->validate($request,[
            'district_name' => 'required',
            'division_id' => 'required'
        ]);
        District::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'alert_type' => 'success',
            'message' => 'Division inserted successfully'
        );
        return redirect()->route('all.district')->with($notification);
    }
    public function DistrictEdit($id){
        $edit_data = District::find($id);
        $div_data = Division::all();

        return view('admin.shipping.district.district_edit',compact('edit_data','div_data'));
    }

    public function DistrictEditShow($id){
        $district = District::where('division_id',$id)->get();

        return response()->json($district);

    }




    public function DistrictUpdate(Request $request,$id){
        $update_data = District::find($id);
        $update_data->division_id = $request->division_id;
        $update_data->district_name = $request->district_name;
        $update_data->update();

        $notification = array(
            'alert_type' => 'success',
            'message' => 'District updated successfully'
        );
        return redirect()->route('all.district')->with($notification);
    }
    public function DistrictDelete($id){
        $delete_data = District::find($id);
        $delete_data->delete();

        $notification = array(
            'alert_type' => 'warning',
            'message' => 'District deleted successfully'
        );
        return redirect()->route('all.district')->with($notification);
    }

//    state method

    public function allState(){
        $division = Division::latest()->get();
        $district = District::latest()->get();
        $state = State::with('division','district')->latest()->get();
        return view('admin.shipping.state.state_view',compact('state','division','district'));
    }

    public function StateStore(Request $request){
        $this->validate($request,[
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ]);
        State::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'Shipping_charge' => $request->Shipping_charge,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'alert_type' => 'success',
            'message' => 'State inserted successfully'
        );
        return redirect()->route('all.state')->with($notification);
    }

    public function districtShow($id){

        $data = District::where('division_id',$id)->get();
        return json_encode($data);

    }
    public function stateEdit($id){
        $state = State::find($id);
        $division = Division::all();
        $district = District::all();
        return view('admin.shipping.state.state_edit',compact('state','division','district'));
    }

    public function StateEditShow($id){
        $state = State::where('district_id',$id)->get();

        return response()->json($state);

    }


    public function stateUpdate(Request $request,$id){
        $edit_state = State::find($id);
        $edit_state->division_id = $request->division_id;
        $edit_state->district_id = $request->district_id;
        $edit_state->state_name = $request->state_id;
        $edit_state->Shipping_charge = $request->Shipping_charge;
        $edit_state->updated_at = Carbon::now();

        $edit_state->update();

        $notification = array(
            'alert_type' => 'success',
            'message' => 'State updated successfully'
        );
        return redirect()->route('all.state')->with($notification);
    }

    public function stateDelete($id){
            $delete_data = State::find($id);
            $delete_data->delete();

        $notification = array(
            'alert_type' => 'warning',
            'message' => 'State deleted successfully'
        );
        return redirect()->route('all.state')->with($notification);
    }





}
