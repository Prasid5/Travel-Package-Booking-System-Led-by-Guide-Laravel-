<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('cssfile/guidecss/header.css')}}">
    <script src="{{asset('jsfile/guidejs/home.js')}}"></script>
</head>
<body>
    <!--........................HEADER........................-->
    <div class="header">
        <div class="container">
            <div class="logo"></div>
            <div class="menubox">
            <a href="{{url('/guidehome')}}">Home</a>
            <a href="{{url('/guidetripdetail')}}">Travel Packages</a>
            <a href="{{ url('/triplist/guide') }}">Trip Request List</a>
            <!-- <a href="{{url('/acceptedtrip')}}">Accepted Trip Request</a> -->
            @if(Auth::guard('guide')->check())
                <a href="/guideprofile">{{Auth::guard('guide')->user()->first_name}} {{Auth::guard('guide')->user()->middle_name}} {{Auth::guard('guide')->user()->last_name}}</a>
                <div class="menuicon" onclick=displaymenuitems()>
                    
                <div class="menuitems">
                    <a href="{{url('/guide/edit')}}">Edit Profile</a>
                    <form id="logout-form"action="{{ url('guidelogout') }}" method="POST">
                     @csrf
                    <button type="button" onclick="document.getElementById('logout-form').submit();">
                     Log out
                    </button>
                    </form>
                </div>

                </div>
            @else
                <a href="{{url('tourist/registration')}}">Login/Register</a>
            @endif
        </div>
    </div>
</div>