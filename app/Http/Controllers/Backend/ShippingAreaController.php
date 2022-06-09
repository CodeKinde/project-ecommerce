<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Carbon\Carbon;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class ShippingAreaController extends Controller
{
    public function DivisionView(){
        $divisions = ShipDivision::orderBy('division_name','asc')->get();

        return view('backend.shipping.district.district_view',compact('divisions'));
    }
    public function DivisionStore(Request $request){

        $request->validate([
            'division_name' => 'required',
        ]);

        ShipDivision::insert([
         'division_name' => $request->division_name,
         'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'division inséré avec success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DivisionEdit($id){

        $division = ShipDivision::findOrFail($id);
        return view('backend.shipping.division.division_edit',compact('division'));
    }

    public function DivisionUpdate(Request $request){

        $division_id = $request->id;

        ShipDivision::findOrFail($division_id)->update([
         'division_name' => $request->division_name,
         'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'division mise à jour avec success!',
            'alert-type' => 'info'
        );

        return redirect()->route('division.view')->with($notification);
    }

    public function DivisionDelete($id){
        $division = ShipDivision::findOrFail($id);
        $division->delete();
        $notification = array(
            'message' => 'division supprimer avec success!',
            'alert-type' => 'error'
        );

        return redirect()->route('division.view')->with($notification);
    }
//===========================End division method======================//


//===========================start district method======================//
    public function DistrictView(){

    $divisions = ShipDivision::orderBy('division_name','asc')->get();
    $districts = ShipDistrict::orderBy('district_name','asc')->get();

    return view('backend.shipping.district.district_view',compact('divisions','districts'));
    }
    public function DistrictStore(Request $request){

        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        ShipDistrict::insert([
         'division_id' => $request->division_id,
         'district_name' => $request->district_name,
         'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'District inséré avec success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DistrictEdit($id){

        $divisions = ShipDivision::orderBy('division_name','asc')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.shipping.district.district_edit',compact('district','divisions'));
    }

    public function DistrictUpdate(Request $request){

        $district_id = $request->id;

        ShipDistrict::findOrFail($district_id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'district mise à jour avec success!',
            'alert-type' => 'info'
        );

        return redirect()->route('district.view')->with($notification);
    }

    public function DistrictDelete($id){
        $district = ShipDistrict::findOrFail($id);
        $district->delete();
        $notification = array(
            'message' => 'district supprimer avec success!',
            'alert-type' => 'error'
        );

        return redirect()->route('district.view')->with($notification);
    }
//===========================End district method======================//


//===========================start state method======================//
    public function StateView(){

    $division = ShipDivision::orderBy('division_name','asc')->get();
    $district = ShipDistrict::orderBy('district_name','asc')->get();
    $states = ShipState::orderBy('state_name','asc')->get();

    return view('backend.shipping.state.state_view',compact('states','district','division'));
    }

    public function StateStore(Request $request){

        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ]);

        ShipState::insert([
         'division_id' => $request->division_id,
         'district_id' => $request->district_id,
         'state_name' => $request->state_name,
         'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'state inséré avec success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function StateEdit($id){
        $division = ShipDivision::orderBy('division_name','asc')->get();
        $district = ShipDistrict::orderBy('district_name','asc')->get();

        $state = ShipState::findOrFail($id);
        return view('backend.shipping.state.state_edit',compact('district','division','state'));
    }
    public function StateUpdate(Request $request){

        $state_id = $request->id;

        ShipState::findOrFail($state_id)->update([
         'division_id' => $request->division_id,
         'district_id' => $request->district_id,
         'state_name' => $request->state_name,
         'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'state mise à jour avec success!',
            'alert-type' => 'info'
        );

        return redirect()->route('state.view')->with($notification);
    }

    public function StateDelete($id){
    $state = ShipState::findOrFail($id);
    $state->delete();
    $notification = array(
        'message' => 'state supprimer avec success!',
        'alert-type' => 'error'
    );

    return redirect()->route('state.view')->with($notification);
    }
//===========================End State method======================//

}
