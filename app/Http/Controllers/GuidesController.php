<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guides;
use App\Models\Tourists;
use App\Models\TripDetail;
use App\Models\Discount;
use Illuminate\Support\Facades\Auth;
Use Illuminate\support\Facades\Storage;

class GuidesController extends Controller
{   
    public function registrationpage(){
        $url = url('/guide/register');
        $title = "Guide Registration";
        $places=TripDetail::distinct()->pluck('place')->toArray();
        $guide = new Guides();
        $data = compact('url', 'title', 'guide','places');
        return view('guide.guidereg')->with($data);
    }

    public function guideregister(Request $r){   
         
        $table = new Guides();
        $table->license_no = $r['license'];
        $table->first_name = $r['fname'];
        $table->middle_name = $r['mname'];
        $table->last_name = $r['lname'];
        $table->email = $r['email'];
        $table->password = $r['passwd'];
        $table->address = $r['address'];
        $table->guiding_location = $r['location'];
        $table->dob = $r['date'];
        $table->work_experience=$r['work_exp'];
        $table->gender = $r['gender'];
        $table->phone_no = $r['phone'];
        $table->known_languages=$r['lang'];
        $table->bio = $r['bio'];
        
        if($r->hasFile('document')){
            $documentPath=$r->file('document')->store('guidedocuments','public');
            $table->document=$documentPath;
        }

        if($r->hasFile('photo')){
            $photoPath=$r->file('photo')->store('guidephotos','public');
            $table->photo=$photoPath;
        }
    
        $table->save();
        return redirect('/guide/list');
    }
    

    public function guideloginpage(){
        return view('guide.guidelogin');
    }


    public function guidelogin(Request $r){
        $credentials = $r->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('guide')->attempt($credentials)) {
            return redirect('/guidehome');
        } 
        else {
            return redirect('/guidelogin')->withErrors(['error' => 'Invalid email or password.'])->withInput();
        }
    }

    public function guidehome(){
            return view('guide.guidehome');
    }


    public function viewguideprofile(){
        if(Auth::guard('guide')->check() && !Auth::guard('web')->check()){
            $dynamic_layout="guide.guidemain";
            $guide_id=Auth::guard('guide')->user()->guide_id;
            $guide=Guides::find($guide_id);
        }
        elseif(!Auth::guard('guide')->check() && Auth::guard('web')->check()){
            $dynamic_layout="user.main";
            $tourist_id=Auth::guard('web')->user()->tourist_id;
            $tourist=Tourists::find($tourist_id);
            if($tourist && $tourist->trip && $tourist->trip->guide){
                $guide=$tourist->trip->guide;
            }
            else{
                $guide=null;
            }
        }
        else{
            $guide=null;
            $dynamic_layout=null;
        }
        return view('guide.guideprofile',compact('guide','dynamic_layout'));
    }


    public function guideedit($id=null){
        if(is_null($id)){
            $id = Auth::guard('guide')->user()->guide_id;
            $guide=Guides::find($id);
                if(is_null($guide)){
                    return redirect('/guide/list');
                }

                else{
                    $dynamic_layout="guide.guidemain";
                    $url=url('/editguideprofile').'/'.$id;//URL for update

                    $data=compact('guide','url','dynamic_layout');
                    return view('guide.editguideprofile')->with($data);
                }
        }

        else{
            $guide=Guides::find($id);
            if(is_null($guide)){
                return redirect('/guide/list');
            }
            else{
                $title="Update Guide";
                $url=url('/guide/update').'/'.$id;
                $places = TripDetail::distinct()->pluck('place')->toArray();
                $travelclass=TripDetail::distinct()->pluck('travel_class')->toArray();
                $data=compact('guide','url','title','places','travelclass');
                return view('guide.guidereg')->with($data);
            }
        }
    }


    public function editguideprofile($id,Request $r){
        $table=Guides::find($id);
        $table->license_no=$table->license_no;
        $table->first_name=$r['fname'];
        $table->middle_name=$r['mname'];

        $table->last_name=$r['lname'];
        $table->email=$table->email;
        if($r->filled('passwd')){
            $table->password=$r['passwd'];
        }
        $table->address=$table->address;
        $table->guiding_location=$table->guiding_location;
        $table->dob= $table->dob;
        $table->work_experience=$table->work_experience;
        $table->gender= $table->gender;
        $table->known_languages=$r['lang'];
        if($r->filled(['phone'])){
            $table->phone_no=$r['phone'];
        }
        else{
            $table->phone_no=$table->phone_no;
        }
        $table->bio = $r['bio'];
        

        
        $table->photo = $table->photo;
        $table->document = $table->document;


        $table->save();
        return redirect(url('/guideprofile'));
    }

    public function updateguide($id,Request $r){
        $table=Guides::find($id);
        $table->license_no=$r['license'];
        $table->first_name=$r['fname'];
        $table->middle_name=$r['mname'];
        $table->last_name=$r['lname'];
        $table->email=$r['email'];
        if($r->filled('passwd')){
            $table->password=$r['passwd'];
        }
        $table->address=$r['address'];
        $table->guiding_location=$r['location'];
        $table->dob=$r['date'];
        $table->work_experience=$r['work_exp'];
        $table->gender=$r['gender'];
        $table->known_languages=$r['lang'];
        $table->phone_no=$r['phone'];
        $table->bio = $r['bio'];
        
        if($r->hasFile('document')){
            //delete the old one if exists
            if($table->document && Storage::exists('public/'.$table->document)){
                Storage::delete('public/'.$table->document);
            }
            $documentPath=$r->file('document')->store('guidedocuments','public');
            $table->document=$documentPath;
        }

        if($r->hasFile('photo')){
            //delete the old one if exists
            if($table->photo && Storage::exists('public/'.$table->photo)){
                Storage::delete('public/'.$table->photo);
            }
            $photoPath = $r->file('photo')->store('guidephotos', 'public');
            $table->photo = $photoPath;
        }
        $table->save();
        return redirect(url('/guide/list'));
    }
    
    public function guidelistview(){//ADMIN
        $details=Guides::all();
        $data=compact('details');
        return view('admin.guidelist')->with($data);
    }

    public function deleteguide($id){//ADMIN
        $guide=Guides::find($id);
        if (!is_null($guide)){
            $guide->delete();
        }
        return redirect()->back();
    }

    public function logout(){
        Auth::guard('guide')->logout();
        session()->flush();
        return view('guide.guidelogin');
    }
}

