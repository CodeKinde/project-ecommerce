<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function DistrictGet($division_id){

        $ship = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','asc')->get();
        return json_encode($ship);
    }
    public function StateGet($district_id){
        $ship = ShipState::where('district_id',$district_id)->orderBy('state_name','asc')->get();
        return json_encode($ship);
    }
}
