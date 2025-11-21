<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{       
    public function registrationpage(){
        return view('admin.adminregister');
    }

    
    public function register(Request $r){
        $table = new Admin();
        $table->name = $r['name'];
        $table->email = $r['email'];
        $table->password = $r['password'];
        $table->role=$r['role'];
        if ($table->save()) {
            return view('admin.login');
        }
    }

    public function adminedit($id){
        if(Auth::guard('admin')->user()->id==$id){
            $admin=Admin::find($id);
            $data=compact('admin');
            return view('admin.editadmin')->with($data);
        }
    }

    public function updateadmin($id,Request $r){
        $table=Admin::find($id);
        $table->name = $r['name'];
        $table->email = $r['email'];
        if($r->filled('passwd')){
            $table->password=$r['passwd'];
        }
        $table->role= $table->role;
        if ($table->save()) {
            return view('admin.adminhome');
        }

    }
    public function loginpage(){
        return view('admin.login');
    }


    public function login(Request $r){
        $credential=[
            'email'=>$r->input('email'),
            'password'=>$r->input('password')];
            // $credential=$r->validate([
            //     'email'=>'required|email',
            //     'password'=>'required',
            // ]);
        if(Auth::guard('admin')->attempt($credential)){
            return redirect('/adminhome');
        }
        else{
            return redirect('/adminlogin')->withErrors(['error'=>'Invalid Email or Password'])->withInput();
        }
    }

    
    public function adminhome(){
        return view('admin.adminhome');
    }


    public function admingallery(){
        return view('admin.admingallery');
    }


    public function logout(){
        Auth::logout();
        session()->flush(); // Clears all session data
        return redirect('/adminlogin'); // Redirect to login page
    }


 





    
}
