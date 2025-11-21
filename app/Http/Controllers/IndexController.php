<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guides;

class IndexController extends Controller
{
    // User routing

    public function profile(){
        return view('user.profile');
    }
    public function viewprofile2(){
        return view('user.profile2');
    }
}

