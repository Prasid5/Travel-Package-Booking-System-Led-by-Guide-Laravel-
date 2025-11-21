<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailconfirmation;

class EmailController extends Controller
{
    public function sendmail($toEmail,$otp){
        $message="Your OTP code for email confirmation: $otp";
        $subject="Welcome to Explore Nepal Website";

        $request=Mail::to($toEmail)->send(new emailconfirmation($message,$subject));
    }
}
