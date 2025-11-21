<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TripDetail;
use App\Http\Controllers\DiscountsController;
use Illuminate\Support\Facades\Auth;
class TripDetailsController extends Controller
{
    public function tripaddpage(){
        
        return view('admin.tripadd');
    }

    public function tripadd(Request $r){
        $tripDetail = new TripDetail();
        $tripDetail->place = $r->input('place');
        $tripDetail->activities = $r->input('activities');
        $tripDetail->travel_class = $r->input('travel_class');
        $tripDetail->base_price = $r->input('base_price');
        $tripDetail->commission_rate = $r->input('commission_rate');
        $tripDetail->travelling_days = $r->input('travelling_days');
        if($tripDetail->save()){
            return redirect(url('/tripdetail'));

        }

}
    
    public function tripupdate(Request $r, $id){//tripdetail
        $tripDetail = TripDetail::find($id);
    
        if ($tripDetail) {
            $tripDetail->place = $r['place'];
            $tripDetail->activities = $r['activities'];
            $tripDetail->travel_class = $r['travel_class'];
            $tripDetail->base_price = (float)$r['base_price'];
            $tripDetail->commission_rate = (float)$r['commission_rate'];
            $tripDetail->travelling_days = $r['travelling_days'];
            $tripDetail->save();
    
            return redirect()->back();
        }
    }
    

    public function tripdelete($id){
        $trip=TripDetail::find($id);
        if(!is_null($trip)){
            $trip->delete();
        }
        return redirect()->back();
    }


    public function tripview(){//tripdetail
        $tripdetails = TripDetail::all();
        $discountController = new DiscountsController();
        $discounts = $discountController->discountview();

        if (Auth::guard('guide')->check()) {

            return view('guide.trip&discountdetail', compact('tripdetails','discounts'));
        }
        if (Auth::guard('admin')->check()) {

            return view('admin.trip&discountdetail', compact('tripdetails','discounts'));
        }
    }
}
