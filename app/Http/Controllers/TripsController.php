<?php

namespace App\Http\Controllers;

use App\Models\Trips;
use App\Models\Tourists;
use App\Models\TripDetail;
use App\Models\Discount;
use App\Models\Guides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class TripsController extends Controller
{   

    public function selecttrip(){
        if (Auth::check()) {
            $tourist_id=Auth::guard('web')->user()->tourist_id;
            $tourist=Tourists::find($tourist_id);
            $min_people= Discount::orderBy('min_people', 'asc')->first()->min_people;;
            $max_people= Discount::orderBy('max_people', 'desc')->first()->max_people;;
            
            $trip=$tourist->trip;
            $tripdetails=TripDetail::all();
            $places = TripDetail::distinct()->pluck('place')->toArray();
            $travelclass=TripDetail::distinct()->pluck('travel_class')->toArray();

            return view('user.destination',compact('trip','places','travelclass','tripdetails','min_people','max_people'));  // If authenticated
        } 
        else {
            $tripdetails=TripDetail::all();
            $places = TripDetail::distinct()->pluck('place')->toArray();
            $travelclass=TripDetail::distinct()->pluck('travel_class')->toArray();

            return view('user.destination',compact('tripdetails')); 
        }
    }
    public function triprequest(Request $request){//tourist
        // echo"<pre>";
        // print_r($request->all());
        $id=Auth::guard('web')->user()->tourist_id;

        $trip_detail=TripDetail::where('place',$request['place'])->where('travel_class',$request['travel_class'])->first();

        if($trip_detail){
            $base_price=(float)$trip_detail->base_price;
            $travelling_days=$trip_detail->travelling_days;
            $commission_rate=(float)$trip_detail->commission_rate;
        }

        $discount=Discount::where('min_people','<=',$request['num_people'])->where('max_people','>=',$request['num_people'])->first();
        $numpeople=(int)$request['num_people'];
        $discount_rate = (float) $discount->discount_rate;

        $total_price=$base_price*$numpeople*(1-$discount_rate);
        $commission_amt=$total_price*$commission_rate;

        $destination_table=new Trips();
        $destination_table->tourist_id=$id;
        $destination_table->place = $request['place'];
        $destination_table->travel_class = $request['travel_class'];
        $destination_table->no_of_people = $request['num_people'];
        $destination_table->travel_date = $request['travel_date'];
        $destination_table->travelling_days=$travelling_days;
        $destination_table->price=$total_price;
        $destination_table->commission_amt=$commission_amt;
        $destination_table->status='1';
        if ($destination_table->save()){
            return redirect('/destination');
        }
    }
    
    public function triprequestupdate(Request $r,$id){//admin
        $triprequest=Trips::find($id);
        $trip_detail=TripDetail::where('place',$r['place'])->where('travel_class',$r['travel_class'])->first();
        
        if($trip_detail){
            $base_price=(float)$trip_detail->base_price;
            $travelling_days=$trip_detail->travelling_days;
            $commission_rate=(float)$trip_detail->commission_rate;
        }

        $discount=Discount::where('min_people','<=',$r['num_people'])->where('max_people','>=',$r['num_people'])->first();
        $numpeople=(int)$r['num_people'];
        $discount_rate = (float) $discount->discount_rate;

        $total_price=$base_price*$numpeople*(1-$discount_rate);
        $commission_amt=$total_price*$commission_rate;

        if($triprequest){
            $triprequest->guide_id=$r['guide_id'];
            $triprequest->place = $r['place'];
            $triprequest->travel_class = $r['travel_class'];
            $triprequest->no_of_people = $r['num_people'];
            $triprequest->travel_date = $r['travel_date'];
            $triprequest->travelling_days=$travelling_days;
            $triprequest->price=$total_price;
            $triprequest->commission_amt=$commission_amt;

            if($triprequest->guide_id){
                $triprequest->status='2';
            }
            else{
                $triprequest->status='1';
            }

            if ($triprequest->save()){
                return redirect()->back();
            }
        }
    }
    public function tripcancelling() {// tourist
        $id = Auth::guard('web')->user()->tourist_id;
        $trip = Trips::where('tourist_id', $id)->first();
    
        if (!is_null($trip)) {
            $currentTime = now();
            $travelDate = $trip->travel_date;
    
            if ($currentTime->diffInHours($travelDate, false) >= 48) {
                $trip->delete();
                session()->flash('alert', 'Trip successfully canceled.');
                return redirect('/destination');
            } else {
                session()->flash('alert', 'Trips can only be canceled up to 48 hours before the travel date.');
                return redirect('/destination');
            }
        }
    
        session()->flash('alert', 'No trip found to cancel.');
        return redirect('/destination');
    }
    

    public function requestedtripinfo(){//tourist
        $tourist_id=Auth::guard('web')->user()->tourist_id;
        $tourist=Tourists::find($tourist_id);
        
        if($tourist && $tourist->trip){
            $trip=$tourist->trip;
        }
        else{
            $trip=null;
        }
        return view('user.destinaion',compact('trip'));
    }

    public function triprequestdelete($id){//admin
        $trip=Trips::find($id);
        if(!is_null($trip)){
            $trip->delete();
        }
        return redirect()->back();
    }
    
    public function triprequestslistview() {//guide and admin
        $trips = Trips::whereNull('tourist_id')->get();
        if ($trips->isNotEmpty()) {
            foreach ($trips as $trip) {
                $trip->delete();
            }
        }
    
        $status = false; // Default status to false
        
        if (Auth::guard('guide')->check()) {
            $guide_id = Auth::guard('guide')->user()->guide_id;
            $trip = Trips::where('guide_id', $guide_id)->first();
            if ($trip) {
                $status = true;
                return view('guide.triplist', compact('trip', 'status'));    
            } else {
                $guide_location = Auth::guard('guide')->user()->guiding_location;
                $trips = Trips::where('place', $guide_location)->get();
                return view('guide.triplist', compact('trips', 'status'));
            }
        } 
        elseif (Auth::guard('admin')->check()) {
            $details = Trips::all();
            $tripdetails=TripDetail::all();
            $min_people= Discount::orderBy('min_people', 'asc')->first()->min_people;;
            $max_people= Discount::orderBy('max_people', 'desc')->first()->max_people;;
            $places = TripDetail::distinct()->pluck('place')->toArray();
            $travelclass=TripDetail::distinct()->pluck('travel_class')->toArray();

            return view('admin.triplist', compact('details', 'status','places','travelclass','min_people','max_people'));
        }
    }
    public function triprequestaccepting($id, $guide_id){//guide
        $trip=Trips::find($id);
        $trip->guide_id=$guide_id;
        $trip->status='2';
        $trip->save();

        $guide=Guides::find($guide_id);
        $guide->status='1';
        $guide->save();

        return redirect()->back();
        
    }     
}

    
// public function acceptedtrip(){
//     $guide_id=Auth::guard('guide')->user()->guide_id;
//     $trips=Trips::where('guide_id',$guide_id)->get();
//     $data=compact('trips');
//     return view('guide.acceptedtriplist')->with($data);
// }

    // public function touristdestinationview(){
    //     // $destination_table=Destination::all();
    //     // echo"<pre>";
    //     // print_r($destination_table->toArray());