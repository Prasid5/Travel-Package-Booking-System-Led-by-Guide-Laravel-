<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;

class DiscountsController extends Controller
{   
    public function discountaddpage(){
        
        return view('admin.discountadd');
    }
    public function discountadd(Request $r){
        $discount=new Discount();
        $discount->min_people=$r['min_people'];
        $discount->max_people=$r['max_people'];
        $discount->discount_rate=(float)$r['discount_rate'];
        if($discount->save()){
            return redirect();
        }
    }
    public function discountupdate(Request $r, $id){
        $discount=Discount::find($id);

        if($discount){
            $discount->min_people=$r['min_people'];
            $discount->max_people=$r['max_people'];
            $discount->discount_rate=(float)$r['discount_rate'];
            $discount->save();

            return redirect()->back();
        }
    }

    public function discountdelete($id){
        $discount=Discount::find($id)->first();
        if(!is_null($discount)){
            $discount->delete();
        }
        return redirect()->back();
    }

    public function discountview(){//tripdetail
        $discounts=Discount::all();
        return $discounts;
    }
}
