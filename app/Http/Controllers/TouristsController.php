<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tourists;
use App\Models\TripDetail;
use App\Models\Trips;
use App\Models\Guides;

class TouristsController extends Controller
{   


    public function registrationpage(){
        $url = url('/tourist/registration');
        $title = "Register";
        $tourist = new Tourists();
        $data = compact('url', 'title', 'tourist');
        return view('user.register')->with($data);
    }

    
    public function register(Request $r){
        $validated = $r->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:tourists,email',
            'passwd' => 'required|string|min:6',
            'gender' => 'required|string',
            'country' => 'required|string',
        ]);

        $table = new Tourists();
        $table->fullname = $r['fullname'];
        $table->email = $r['email'];
        $table->password = $r['passwd'];
        $table->gender = $r['gender'];
        $table->dob=$r['dob'];
        $table->phone_no=$r['phone'];
        $table->country = $r['country'];
        $table->otp=rand(100000,999999);
        if ($table->save()) {

            session(['email'=>$table->email]);
            $emailController=new EmailController();
            $emailController->sendmail($table->email, $table->otp);

            return view('user.otp')->with('alert', 'An OTP code has been sent to your email.');
        }
    }


    public function checkotp(Request $r){
        $tourist = Tourists::where('email',session('email'))->first();

        if(!session()->has('otp_retries')){
            session(['otp_retries'=>4]);
        }
        if($r['otpcode']==$tourist->otp){
            $tourist->status=1;
            $tourist->save();

            session()->forget(['otp_retries','email']);
            return redirect('/login')->with('success',' ');
        }
        
        $retries=session('otp_retries') - 1;
        session(['otp_retries'=>$retries]);

        if(session('otp_retries')<=0){

            $tourist->delete();
            session()->forget('otp_retries');
            session()->forget('email');
            return redirect('/tourist/registration')->with('failed',' ');
        }
        return redirect('/otp')->with('error','Invalid OTP. You have '.session('otp_retries').' attempts remaining.');
    }
    
    
    public function loginpage(){
        return view('user.login');
    }

    public function login(Request $r){
        // Validate the request data for email and password
        $credentials = $r->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/destination');  // Redirect to destination page on success
        } else {
            return redirect('/login')->withErrors(['error' => 'Invalid email or password.'])->withInput();
        }
    }
    

    public function home(){
        return view('user.home');
    }


    public function gallery(){
        return view('user.gallery');
    }


    public function touristedit($id=null){
        if(is_null($id)){
            $id = Auth::guard('web')->user()->tourist_id;
            $tourist=Tourists::find($id);
                if(is_null($tourist)){
                    return redirect('/guide/list');
                }

                else{
                    $data=compact('tourist');
                    return view('user.edittouristprofile')->with($data);
                }
        }
        else{
            $tourist=Tourists::find($id);
            if(is_null($tourist)){
                return redirect('/tourist/detail');
            }
            else{
                $title="Update tourist";
                $url=url('/touristupdate',$id);//URL for update
                $updatestatus=1;
                $data=compact('tourist','url','title','updatestatus');
                return view('admin.touristupdate',$data);
            }
        }
    }


    public function updatetourist(Request $r,$id){
        $table = Tourists::find($id);
        $table->fullname = $r['fullname'];
        $table->email = $r['email'];
        if ($r->filled('passwd')) {
            $table->password = $r['passwd'];
        }
        $table->gender = $r['gender'];
        $table->country = $r['country'];
        $table->dob=$r['dob'];
        $table->phone_no=$r['phone'];

        if ($table->save()) {
            return redirect('/tourist/detail');
        }
    }

    public function edittouristprofile($id, Request $r){
        $table=Tourists::find($id);
        $table->fullname = $r['fullname'];
        if ($r->filled('passwd')) {
            $table->password = $r['passwd'];
        }
        $table->country = $r['country'];
        $table->phone_no=$r['phone'];
        $table->email = $table->email;
        $table->gender = $table->gender;
        $table->dob=$table->dob;
        if ($table->save()) {
            return redirect('/touristprofile');
        }
    }

    public function touristlistview(){
        $details = Tourists::all();
        return view('admin.touristslist', compact('details'));
    }


    public function deletetourist($tourist_id){
        $tourist=Tourists::find($tourist_id);
        if(!is_null($tourist)){
            $tourist->delete();
        }
        return redirect()->back();
    }
    

    public function viewtouristprofile(){//VIEW TOURIST & GUIDE
        if(Auth::guard('guide')->check() && !Auth::guard('web')->check()){
            $dynamic_layout="guide.guidemain";
            $guide_id=Auth::guard('guide')->user()->guide_id;
            $guide=Guides::find($guide_id);
            if($guide && $guide->trip && $guide->trip->tourist){
                $tourist=$guide->trip->tourist;
            }
            else{
                $tourist=null;
            }
        }
        elseif(!Auth::guard('guide')->check() && Auth::guard('web')->check()){
            $dynamic_layout="user.main";
            $tourist_id=Auth::guard('web')->user()->tourist_id;
            $tourist=Tourists::find($tourist_id);
        }
        else{
            $dynamic_layout = null;
            $tourist = null;
        }
        return view('user.userprofile', compact('tourist', 'dynamic_layout'));
    }


    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect('/login');
    }
}