@extends('user.main')
@section('content-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/cssfile/usercss/profile.css')}}">
</head>
<body>
<div class="background">

    <div class="container1">
        <div class="photo"><img src="/footerimg/Marriott.png"></div>
        <div class="details">
            <h3 style="text-align:center; margin-top:0px; ">{{$guide->first_name}} {{$guide->middle_name}} {{$guide->last_name}}</h3>
            <div class="contact">
            <h3 style="text-align:center; margin-top:10px">Contact</h3>
            <div class="home"><img src="/profileimg/home.png"  ></div>
            <h4>{{$guide->address}}</h4>
            <div class="phone"><img src="/profileimg/phone.png"  ></div>
            <h4>{{$guide->phone_no}}</h4>
            <div class="mail"><img src="/profileimg/mail.png"  ></div>
            <h4>{{$guide->email}}</h4>
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="summary">
            <h3>Summary</h3>
        <p>Passionate and knowledgeable tourist guide with over 10 years of experience leading tours in New York City and across Europe. Specializes in cultural, historical, and culinary tours, providing engaging and informative experiences to travelers of all ages and backgrounds. Adept at creating personalized itineraries that cater to the interests and needs of clients.</p>
        </div>
        
    <div class="edu_skill">
        <div class="education">
            <h3>Education</h3>
            <p>Bachelor of Tourism Management <br><br>Tribhuwan University <br><br>2008-2012
            </p>
        </div>
        <div class="skill">
            <h3>Skill</h3>
            <p>Bachelor of Tourism Management <br><br>Tribhuwan University <br><br>2008-2012
            </p>
        </div>
    </div>

    <div class="experience">
        <h3>Work Experiences</h3>
        <p>Conducted daily tours of iconic NYC landmarks including the Statue of Liberty, Central Park, and Times Square. Developed and led specialized tours focused on the city's history, architecture, and culinary scene. Received consistently high ratings from tour participants for engaging and informative presentations</p>
        </div>
    </div>
</div>
 
@endsection()